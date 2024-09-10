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

function filterRota() {
  jQuery(document).ready(function ($) {
      // Inicialize todos os swipers
      var swipers = {};
      $('.swiper').each(function () {
          var id = $(this).attr('id');
          swipers[id] = new Swiper('#' + id, {
              slidesPerView: 1.2,
              spaceBetween: 24,

              navigation: {
                  nextEl: '.swiper-btn-destino-next',
                  prevEl: '.swiper-btn-destino-prev',
              },
              breakpoints: {
                  767: {
                      slidesPerView: 3.4,
                  },
              },
          });
      });

      // Mostrar o primeiro swiper
      $('#swiper-todos').show();

      // Clique nas categorias
      $('.item-rota').click(function () {
          var value = $(this).data('value'); // Pega o slug da categoria

          // Atualiza a classe ativa
          $('.item-rota').removeClass('item-rota-active');
          $(this).addClass('item-rota-active');

          // Esconde todos os swipers
          $('.swiper-rota-destino').hide();

          // Mostra o swiper correspondente
          $('#swiper-' + value).show();
      });
  });
}

function swiperInit() {
  const swiper = new Swiper('.swiper-rota-destino', {
    slidesPerView: 1.2,
    spaceBetween: 24,

    breakpoints: {
      767: {
        slidesPerView: 3,
      },
    },
    navigation: {
      nextEl: '.swiper-btn-next',
      prevEl: '.swiper-btn-prev',
    },
  });
}

function initSingleEmpreendimentos() {
  swiperInit()
  swiperDiferenciais();
  swiperGaleria();
  colorBullet();
  filterRota()
}

export {initSingleEmpreendimentos};
