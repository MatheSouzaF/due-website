function swiperEmpreendimento() {
  const swiper = new Swiper('.swiper-empreendimento', {
    spaceBetween: 16,
    draggable: true,
    breakpoints: {
      767: {
        slidesPerView: 2.4,
      },
      1024: {
        slidesPerView: 3.2,
      },
      1280: {
        slidesPerView: 3.4,
      },
    },
    navigation: {
      nextEl: '.swiper-btn-next',
      prevEl: '.swiper-btn-prev',
    },
  });
}
function cardHover() {
  $(document).ready(function () {
    $('.card-empreendimentos').hover(
      function () {
        // Mouse enter
        const video = $(this).find('.video-empreendimento');
        if (video.length) {
          video.css('opacity', 1);
          video[0].play();
        }
        $(this).addClass('hover-card');
      },
      function () {
        // Mouse leave
        const video = $(this).find('.video-empreendimento');
        if (video.length) {
          video.css('opacity', 0);
          video[0].pause();
          video[0].currentTime = 0;
        }
        $(this).removeClass('hover-card');
      }
    );
  });
}

function fadeConteudoEncantese() {
  $('.slide-effect')
    .mouseleave(function () {
      $(this).removeClass('clicked');
    })
    .click(function () {
      $(this).addClass('clicked').html($(this).html());
    });
}

function nossoProposito() {
  function initAnimations() {
    gsap.registerPlugin(ScrollTrigger);

    gsap.to('.img-proposito', {
      yPercent: 30,
      ease: 'none',
      scrollTrigger: {
        trigger: '.nosso-proposito',
        start: 'top-=400',
        end: 'bottom-=450',
        scrub: true,
      },
    });

    gsap.to('.video-proposito', {
      yPercent: -40,
      ease: 'none',
      scrollTrigger: {
        trigger: '.nosso-proposito',
        start: 'top-=300',
        end: 'bottom-=300',
        scrub: true,
      },
    });
  }

  function checkScreenWidth() {
    if (window.innerWidth >= 1023) {
      initAnimations();
    } else {
      ScrollTrigger.getAll().forEach((trigger) => trigger.kill());
    }
  }

  checkScreenWidth();

  window.addEventListener('resize', function () {
    checkScreenWidth();
  });
}
function encantese() {
  gsap.registerPlugin(ScrollTrigger);
  const encanteseZoom = document.querySelector('.encante-se');

  const btnAppears = document.querySelector('.box-conteudo-right');
  const showSvg = document.querySelector('.svg-caribe');

  function bgOpen() {
    if (btnAppears) {
      btnAppears.classList.add('clipPath'); // Adiciona a classe 'background-open'
    }
  }

  let TLFADE = gsap.timeline({
    duration: 1,
    scrollTrigger: {
      trigger: '.encante-se',
      start: 'top center',
      onEnter: bgOpen,
    },
  });

  TLFADE.from(
    showSvg,
    {
      autoAlpha: 0,
      duration: 0.6,
    },
    '-=.2'
  );

  function zommOpen() {
    if (encanteseZoom) {
      encanteseZoom.classList.add('zoom'); // Adiciona a classe 'background-open'
    }
  }
  function bgClose() {
    if (encanteseZoom) {
      encanteseZoom.classList.remove('zoom'); // Remove a classe 'background-open'
    }
  }
  gsap.from('.encante-se', {
    scrollTrigger: {
      trigger: '.encante-se',
      start: 'top-=500',
      end: 'bottom-=400 ',
      scrub: true,
      onEnter: zommOpen,
      onLeave: bgClose,
    },
  });
}
function swiperBanner() {
  var mySwiper = new Swiper('.swiper-banner', {
    loop: true,
    autoplayDisableOnInteraction: false,
    slidesPerView: 1,
    autoHeight: true,
    autoplay: {
      delay: 3000, // Match the animation time
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      type: 'bullets',
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + '<i></i>' + '<b></b>' + '</span>';
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  function modalBanner() {
    $('.js-modal-open-banner').on('click', function (e) {
      e.preventDefault();
      var msrc = $(this).data('src');
      $('.js-modal').find('.video-container').html(msrc);
      $('.js-modal').fadeIn();

      // Pausa o Swiper quando o modal é aberto
      mySwiper.autoplay.stop();
    });

    $('.js-modal-close, .js-modal-close-btn').on('click', function (e) {
      e.preventDefault();
      $('.js-modal').fadeOut(function () {
        $('.js-modal').find('.video-container').html('');

        // Retoma o Swiper quando o modal é fechado
        setTimeout(function () {
          mySwiper.autoplay.start();
        }, 0); // Pequeno delay para garantir que o swiper recomece corretamente
      });
    });
  }

  // Chama a função do modal
  modalBanner();
}
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

function animationBanner() {
  const header = document.querySelector('.header');
  const logo = document.querySelector('.box-svg-header');
  const logoMenu = document.querySelector('.link-logo-menu');
  const svgLogo = document.querySelector('.due-logo');
  const incorporadora = document.querySelector('.incorporadora');
  const body = document.querySelector('body');
  const boxbotões = document.querySelectorAll('.btn-menu-navlink');
  const tituloBanner = document.querySelector('.titulo-banner-hero');
  const subtituloBanner = document.querySelector('.subtitulo-banner-hero');
  const btnBanner = document.querySelector('.button-play');

  let TLFADE = gsap.timeline();
  TLFADE.to(logo, {top: '24px', transform: 'translate(-50%, 0)', duration: 0.7, deplay: 0.8, ease: 'power1.inOut'});
  TLFADE.to(svgLogo, {width: '70px', height: '64px', duration: 0.7, ease: 'power1.inOut'}, '-=0.7');
  TLFADE.to(logo, {left: '80px', transform: 'translate(0, 0)', duration: 0.7, ease: 'power1.inOut'});
  TLFADE.to(incorporadora, {opacity: '0', ease: 'power1.inOut'});
  TLFADE.to(incorporadora, {display: 'none'});
  TLFADE.to(header, {height: '72px', position: 'fixed', duration: 0.7}, '-=0.6');
  TLFADE.to(header, {background: 'transparent', duration: 0.4}, '-=0.6');
  TLFADE.to(boxbotões, {duration: 0.2, opacity: 1, stagger: 0.2});
  TLFADE.from(tituloBanner, {autoAlpha: 0, duration: '1', x: '-200%'}, '-=1');
  TLFADE.from(subtituloBanner, {autoAlpha: 0, duration: '1', x: '-200%'}, '-=.5');
  TLFADE.from(btnBanner, {autoAlpha: 0, duration: '1', x: '-200%'}, '-=.8');
  TLFADE.to(body, {overflow: 'hidden', cursor: 'initial', duration: 0.4});
  TLFADE.to(logoMenu, {
    position: 'initial',
    onComplete: function () {
      // Ativa a função scrollsmooth ao final da animação
      scrollsmooth();
      swiperBanner();
    },
  });
}

function initPage() {
  swiperEmpreendimento();
  cardHover();
  fadeConteudoEncantese();
  encantese();
  nossoProposito();
  animationBanner();
}

export {initPage};
