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

function initPage() {
  swiperBanner();
  swiperEmpreendimento();
  cardHover();
  fadeConteudoEncantese();
  encantese();
  nossoProposito();
}

export {initPage};
