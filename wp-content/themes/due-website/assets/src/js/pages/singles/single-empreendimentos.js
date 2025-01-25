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
      clickable: true,
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

function filterExperiencias() {
  jQuery(document).ready(function ($) {
    // Inicialize todos os swipers
    var swipers = {};
    $('.swiper').each(function () {
      var id = $(this).attr('id');
      swipers[id] = new Swiper('#' + id, {
        slidesPerView: 1.1,
        a11y: false,
        spaceBetween: 16,

        navigation: {
          nextEl: '.swiper-btn-next',
          prevEl: '.swiper-btn-prev',
        },
        breakpoints: {
          768: {
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

    $('.item-rota').first().click();
  });
}

function swiperTipologia() {
  var slideCount = document.querySelectorAll('.tipologias-swiper .swiper-slide').length;
  var swiper = new Swiper('.tipologias-swiper', {
    slidesPerView: 1.2,
    centeredSlides: slideCount <= 2,
    spaceBetween: 24,
    breakpoints: {
      1024: {
        slidesPerView: 3,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
}


function animationPraia() {
  const praia = document.querySelector('.praia');
  const boxInfos = document.querySelectorAll('.box-infos-cards');

  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.praia',
      start: 'top-=400',
    },
  });

  TLFADE.from(praia, {
    duration: 1,
    ease: 'power.in',
    onStart: () => praia.classList.add('zoom'),
  }).from(
    boxInfos,
    {
      duration: 1,
      ease: 'power.in',
      onStart: () => {
        boxInfos.forEach((box) => box.classList.add('imgPath'));
      },
    },
    '-=1'
  );
}
function animationDiferenciais() {
  if (window.innerWidth > 1023) {
    const rowCards = document.querySelectorAll('.row-cards');
    gsap.fromTo(
      rowCards,
      {autoAlpha: 0, y: 50},
      {
        duration: 1,
        autoAlpha: 1,
        y: 0,
        stagger: 0.2,
        scrollTrigger: {
          trigger: '.diferenciais',
          start: 'top-=100 center',
        },
      }
    );
  }
}
function espaco() {
  $('.porcentagem').each(function () {
    // Seleciona o conteúdo de cada <p> individualmente
    var porcentagem = $(this).text();

    if (porcentagem) {
      // Converte para string, substitui ponto por vírgula (se houver)
      var porcentagemFormatada = porcentagem.toString().replace('.', ',');

      // Atualiza o conteúdo do elemento <p> com o valor formatado
      $(this).text(porcentagemFormatada);
    }
  });
}

function animationBanner() {
 
  const videoHero = document.querySelector('.video-hero');
  let TLFADE = gsap.timeline();


  TLFADE.from(
    videoHero,
    {
      delay: 0.5,
      duration: 1.5,
      onStart: () => videoHero.classList.add('zoom'),
    },
    '-=1'
  );
}

function initSingleEmpreendimentos() {
  swiperDiferenciais();
  swiperGaleria();
  colorBullet();
  filterExperiencias();
  swiperTipologia();

  animationPraia();
  animationDiferenciais();
  espaco();
  animationBanner();
}

export {initSingleEmpreendimentos};
