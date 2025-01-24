function videoFull() {
  $('.box-button').on('click', function (event) {
    event.preventDefault(); // Evita que o link siga o href

    // Animação de entrada
    gsap.to('.box-youtube-vivencie', {
      duration: 0.8,
      scale: 1,
      opacity: 1,
      ease: 'power3.out',
      onStart: function () {
        $('.box-youtube-vivencie').css('pointer-events', 'all'); // Permite interação
      },
    });

    // Adiciona a classe 'vivencie-modal' ao elemento '.vivencie'
    $('.sobre-a-due').addClass('vivencie-modal');
    $('.box-youtube-vivencie').addClass('box-youtube-vivencie-modal');

    lenis.stop(); // Pausa o scroll suave
  });

  $('.svg-close').on('click', function (event) {
    event.preventDefault(); // Evita que o link siga o href

    // Função para parar o vídeo
    function stopYouTubeVideo() {
      var $iframe = $('#youtube-player');
      var src = $iframe.attr('src'); // Captura o src atual
      $iframe.attr('src', ''); // Remove o src para parar o vídeo
      $iframe.attr('src', src); // Reatribui o src para resetar o player
    }

    stopYouTubeVideo();
    // Animação de saída
    gsap.to('.box-youtube-vivencie', {
      duration: 0.8,
      scale: 0,
      opacity: 0,
      ease: 'power3.in',
      onComplete: function () {
        $('.box-youtube-vivencie').css('pointer-events', 'none'); // Remove interação
      },
    });

    // Remove a classe 'vivencie-modal' do elemento '.vivencie'
    $('.sobre-a-due').removeClass('vivencie-modal');
    $('.box-youtube-vivencie').removeClass('box-youtube-vivencie-modal');

    lenis.start(); // Retoma o scroll suave
  });
}

function initializeGaleriaSwiper() {
  new Swiper('.swiper-galeria', {
    slidesPerView: 1.2,
    spaceBetween: 8,
    navigation: {
      nextEl: '.swiper-button-next-galeria',
      prevEl: '.swiper-button-prev-galeria',
    },
    breakpoints: {
      1024: {
        slidesPerView: 2.6,
        spaceBetween: 19,
      },
    },
  });
}
function swiperAuto() {
  const swiperJuntos = new Swiper('.swiper-juntos', {
    fadeEffect: {
      crossFade: true,
    },
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    effect: 'fade',
  });
}
function initPage() {
  videoFull();
  initializeGaleriaSwiper();
  swiperAuto();
}

export {initPage};
