import {Viewer} from '@photo-sphere-viewer/core';

function swiperTipologia() {
  var swiper = new Swiper('.tipologias-swiper', {
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

function plantas() {
  jQuery(document).ready(function ($) {
    // Função para iniciar mostrando a row 1 nas duas listas
    $('.slider-plantas li[data-row="1"]').addClass('active');
    $('.slider-conteudo li[data-row="1"]').addClass('active').fadeIn(300);

    // Evento de clique na row do slider-plantas
    $('.slider-plantas li').on('click', function () {
      var rowNumber = $(this).data('row'); // Obtem o número da row

      // Remove a classe 'active' de todas as rows na slider-plantas sem fade
      $('.slider-plantas li').removeClass('active');
      $(this).addClass('active');

      // Primeiro faz o fadeOut da row ativa em slider-conteudo
      $('.slider-conteudo li.active').fadeOut(300, function () {
        // Remove a classe 'active' após o fadeOut
        $(this).removeClass('active');

        // Só então faz o fadeIn da nova row correspondente
        $('.slider-conteudo li[data-row="' + rowNumber + '"]')
          .addClass('active')
          .fadeIn(300);
      });
    });
  });
}

function swiperGaleria() {
  var swiper = new Swiper('.swiper-galeria', {
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


function panorama() {
  const imagePath = image.url;

  new Viewer({
    container: 'viewer',
    panorama: imagePath,
  });
}

function irFooter() {
  $('#irFooter').on('click', function (e) {
    e.preventDefault(); // Impede a ação padrão do link
    $('html, body').animate(
      {
        scrollTop: $(document).height(),
      },
      'slow'
    );
  });
}

function btnFixed() {
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
}

function initSingleTipologia() {
  swiperTipologia();
  swiperGaleria();
  plantas();
  panorama();
  irFooter();
  btnFixed();
}

export {initSingleTipologia};
