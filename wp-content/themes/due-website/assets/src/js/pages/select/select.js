function select() {
  const carousel = document.querySelector('.investidores-carousel');
  const items = document.querySelectorAll('.row-investidores');
  const itemWidth = items[0].offsetWidth + 0; // Largura do card + espaçamento
  let position = 0;

  // Quantidade de tempo (em minutos) que o carrossel deve levar para reiniciar
  const targetDuration = 5; // 5 minutos
  const speed = 1; // Pixels por frame (ajustar para alterar a velocidade)
  const framesPerSecond = 60;
  const totalFrames = targetDuration * 60 * framesPerSecond; // Total de frames no tempo desejado
  const totalPixels = totalFrames * speed; // Quantidade de pixels a percorrer
  const visibleWidth = carousel.parentElement.offsetWidth; // Largura visível do carrossel
  const requiredItems = Math.ceil(totalPixels / itemWidth); // Número de itens necessários para preencher o tempo

  // Duplicar os itens até atingir a quantidade necessária
  const currentItems = items.length;
  for (let i = 0; i < requiredItems - currentItems; i++) {
    const clone = items[i % currentItems].cloneNode(true);
    carousel.appendChild(clone);
  }

  // Função para mover o carrossel
  function moveCarousel() {
    position -= speed; // Move para a esquerda
    carousel.style.transform = `translateX(${position}px)`;

    // Reinicia a posição quando todos os itens saírem da visão
    if (Math.abs(position) >= carousel.scrollWidth / 2) {
      position = 0; // Reinicia a posição
    }

    requestAnimationFrame(moveCarousel); // Continua o loop
  }

  moveCarousel(); // Inicia a animação
}

function swiperEmpreendimentos() {
  new Swiper('.swiper-excelencia', {
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

function initSelect() {
  select();
  swiperEmpreendimentos();
  videoFull();
}

export {initSelect};
