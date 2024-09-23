import { Viewer } from '@photo-sphere-viewer/core';

// Inicializa o Swiper para Tipologias
const initializeTipologiasSwiper = () => {
  new Swiper('.tipologias-swiper', {
    slidesPerView: 1.1,
    spaceBetween: 24,
    breakpoints: {
      1024: {
        slidesPerView: 3.8,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
};

// Inicializa o Swiper para Galeria
const initializeGaleriaSwiper = () => {
  new Swiper('.swiper-galeria', {
    slidesPerView: 1.2,
    spaceBetween: 24,
    navigation: {
      nextEl: '.swiper-button-next-galeria',
      prevEl: '.swiper-button-prev-galeria',
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
      },
    },
  });
};

// Configura os Sliders de Plantas e Conteúdo
const setupPlantSliders = () => {
  $(document).ready(() => {
    // Define a row 1 como ativa inicialmente
    $('.slider-plantas li[data-row="1"]').addClass('active');
    $('.slider-conteudo li[data-row="1"]').addClass('active').fadeIn(300);

    // Evento de clique nas rows do slider de plantas
    $('.slider-plantas li').on('click', function () {
      const rowNumber = $(this).data('row');

      // Atualiza a classe 'active' no slider de plantas
      $('.slider-plantas li').removeClass('active');
      $(this).addClass('active');

      // Transição de fade entre conteúdos
      $('.slider-conteudo li.active').fadeOut(300, function () {
        $(this).removeClass('active');
        $(`.slider-conteudo li[data-row="${rowNumber}"]`)
          .addClass('active')
          .fadeIn(300);
      });
    });

    // Inicializa os sliders Slick
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav',
    });

    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      centerMode: true,
      focusOnSelect: true,
    });
  });
};

// Inicializa o Visualizador de Panorama
const initializePanoramaViewer = () => {
  const imagePath = image.url; // Certifique-se de que 'image' está definido no escopo

  new Viewer({
    container: 'viewer',
    panorama: imagePath,
  });
};

// Configura o Scroll para o Footer
const setupFooterScroll = () => {
  $('#irFooter').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate(
      {
        scrollTop: $(document).height(),
      },
      'slow'
    );
  });
};

// Configura a Animação dos Botões Fixos com GSAP
const setupFixedButtonsAnimation = () => {
  gsap.registerPlugin(ScrollTrigger);

  gsap.to('.botoes-fixed', {
    opacity: 0,
    duration: 0.5,
    ease: 'power1.out',
    scrollTrigger: {
      trigger: '.carrossel-tipologia',
      start: 'center center',
      end: 'bottom center',
      toggleActions: 'play none none reverse',
    },
  });
};

// Função de Inicialização Geral
function initSingleTipologia() {
  initializeTipologiasSwiper();
  initializeGaleriaSwiper();
  setupPlantSliders();
  initializePanoramaViewer();
  setupFooterScroll();
  setupFixedButtonsAnimation();
};

export { initSingleTipologia };
