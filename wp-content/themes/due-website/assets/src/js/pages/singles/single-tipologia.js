import {Viewer} from '@photo-sphere-viewer/core';

// Inicializa o Swiper para Tipologias
function initializeTipologiasSwiper() {
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
}

// Inicializa o Swiper para Galeria
function initializeGaleriaSwiper() {
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
}

function setupPlantSliders() {
  $('.slider-plantas li[data-row="1"]').addClass('active');
  $('.slider-conteudo li[data-row="1"]').addClass('active').fadeIn(300);

  initializeSlick($('.slider-conteudo li[data-row="1"]'));

  $('.slider-plantas li').on('click', function () {
    const rowNumber = $(this).data('row');

    $('.slider-plantas li').removeClass('active');
    $(this).addClass('active');

    $('.slider-conteudo li.active').fadeOut(300, function () {
      $(this).removeClass('active');
      const newContent = $(`.slider-conteudo li[data-row="${rowNumber}"]`);
      newContent.addClass('active').fadeIn(300, function () {
        initializeSlick(newContent);
      });
    });
  });

  // Marcar o primeiro item como ativo e inicializar o slider
  $('.slider-plantas-mobile').find('option[data-row="1"]').addClass('active');
  $('.slider-conteudo li[data-row="1"]').addClass('active').fadeIn(300);

  initializeSlick($('.slider-conteudo li[data-row="1"]'));

  // Evento de mudança no select ao invés de click no option
  $('.slider-plantas-mobile').on('change', function () {
    const rowNumber = $(this).find('option:selected').data('row');

    // Remove a classe 'active' de todas as opções e adiciona na selecionada
    $('.slider-plantas-mobile option').removeClass('active');
    $(this).find('option:selected').addClass('active');

    // Faz o fadeOut do conteúdo ativo atual e ativa o novo conteúdo
    $('.slider-conteudo li.active').fadeOut(300, function () {
      $(this).removeClass('active');
      const newContent = $(`.slider-conteudo li[data-row="${rowNumber}"]`);
      newContent.addClass('active').fadeIn(300, function () {
        initializeSlick(newContent);
      });
    });
  });

  function initializeSlick(contentElement) {
    const sliderFor = contentElement.find('.slider-for');
    const sliderNav = contentElement.find('.slider-nav');

    if (!sliderFor.hasClass('slick-initialized')) {
      sliderFor.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: sliderNav,
      });
    }

    if (!sliderNav.hasClass('slick-initialized')) {
      sliderNav.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: sliderFor,
        dots: true,
        centerMode: true,
        focusOnSelect: true,
      });
    }
  }
}

// Inicializa o Visualizador de Panorama
function initializePanoramaViewer() {
  const imagePath = image.url; // Certifique-se de que 'image' está definido no escopo

  new Viewer({
    container: 'viewer',
    panorama: imagePath,
  });
}

// Configura o Scroll para o Footer
function setupFooterScroll() {
  $('#irFooter').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate(
      {
        scrollTop: $(document).height(),
      },
      'slow'
    );
  });
}

// Configura a Animação dos Botões Fixos com GSAP
function setupFixedButtonsAnimation() {
  gsap.registerPlugin(ScrollTrigger);

  gsap.to('.botoes-fixed', {
    opacity: 0,
    zIndex: -1,
    duration: 0.5,
    ease: 'power1.out',
    scrollTrigger: {
      trigger: '.carrossel-tipologia',
      start: 'center center',
      end: 'bottom center',
      toggleActions: 'play none none reverse',
    },
  });
}

// Função de Inicialização Geral
function initSingleTipologia() {
  initializeTipologiasSwiper();
  initializeGaleriaSwiper();
  setupPlantSliders();
  initializePanoramaViewer();
  setupFooterScroll();
  setupFixedButtonsAnimation();
}

export {initSingleTipologia};
