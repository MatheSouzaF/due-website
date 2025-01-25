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
    breakpoints: {
      1024: {
        slidesPerView: 2.6,
        spaceBetween: 19,
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

function growNumbers() {
  function numbers() {
    // Função para incrementar o número
    function increment(span, finalVal, duration) {
      var currVal = 0;
      var increment = finalVal / (duration / 10); // Define o incremento
      var interval = setInterval(function () {
        currVal += increment;
        if (currVal >= finalVal) {
          currVal = finalVal;
          clearInterval(interval);
        }
        span.innerHTML = Math.floor(currVal); // Atualiza o valor do span
      }, 10); // Define o intervalo de tempo em milissegundos
    }

    // Seleciona todos os spans com a classe "numbers"
    var numberSpans = document.querySelectorAll('.numero');

    // Itera sobre cada span e define o incremento
    numberSpans.forEach(function (span) {
      var finalVal = parseInt(span.innerHTML, 10);
      span.innerHTML = '0'; // Define o valor inicial como 0
      increment(span, finalVal, 2000); // Passa a duração de 1000 ms (1 segundo)
    });
  }
  gsap.from('.transformando-vidas', {
    scrollTrigger: {
      trigger: '.transformando-vidas',
      start: 'top+=500 center',
      scrub: true,
      onEnter: numbers,
    },
  });
}

function bannerZoom() {
  gsap.registerPlugin(ScrollTrigger);

  // Animação do zoom suave
  gsap.to('.imagem-banner img, .imagem-banner video', {
    scrollTrigger: {
      trigger: '.imagem-banner',
      start: 'center center', // Quando o topo do componente entra no centro da viewport
      end: 'bottom center', // Quando o final do componente sai do centro da viewport
      scrub: 1, // Faz com que a animação seja sincronizada com o scroll
    },
    scale: 1.2, // Define o nível de zoom
    ease: 'power1.out',
  });
}
function initPage() {
  videoFull();
  initializeGaleriaSwiper();
  swiperAuto();
  bannerZoom();
  growNumbers();
}

export {initPage};
