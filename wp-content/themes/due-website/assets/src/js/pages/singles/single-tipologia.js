import {Viewer} from '@photo-sphere-viewer/core';

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

function initializeGaleriaSwiper() {
  new Swiper('.swiper-galeria', {
    slidesPerView: 1.2,
    spaceBetween: 4,
    navigation: {
      nextEl: '.swiper-button-next-galeria',
      prevEl: '.swiper-button-prev-galeria',
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 8,
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
        slidesToShow: 'auto',
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true,
      });
    }
  }
}

function initializePanoramaViewer() {

  // image vem do wp_localize, precisa cadastrar uma imagem 360
  const imagePath = image.url;
  new Viewer({
    container: 'viewer',
    panorama: imagePath,
  });
}

function setupFooterScroll() {
  $(document).ready(function () {
    // Selecione o link ou botão que você deseja para ativar o scroll suave
    $('a[href="#call-form"]').on('click', function (e) {
      e.preventDefault(); // Impede o comportamento padrão de pular diretamente para a âncora

      // Suavemente fazer o scroll até o elemento alvo
      $('html, body').animate(
        {
          scrollTop: $('#call-form').offset().top,
        },
        800
      ); // A duração da animação em milissegundos (800ms para suavidade)
    });
  });
}

function setupFixedButtonsAnimation() {
  gsap.registerPlugin(ScrollTrigger);

  gsap.to('.botoes-fixed', {
    scrollTrigger: {
      trigger: document.body,
      start: 'top+=200px top',
      end: 'top top',
      toggleActions: 'play none reverse none',
      markers: false,
    },
    opacity: 1,
    zIndex: 9,
    duration: 0.5,
    ease: 'power1.inOut',
  });

  ScrollTrigger.create({
    trigger: '.carrossel-tipologia',
    start: 'top top',
    end: 'bottom top',
    toggleActions: 'play none none reverse',
    onEnter: () => {
      gsap.to('.botoes-fixed', {
        opacity: 0,
        zIndex: -1,
        duration: 0.5,
        ease: 'power1.inOut',
      });
    },
    onLeaveBack: () => {
      gsap.to('.botoes-fixed', {
        opacity: 1,
        zIndex: 9,
        duration: 0.5,
        ease: 'power1.inOut',
      });
    },
  });
}

function initSingleTipologia() {
  setupFooterScroll();
  initializeTipologiasSwiper();
  initializeGaleriaSwiper();
  window.onload = function () {
    setupPlantSliders();
};

  initializePanoramaViewer();
  setupFixedButtonsAnimation();
}

export {initSingleTipologia};
