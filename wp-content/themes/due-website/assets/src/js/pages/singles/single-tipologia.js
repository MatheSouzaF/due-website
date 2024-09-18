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
function swiperPlantas() {
  var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    effect: 'fade',
    allowTouchMove: false,
    fadeEffect: {
      crossFade: true,
    },
    navigation: {
      nextEl: '.swiper-button-next-top',
      prevEl: '.swiper-button-prev-top',
    },
    slidesPerView: 1,
  });

  var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 32,
    slidesPerView: 4,
    centeredSlides: true,
    slideToClickedSlide: true,
    speed: 300,
    thumbs: {
      swiper: galleryTop,
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

function initSingleTipologia() {
  swiperTipologia();
  swiperGaleria();
  swiperPlantas();
  panorama();
  irFooter();
}

export {initSingleTipologia};
