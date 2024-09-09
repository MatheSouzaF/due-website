function scrollsmooth() {
  gsap.registerPlugin(ScrollTrigger);

  const lenis = new Lenis({
    lerp: 0.07,
  });

  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });
}
function navbar() {
  $('#btn-navbar').click(function () {
    $('#btn-navbar').toggleClass('active-btn');
    $('.sidebar').toggleClass('active-sidebar');
  });
}

function menuMove() {
  const $navLinks = $('.btn-menu-navlink').not('.last-item');
  const $lastLink = $('.last-item');
  const $navigaton = $('.navigation__menu-label');
  const $boxSidebar = $('.box-sidebar');
  const $headerSticky = $('header');
  const $logoMenu = $('.link-logo-menu');
  const tl = gsap.timeline();

  $navLinks.each(function (index, link) {
    tl.to(link, {
      duration: 0.2,
      x: 60,
      opacity: 0,
      ease: 'power1.inOut',
      onComplete: function () {
        $(link).addClass('move-right');
      },
    });
  });

  $navLinks.each(function (index, link) {
    tl.set(link, {
      display: 'none',
    });
  });

  tl.to($lastLink, {
    duration: 0.2,
    opacity: 1,
    ease: 'power1.inOut',
  });

  tl.to([$navigaton, $logoMenu], {
    position: 'relative',
    opacity: 1,
    onComplete: function () {
      $boxSidebar.addClass('active-sidebar');
      $logoMenu.addClass('logo-sticky');
    },
  });

  tl.to($headerSticky, {
    height: '100px',
  });
}

function menuSticky() {
  const $boxSidebar = $('.box-sidebar');
  const $navigaton = $('.navigation__menu-label');
  const $headerSticky = $('header');
  const $logoMenu = $('.link-logo-menu');

  window.onscroll = function () {
    var header = document.querySelector('header');
    if (window.pageYOffset > 0) {
      if (!header.classList.contains('sticky')) {
        header.classList.add('sticky');
        menuMove();
      }
    } else {
      header.classList.remove('sticky');
      $boxSidebar.removeClass('active-sidebar');

      gsap.to($('.btn-menu-navlink'), {
        onComplete: function () {
          $(this.targets()).removeClass('fade-out move-right').css({
            transform: '',
            opacity: '',
            display: '',
          });
        },
      });

      gsap.to($navigaton, {
        position: '',
        opacity: '',
      });

      gsap.to($headerSticky, {
        height: '',
      });

      $logoMenu.removeClass('logo-sticky');
    }
  };

  $('.link-hover').on('click', function (e) {
    e.preventDefault();
    var target = this.hash;
    var $target = $(target);
    $('html, body')
      .stop()
      .animate(
        {
          scrollTop: $target.offset().top - 150,
        },
        900,
        'swing'
      );
  });
}



function hoverDestinos() {
  var tl = gsap.timeline({paused: true});
  tl.to('header', {
    duration: 0.5,
    height: '560px',
    backgroundColor: '#f4f4f4',
    ease: 'power1.inOut',
    onStart: function () {
      $('header').addClass('hover-destinos'); // Adiciona a classe no início da animação
    },
    onReverseComplete: function () {
      $('header').removeClass('hover-destinos'); // Remove a classe quando a animação reverte
    },
  });
  tl.to('.box-video-destinos', {
    duration: 0.3,
    zIndex: 1, // Aumenta o z-index para 1
    ease: 'power1.inOut',
    pointerEvents: 'initial',
  });
  tl.to('.row-videos', {
    duration: 0.6,
    clipPath: 'inset(0 0 -100px -100px)',
    stagger: 0.2,
    ease: 'power1.inOut',
  });

  function revertAnimation() {
    tl.reverse();
  }

  $('#destinos').hover(function () {
    tl.play();
  });

  $('header').mouseleave(function () {
    revertAnimation();
  });

  $('.btn-menu-navlink')
    .not('#destinos')
    .hover(function () {
      revertAnimation();
    });
}

function initHeader() {
  menuSticky();
  scrollsmooth();
  navbar();
  hoverDestinos();
}

export {initHeader};
