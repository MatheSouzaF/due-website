function btnFixed() {
  gsap.registerPlugin(ScrollTrigger);

  gsap.to('.botoes-fixed', {
    opacity: 0,
    duration: 0.5,
    ease: 'power1.out',
    scrollTrigger: {
      trigger: 'footer',
      start: 'top center',
      end: 'top top',
      toggleActions: 'play none none reverse',
    },
  });
}

function initFooter() {
  btnFixed();
}

export {initFooter};
