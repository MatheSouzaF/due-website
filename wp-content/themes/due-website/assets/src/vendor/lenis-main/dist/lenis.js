(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.Lenis = factory());
})(this, (function () { 'use strict';

  var version = "1.1.2";

  // Clamp a value between a minimum and maximum value
  function clamp(min, input, max) {
    return Math.max(min, Math.min(input, max))
  }

  // Linearly interpolate between two values using an amount (0 <= t <= 1)
  function lerp(x, y, t) {
    return (1 - t) * x + t * y
  }

  // http://www.rorydriscoll.com/2016/03/07/frame-rate-independent-damping-using-lerp/
  function damp(x, y, lambda, dt) {
    return lerp(x, y, 1 - Math.exp(-lambda * dt))
  }

  // Calculate the modulo of the dividend and divisor while keeping the result within the same sign as the divisor
  // https://anguscroll.com/just/just-modulo
  function modulo(n, d) {
    return ((n % d) + d) % d
  }

  // Animate class to handle value animations with lerping or easing
  class Animate {
    // Advance the animation by the given delta time
    advance(deltaTime) {
      if (!this.isRunning) return

      let completed = false;

      if (this.lerp) {
        this.value = damp(this.value, this.to, this.lerp * 60, deltaTime);
        if (Math.round(this.value) === this.to) {
          this.value = this.to;
          completed = true;
        }
      } else {
        this.currentTime += deltaTime;
        const linearProgress = clamp(0, this.currentTime / this.duration, 1);

        completed = linearProgress >= 1;
        const easedProgress = completed ? 1 : this.easing(linearProgress);
        this.value = this.from + (this.to - this.from) * easedProgress;
      }

      if (completed) {
        this.stop();
      }

      // Call the onUpdate callback with the current value and completed status
      this.onUpdate?.(this.value, completed);
    }

    // Stop the animation
    stop() {
      this.isRunning = false;
    }

    // Set up the animation from a starting value to an ending value
    // with optional parameters for lerping, duration, easing, and onUpdate callback
    fromTo(
      from,
      to,
      { lerp = 0.1, duration = 1, easing = (t) => t, onStart, onUpdate }
    ) {
      this.from = this.value = from;
      this.to = to;
      this.lerp = lerp;
      this.duration = duration;
      this.easing = easing;
      this.currentTime = 0;
      this.isRunning = true;

      onStart?.();
      this.onUpdate = onUpdate;
    }
  }

  function debounce(callback, delay) {
    let timer;
    return function () {
      let args = arguments;
      let context = this;
      clearTimeout(timer);
      timer = setTimeout(function () {
        callback.apply(context, args);
      }, delay);
    }
  }

  class Dimensions {
    constructor({
      wrapper,
      content,
      autoResize = true,
      debounce: debounceValue = 250,
    } = {}) {
      this.wrapper = wrapper;
      this.content = content;

      if (autoResize) {
        this.debouncedResize = debounce(this.resize, debounceValue);

        if (this.wrapper === window) {
          window.addEventListener('resize', this.debouncedResize, false);
        } else {
          this.wrapperResizeObserver = new ResizeObserver(this.debouncedResize);
          this.wrapperResizeObserver.observe(this.wrapper);
        }

        this.contentResizeObserver = new ResizeObserver(this.debouncedResize);
        this.contentResizeObserver.observe(this.content);
      }

      this.resize();
    }

    destroy() {
      this.wrapperResizeObserver?.disconnect();
      this.contentResizeObserver?.disconnect();
      window.removeEventListener('resize', this.debouncedResize, false);
    }

    resize = () => {
      this.onWrapperResize();
      this.onContentResize();
    }

    onWrapperResize = () => {
      if (this.wrapper === window) {
        this.width = window.innerWidth;
        this.height = window.innerHeight;
      } else {
        this.width = this.wrapper.clientWidth;
        this.height = this.wrapper.clientHeight;
      }
    }

    onContentResize = () => {
      if (this.wrapper === window) {
        this.scrollHeight = this.content.scrollHeight;
        this.scrollWidth = this.content.scrollWidth;
      } else {
        this.scrollHeight = this.wrapper.scrollHeight;
        this.scrollWidth = this.wrapper.scrollWidth;
      }
    }

    get limit() {
      return {
        x: this.scrollWidth - this.width,
        y: this.scrollHeight - this.height,
      }
    }
  }

  class Emitter {
    constructor() {
      this.events = {};
    }

    emit(event, ...args) {
      let callbacks = this.events[event] || [];
      for (let i = 0, length = callbacks.length; i < length; i++) {
        callbacks[i](...args);
      }
    }

    on(event, cb) {
      // Add the callback to the event's callback list, or create a new list with the callback
      this.events[event]?.push(cb) || (this.events[event] = [cb]);

      // Return an unsubscribe function
      return () => {
        this.events[event] = this.events[event]?.filter((i) => cb !== i);
      }
    }

    off(event, callback) {
      this.events[event] = this.events[event]?.filter((i) => callback !== i);
    }

    destroy() {
      this.events = {};
    }
  }

  const LINE_HEIGHT = 100 / 6;

  class VirtualScroll {
    constructor(element, { wheelMultiplier = 1, touchMultiplier = 1 }) {
      this.element = element;
      this.wheelMultiplier = wheelMultiplier;
      this.touchMultiplier = touchMultiplier;

      this.touchStart = {
        x: null,
        y: null,
      };

      this.emitter = new Emitter();
      window.addEventListener('resize', this.onWindowResize, false);
      this.onWindowResize();

      this.element.addEventListener('wheel', this.onWheel, { passive: false });
      this.element.addEventListener('touchstart', this.onTouchStart, {
        passive: false,
      });
      this.element.addEventListener('touchmove', this.onTouchMove, {
        passive: false,
      });
      this.element.addEventListener('touchend', this.onTouchEnd, {
        passive: false,
      });
    }

    // Add an event listener for the given event and callback
    on(event, callback) {
      return this.emitter.on(event, callback)
    }

    // Remove all event listeners and clean up
    destroy() {
      this.emitter.destroy();

      window.removeEventListener('resize', this.onWindowResize, false);

      this.element.removeEventListener('wheel', this.onWheel, {
        passive: false,
      });
      this.element.removeEventListener('touchstart', this.onTouchStart, {
        passive: false,
      });
      this.element.removeEventListener('touchmove', this.onTouchMove, {
        passive: false,
      });
      this.element.removeEventListener('touchend', this.onTouchEnd, {
        passive: false,
      });
    }

    // Event handler for 'touchstart' event
    onTouchStart = (event) => {
      const { clientX, clientY } = event.targetTouches
        ? event.targetTouches[0]
        : event;

      this.touchStart.x = clientX;
      this.touchStart.y = clientY;

      this.lastDelta = {
        x: 0,
        y: 0,
      };

      this.emitter.emit('scroll', {
        deltaX: 0,
        deltaY: 0,
        event,
      });
    }

    // Event handler for 'touchmove' event
    onTouchMove = (event) => {
      const { clientX, clientY } = event.targetTouches
        ? event.targetTouches[0]
        : event;

      const deltaX = -(clientX - this.touchStart.x) * this.touchMultiplier;
      const deltaY = -(clientY - this.touchStart.y) * this.touchMultiplier;

      this.touchStart.x = clientX;
      this.touchStart.y = clientY;

      this.lastDelta = {
        x: deltaX,
        y: deltaY,
      };

      this.emitter.emit('scroll', {
        deltaX,
        deltaY,
        event,
      });
    }

    onTouchEnd = (event) => {
      this.emitter.emit('scroll', {
        deltaX: this.lastDelta.x,
        deltaY: this.lastDelta.y,
        event,
      });
    }

    // Event handler for 'wheel' event
    onWheel = (event) => {
      let { deltaX, deltaY, deltaMode } = event;

      const multiplierX =
        deltaMode === 1 ? LINE_HEIGHT : deltaMode === 2 ? this.windowWidth : 1;
      const multiplierY =
        deltaMode === 1 ? LINE_HEIGHT : deltaMode === 2 ? this.windowHeight : 1;

      deltaX *= multiplierX;
      deltaY *= multiplierY;

      deltaX *= this.wheelMultiplier;
      deltaY *= this.wheelMultiplier;

      this.emitter.emit('scroll', { deltaX, deltaY, event });
    }

    onWindowResize = () => {
      this.windowWidth = window.innerWidth;
      this.windowHeight = window.innerHeight;
    }
  }

  class Lenis {
      // animate: Animate
      // emitter: Emitter
      // dimensions: Dimensions
      // virtualScroll: VirtualScroll
      constructor({ wrapper = window, content = document.documentElement, wheelEventsTarget = wrapper, // deprecated
      eventsTarget = wheelEventsTarget, smoothWheel = true, syncTouch = false, syncTouchLerp = 0.075, touchInertiaMultiplier = 35, duration, // in seconds
      easing = (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), lerp = !duration && 0.1, infinite = false, orientation = 'vertical', // vertical, horizontal
      gestureOrientation = 'vertical', // vertical, horizontal, both
      touchMultiplier = 1, wheelMultiplier = 1, autoResize = true, prevent = false, __experimental__naiveDimensions = false, } = {}) {
          // __isSmooth: boolean = false // true if scroll should be animated
          this.__isScrolling = false; // true when scroll is animating
          this.__isStopped = false; // true if user should not be able to scroll - enable/disable programmatically
          this.__isLocked = false; // same as isStopped but enabled/disabled when scroll reaches target
          this.onVirtualScroll = ({ deltaX, deltaY, event }) => {
              // keep zoom feature
              if (event.ctrlKey)
                  return;
              const isTouch = event.type.includes('touch');
              const isWheel = event.type.includes('wheel');
              this.isTouching = event.type === 'touchstart' || event.type === 'touchmove';
              // if (event.type === 'touchend') {
              //   console.log('touchend', this.scroll)
              //   // this.lastVelocity = this.velocity
              //   // this.velocity = 0
              //   // this.isScrolling = false
              //   this.emit({ type: 'touchend' })
              //   // alert('touchend')
              //   return
              // }
              const isTapToStop = this.options.syncTouch &&
                  isTouch &&
                  event.type === 'touchstart' &&
                  !this.isStopped &&
                  !this.isLocked;
              if (isTapToStop) {
                  this.reset();
                  return;
              }
              const isClick = deltaX === 0 && deltaY === 0; // click event
              // const isPullToRefresh =
              //   this.options.gestureOrientation === 'vertical' &&
              //   this.scroll === 0 &&
              //   !this.options.infinite &&
              //   deltaY <= 5 // touch pull to refresh, not reliable yet
              const isUnknownGesture = (this.options.gestureOrientation === 'vertical' && deltaY === 0) ||
                  (this.options.gestureOrientation === 'horizontal' && deltaX === 0);
              if (isClick || isUnknownGesture) {
                  // console.log('prevent')
                  return;
              }
              // catch if scrolling on nested scroll elements
              let composedPath = event.composedPath();
              composedPath = composedPath.slice(0, composedPath.indexOf(this.rootElement)); // remove parents elements
              const prevent = this.options.prevent;
              if (!!composedPath.find((node) => {
                  var _a, _b, _c, _d, _e;
                  return (typeof prevent === 'function' ? prevent === null || prevent === void 0 ? void 0 : prevent(node) : prevent) ||
                      ((_a = node.hasAttribute) === null || _a === void 0 ? void 0 : _a.call(node, 'data-lenis-prevent')) ||
                      (isTouch && ((_b = node.hasAttribute) === null || _b === void 0 ? void 0 : _b.call(node, 'data-lenis-prevent-touch'))) ||
                      (isWheel && ((_c = node.hasAttribute) === null || _c === void 0 ? void 0 : _c.call(node, 'data-lenis-prevent-wheel'))) ||
                      (((_d = node.classList) === null || _d === void 0 ? void 0 : _d.contains('lenis')) &&
                          !((_e = node.classList) === null || _e === void 0 ? void 0 : _e.contains('lenis-stopped')));
              } // nested lenis instance
              ))
                  return;
              if (this.isStopped || this.isLocked) {
                  event.preventDefault(); // this will stop forwarding the event to the parent, this is problematic
                  return;
              }
              const isSmooth = (this.options.syncTouch && isTouch) ||
                  (this.options.smoothWheel && isWheel);
              if (!isSmooth) {
                  this.isScrolling = 'native';
                  this.animate.stop();
                  return;
              }
              event.preventDefault();
              let delta = deltaY;
              if (this.options.gestureOrientation === 'both') {
                  delta = Math.abs(deltaY) > Math.abs(deltaX) ? deltaY : deltaX;
              }
              else if (this.options.gestureOrientation === 'horizontal') {
                  delta = deltaX;
              }
              const syncTouch = isTouch && this.options.syncTouch;
              const isTouchEnd = isTouch && event.type === 'touchend';
              const hasTouchInertia = isTouchEnd && Math.abs(delta) > 5;
              if (hasTouchInertia) {
                  delta = this.velocity * this.options.touchInertiaMultiplier;
              }
              this.scrollTo(this.targetScroll + delta, Object.assign({ programmatic: false }, (syncTouch
                  ? {
                      lerp: hasTouchInertia ? this.options.syncTouchLerp : 1,
                  }
                  : {
                      lerp: this.options.lerp,
                      duration: this.options.duration,
                      easing: this.options.easing,
                  })));
          };
          this.onNativeScroll = () => {
              clearTimeout(this.__resetVelocityTimeout);
              delete this.__resetVelocityTimeout;
              if (this.__preventNextNativeScrollEvent) {
                  delete this.__preventNextNativeScrollEvent;
                  return;
              }
              if (this.isScrolling === false || this.isScrolling === 'native') {
                  const lastScroll = this.animatedScroll;
                  this.animatedScroll = this.targetScroll = this.actualScroll;
                  this.lastVelocity = this.velocity;
                  this.velocity = this.animatedScroll - lastScroll;
                  this.direction = Math.sign(this.animatedScroll - lastScroll);
                  // this.isSmooth = false
                  // this.isScrolling = this.hasScrolled ? 'native' : false
                  this.isScrolling = 'native';
                  this.emit();
                  if (this.velocity !== 0) {
                      this.__resetVelocityTimeout = setTimeout(() => {
                          this.lastVelocity = this.velocity;
                          this.velocity = 0;
                          this.isScrolling = false;
                          this.emit();
                      }, 400);
                  }
                  // this.hasScrolled = true
                  // }, 50)
              }
          };
          window.lenisVersion = version;
          // if wrapper is html or body, fallback to window
          if (wrapper === document.documentElement || wrapper === document.body) {
              wrapper = window;
          }
          this.options = {
              wrapper,
              content,
              wheelEventsTarget,
              eventsTarget,
              smoothWheel,
              syncTouch,
              syncTouchLerp,
              touchInertiaMultiplier,
              duration,
              easing,
              lerp,
              infinite,
              gestureOrientation,
              orientation,
              touchMultiplier,
              wheelMultiplier,
              autoResize,
              prevent,
              __experimental__naiveDimensions,
          };
          this.animate = new Animate();
          this.emitter = new Emitter();
          this.dimensions = new Dimensions({ wrapper, content, autoResize });
          // this.toggleClassName('lenis', true)
          this.updateClassName();
          this.userData = {};
          this.time = 0;
          this.velocity = this.lastVelocity = 0;
          this.isLocked = false;
          this.isStopped = false;
          // this.hasScrolled = false
          // this.isSmooth = syncTouch || smoothWheel
          // this.isSmooth = false
          this.isScrolling = false;
          this.targetScroll = this.animatedScroll = this.actualScroll;
          this.options.wrapper.addEventListener('scroll', this.onNativeScroll, false);
          this.virtualScroll = new VirtualScroll(eventsTarget, {
              touchMultiplier,
              wheelMultiplier,
          });
          this.virtualScroll.on('scroll', this.onVirtualScroll);
      }
      destroy() {
          this.emitter.destroy();
          this.options.wrapper.removeEventListener('scroll', this.onNativeScroll, false);
          this.virtualScroll.destroy();
          this.dimensions.destroy();
          this.cleanUpClassName();
          // this.rootElement.className = ''
          // this.toggleClassName('lenis', false)
          // this.toggleClassName('lenis-smooth', false)
          // this.toggleClassName('lenis-scrolling', false)
          // this.toggleClassName('lenis-stopped', false)
          // this.toggleClassName('lenis-locked', false)
      }
      on(event, callback) {
          return this.emitter.on(event, callback);
      }
      off(event, callback) {
          return this.emitter.off(event, callback);
      }
      setScroll(scroll) {
          // apply scroll value immediately
          if (this.isHorizontal) {
              this.rootElement.scrollLeft = scroll;
          }
          else {
              this.rootElement.scrollTop = scroll;
          }
      }
      resize() {
          this.dimensions.resize();
      }
      emit({ userData = {} } = {}) {
          this.userData = userData;
          this.emitter.emit('scroll', this);
          this.userData = {};
      }
      reset() {
          this.isLocked = false;
          this.isScrolling = false;
          this.animatedScroll = this.targetScroll = this.actualScroll;
          this.lastVelocity = this.velocity = 0;
          this.animate.stop();
      }
      start() {
          if (!this.isStopped)
              return;
          this.isStopped = false;
          this.reset();
      }
      stop() {
          if (this.isStopped)
              return;
          this.isStopped = true;
          this.animate.stop();
          this.reset();
      }
      raf(time) {
          const deltaTime = time - (this.time || time);
          this.time = time;
          this.animate.advance(deltaTime * 0.001);
      }
      scrollTo(target, { offset = 0, immediate = false, lock = false, duration = this.options.duration, easing = this.options.easing, lerp = !duration && this.options.lerp, onStart, onComplete, force = false, // scroll even if stopped
      programmatic = true, // called from outside of the class
      userData = {}, } = {}) {
          if ((this.isStopped || this.isLocked) && !force)
              return;
          // keywords
          if (['top', 'left', 'start'].includes(target)) {
              target = 0;
          }
          else if (['bottom', 'right', 'end'].includes(target)) {
              target = this.limit;
          }
          else {
              let node;
              if (typeof target === 'string') {
                  // CSS selector
                  node = document.querySelector(target);
              }
              else if (target === null || target === void 0 ? void 0 : target.nodeType) {
                  // Node element
                  node = target;
              }
              if (node) {
                  if (this.options.wrapper !== window) {
                      // nested scroll offset correction
                      const wrapperRect = this.options.wrapper.getBoundingClientRect();
                      offset -= this.isHorizontal ? wrapperRect.left : wrapperRect.top;
                  }
                  const rect = node.getBoundingClientRect();
                  target =
                      (this.isHorizontal ? rect.left : rect.top) + this.animatedScroll;
              }
          }
          if (typeof target !== 'number')
              return;
          target += offset;
          target = Math.round(target);
          if (this.options.infinite) {
              if (programmatic) {
                  this.targetScroll = this.animatedScroll = this.scroll;
              }
          }
          else {
              target = clamp(0, target, this.limit);
          }
          if (immediate) {
              this.animatedScroll = this.targetScroll = target;
              this.setScroll(this.scroll);
              this.reset();
              onComplete === null || onComplete === void 0 ? void 0 : onComplete(this);
              return;
          }
          if (target === this.targetScroll)
              return;
          if (!programmatic) {
              this.targetScroll = target;
          }
          this.animate.fromTo(this.animatedScroll, target, {
              duration,
              easing,
              lerp,
              onStart: () => {
                  // started
                  if (lock)
                      this.isLocked = true;
                  this.isScrolling = 'smooth';
                  onStart === null || onStart === void 0 ? void 0 : onStart(this);
              },
              onUpdate: (value, completed) => {
                  this.isScrolling = 'smooth';
                  // updated
                  this.lastVelocity = this.velocity;
                  this.velocity = value - this.animatedScroll;
                  this.direction = Math.sign(this.velocity);
                  this.animatedScroll = value;
                  this.setScroll(this.scroll);
                  if (programmatic) {
                      // wheel during programmatic should stop it
                      this.targetScroll = value;
                  }
                  if (!completed)
                      this.emit({ userData });
                  if (completed) {
                      this.reset();
                      this.emit({ userData });
                      onComplete === null || onComplete === void 0 ? void 0 : onComplete(this);
                      // avoid emitting event twice
                      this.__preventNextNativeScrollEvent = true;
                      // requestAnimationFrame(() => {
                      //   delete this.__preventNextNativeScrollEvent
                      // })
                  }
              },
          });
      }
      get rootElement() {
          return this.options.wrapper === window
              ? document.documentElement
              : this.options.wrapper;
      }
      get limit() {
          if (this.options.__experimental__naiveDimensions) {
              if (this.isHorizontal) {
                  return this.rootElement.scrollWidth - this.rootElement.clientWidth;
              }
              else {
                  return this.rootElement.scrollHeight - this.rootElement.clientHeight;
              }
          }
          else {
              return this.dimensions.limit[this.isHorizontal ? 'x' : 'y'];
          }
      }
      get isHorizontal() {
          return this.options.orientation === 'horizontal';
      }
      get actualScroll() {
          // value browser takes into account
          return this.isHorizontal
              ? this.rootElement.scrollLeft
              : this.rootElement.scrollTop;
      }
      get scroll() {
          return this.options.infinite
              ? modulo(this.animatedScroll, this.limit)
              : this.animatedScroll;
      }
      get progress() {
          // avoid progress to be NaN
          return this.limit === 0 ? 1 : this.scroll / this.limit;
      }
      // get isSmooth() {
      //   return this.__isSmooth
      // }
      // private set isSmooth(value: boolean) {
      //   if (this.__isSmooth !== value) {
      //     this.__isSmooth = value
      //     this.updateClassName()
      //   }
      // }
      get isScrolling() {
          return this.__isScrolling;
      }
      set isScrolling(value) {
          if (this.__isScrolling !== value) {
              this.__isScrolling = value;
              this.updateClassName();
          }
      }
      get isStopped() {
          return this.__isStopped;
      }
      set isStopped(value) {
          if (this.__isStopped !== value) {
              this.__isStopped = value;
              this.updateClassName();
          }
      }
      get isLocked() {
          return this.__isLocked;
      }
      set isLocked(value) {
          if (this.__isLocked !== value) {
              this.__isLocked = value;
              this.updateClassName();
          }
      }
      get isSmooth() {
          return this.isScrolling === 'smooth';
      }
      get className() {
          let className = 'lenis';
          if (this.isStopped)
              className += ' lenis-stopped';
          if (this.isLocked)
              className += ' lenis-locked';
          if (this.isScrolling)
              className += ' lenis-scrolling';
          if (this.isScrolling === 'smooth')
              className += ' lenis-smooth';
          // if (this.isScrolling === 'native') className += ' lenis-native'
          // if (this.isSmooth) className += ' lenis-smooth'
          return className;
      }
      updateClassName() {
          this.cleanUpClassName();
          this.rootElement.className =
              `${this.rootElement.className} ${this.className}`.trim();
          // this.emitter.emit('className change', this)
      }
      cleanUpClassName() {
          this.rootElement.className = this.rootElement.className
              .replace(/lenis(-\w+)?/g, '')
              .trim();
      }
  }

  return Lenis;

}));
//# sourceMappingURL=lenis.js.map
