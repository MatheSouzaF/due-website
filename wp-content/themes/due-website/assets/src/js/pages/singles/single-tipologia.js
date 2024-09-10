import {Viewer} from '@photo-sphere-viewer/core';

function swiperTipologia() {
  var swiper = new Swiper('.tipologias-swiper', {
    slidesPerView: 1.2,
    spaceBetween: 24,
    breakpoints: {
      1024: {
        slidesPerView: 3,
      },
    },
  });
}
// function swiperPlantas() {
//   // Swiper principal para "gallery-top"
//   var galleryTop = new Swiper('.gallery-top', {
//     spaceBetween: 10,
//     effect: 'fade',
//     allowTouchMove: false,
//     fadeEffect: {
//       crossFade: true,
//     },
//     navigation: {
//       nextEl: '.swiper-button-next-top',
//       prevEl: '.swiper-button-prev-top',
//     },
//     slidesPerView: 1,
//   });

//   // Swiper para as miniaturas
//   var galleryThumbs = new Swiper('.gallery-thumbs', {
//     spaceBetween: 32,
//     slidesPerView: 4,
//     centeredSlides: true,
//     slideToClickedSlide: true,
//     speed: 300,
//     thumbs: {
//       swiper: galleryTop,
//     },
//   });
// }

// function swiperImagensPlantas() {
//   var checkSwiperElements = setInterval(function () {
//     var galleryPlantaEl = document.querySelector('.gallery-planta');
//     var galleryThumbsPlantasEl = document.querySelector('.gallery-thumbs-plantas');

//     if (galleryPlantaEl && galleryThumbsPlantasEl) {
//       clearInterval(checkSwiperElements); // Para de verificar quando os elementos forem encontrados

//       // Swiper principal para "gallery-planta"
//       var galleryPlanta = new Swiper('.gallery-planta', {
//         spaceBetween: 10,
//         effect: 'fade',
//         fadeEffect: {
//           crossFade: true,
//         },
//         slidesPerView: 1,
//         navigation: {
//           nextEl: '.swiper-button-next-planta',
//           prevEl: '.swiper-button-prev-planta',
//         },
//       });

//       // Swiper para as miniaturas de plantas
//       var galleryThumbsPlantas = new Swiper('.gallery-thumbs-plantas', {
//         spaceBetween: 32,
//         slidesPerView: 4,
//         centeredSlides: true,
//         slideToClickedSlide: true,
//         speed: 300,
//       });

//       galleryPlanta.controller.control = galleryThumbsPlantas;
//       galleryThumbsPlantas.controller.control = galleryPlanta;
//     }
//   }, 100); // Verifica a cada 100ms se os elementos estão no DOM
// }

function panorama() {
  const imagePath = '/wp-content/themes/due-website/assets/src/img/teste.jpg';

  new Viewer({
    container: 'viewer',
    panorama: imagePath,
  });
}

function initSingleTipologia() {
  swiperTipologia();
  // swiperPlantas();
  // swiperImagensPlantas();
  panorama();
}

export {initSingleTipologia};
