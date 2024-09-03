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

  bullets.forEach((bullet) => {
    const fillPercent = bullet.getAttribute('data-fill');
    const calculatedClipPath = `inset(0 calc(100% - ${fillPercent}) 0 0)`;

    // Define a variável CSS no próprio elemento bullet
    bullet.style.setProperty('--clip-path-value', calculatedClipPath);
  });

  $('.link-ancora').on('click', function (e) {
    var target = this.hash;
    if (target && $(target).length) {
      e.preventDefault();
      var $target = $(target);
      $('html, body')
        .stop()
        .animate(
          {
            scrollTop: $target.offset().top - 100,
          },
          900,
          'swing'
        );
    } else {
      window.location.href = this.href;
    }
  });
}

function initSingleEmpreendimentos() {
  swiperDiferenciais();
  swiperGaleria();
  colorBullet();
}

export {initSingleEmpreendimentos};
