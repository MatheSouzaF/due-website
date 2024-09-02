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

function colorBullet() {
  const bullets = document.querySelectorAll('.bullet');

  bullets.forEach(bullet => {
    const fillPercent = bullet.getAttribute('data-fill');
    const calculatedClipPath = `inset(0 calc(100% - ${fillPercent}) 0 0)`;

    // Define a variável CSS no próprio elemento bullet
    bullet.style.setProperty('--clip-path-value', calculatedClipPath);
  });

}


function initSingleEmpreendimentos() {
  swiperDiferenciais();
  swiperGaleria();
  colorBullet();
}

export {initSingleEmpreendimentos};
