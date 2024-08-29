function swiperDiferenciais() {
  const swiper = new Swiper('.swiper-diferenciais', {
    slidesPerView: 1,
    spaceBetween: 32,
    pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
    },
  });
}
function swiperGaleria() {
  const swiper = new Swiper('.swiper-galeria', {
    slidesPerView: 1,
    breakpoints: {
      767: {
        slidesPerView: 1.4,
      },
    },
    pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
    },
  });
}

function initSingleEmpreendimentos() {
  swiperDiferenciais();
  swiperGaleria();
}

export {initSingleEmpreendimentos};
