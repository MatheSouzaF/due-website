

function swiperEmpreendimentos() {
  new Swiper('.swiper-excelencia', {
    slidesPerView: 1.1,
    spaceBetween: 24,
    breakpoints: {
      1024: {
        slidesPerView: 2.2,
      },
      1440: {
        slidesPerView: 3.2,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
  new Swiper('.swiper-invista-empreendimento', {
    slidesPerView: 1.1,
    spaceBetween: 24,
    breakpoints: {
      1024: {
        slidesPerView: 3.2,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
}
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
function formRD() {
  const originalXHR = window.XMLHttpRequest.prototype.open;
  window.XMLHttpRequest.prototype.open = function () {
    this.addEventListener('load', function () {
      if (this.responseURL.includes('cta-redirect.rdstation.com/v2/conversions') && this.status === 200) {
        const $form = $('#conversion-form-rodape-rota, #conversion-form-newsletter, .box-formulario form');
        const $boxSucesso = $('.box-sucesso');

        $form.find('input[type="text"], input[type="email"], input[type="tel"], textarea').val('');
        $form.find('input[type="checkbox"], input[type="radio"]').prop('checked', false);
        $form.find('select').val('');

        $boxSucesso.addClass('visible');

        setTimeout(() => {
          $boxSucesso.removeClass('visible');
        }, 5000);

        console.log('RD Station Conversion Response:', this.response);
      }
    });
    originalXHR.apply(this, arguments);
  };

  $(document).on('click', '.close-feedback-sucesso', function () {
    $('.box-sucesso').removeClass('visible');
  });
}

function animationFooter() {
  function siteFooter() {
    var siteContent = $('.main-select');
    var siteFooter = $('footer');

    var siteFooterHeight = siteFooter.height();

    // console.log('Content Height = ' + siteContent.height() + 'px');
    // console.log('Footer Height = ' + siteFooterHeight + 'px');

    siteContent.css({
      'margin-bottom': siteFooterHeight + 320 + 'px',
    });
  }

  function initFooterAnimation() {
    if ($(window).width() > 1024) {
      siteFooter(); // Aplica o ajuste inicial
    }
  }

  initFooterAnimation();

  $(window).resize(function () {
    if ($(window).width() > 1024) {
      siteFooter();
    }
  });
}
function scrollTop() {
  $('.scroll-top').on('click', function (event) {
    event.preventDefault();
    var target = $(this).attr('href');
    console.warn('matheus');
    if ($(target).length) {
      $('html, body').animate(
        {
          scrollTop: $(target).offset().top,
        },
        800
      );
    }
  });
}
function initSelect() {
  swiperEmpreendimentos();
  videoFull();
  formRD();
  scrollTop();
  animationFooter();
  swiperMove();
}

export {initSelect};
