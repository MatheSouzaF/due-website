function bannerJeitoDUE() {
  const tituloJeito = document.querySelector('.titulo-jeito-due');
  const descricaoJeito = document.querySelector('.descricao-jeito-due');
  const imgBanner = document.querySelector('.box-video');

  let TLFADE = gsap.timeline();

  TLFADE.to(tituloJeito, {
    duration: 1,
    opacity: 1,
    x: 0,
  });

  TLFADE.to(
    descricaoJeito,
    {
      duration: 1,
      opacity: 1,
      x: 0,
    },
    '-=.8'
  );
  TLFADE.from(
    imgBanner,
    {
      duration: 1,
      onStart: () => imgBanner.classList.add('imgPath'),
    },
    '-=.5'
  );
}
function imagemGrow() {
  gsap.registerPlugin(ScrollTrigger);

  ScrollTrigger.matchMedia({
    // This function will be called when the viewport width is greater than or equal to 1024px
    '(min-width: 1024px)': function () {
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: '.box-video',
          scrub: 2,
          start: '.box-video',
          end: 'bottom+=500 center',
          pin: true,
        },
      });

      // Animação de rolagem
      tl.to('.imgGrow', {
        width: '100%',
        ease: 'power1.inOut',
      });
    },
  });
}
function nossoProposito() {
  gsap.registerPlugin(ScrollTrigger);

  const tituloProposito = document.querySelector('.titulo-proposito-jeito-due');
  const imgVideo = document.querySelector('.img-video');
  const cardRepetidor = document.querySelectorAll('.box-repeater');

  gsap.from(tituloProposito, {
    duration: 1,
    onStart: () => tituloProposito.classList.add('fade-left'),
    scrollTrigger: {
      trigger: '.proposito-jeito-due',
      start: 'top-=300',
    },
  });

  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.proposito-jeito-due',
      start: 'top-=300',
    },
  });

  TLFADE.from(
    imgVideo,
    {
      duration: 1,
      onStart: () => imgVideo.classList.add('imgPath'),
    },
    '-=.5'
  );

  cardRepetidor.forEach((card, i) => {
    TLFADE.from(
      card,
      {
        duration: 1,
        onStart: () => card.classList.add('fade-right'),
        stagger: 0.2 * i,
        ease: 'power.in',
      },
      '-=.6'
    );
  });
}

function backgroundReducaoSocial() {
  gsap.registerPlugin(ScrollTrigger);
  const btnAppears = document.querySelector('.reducao-social');

  function bgOpen() {
    if (btnAppears) {
      btnAppears.classList.add('background-open'); // Adiciona a classe 'background-open'
    }
  }

  function bgClose() {
    if (btnAppears) {
      btnAppears.classList.remove('background-open'); // Remove a classe 'background-open'
    }
  }

  gsap.from('.reducao-social', {
    scrollTrigger: {
      trigger: '.reducao-social',
      start: 'top-=200 center',
      scrub: true,
      onEnter: bgOpen,
      onLeaveBack: bgClose,
    },
  });
}

function reducaoSocial() {
  const imagemPath = document.querySelector('.box-img-reducao-social');
  const tituloFade = document.querySelector('.titulo-reducao-social');
  const descricaoFade = document.querySelector('.descricao-reducao-social');
  gsap.from(imagemPath, {
    duration: 1,
    ease: 'power.in',

    onStart: () => imagemPath.classList.add('imgPath'),
    scrollTrigger: {
      trigger: '.reducao-social',
      start: 'top-=400',
    },
  });
  gsap.from(tituloFade, {
    duration: 1,
    ease: 'power.in',

    onStart: () => tituloFade.classList.add('fade-left'),
    scrollTrigger: {
      trigger: '.reducao-social',
      start: 'top-=400',
    },
  });
  gsap.from(descricaoFade, {
    duration: 1.5,
    ease: 'power.in',

    onStart: () => descricaoFade.classList.add('fade-left'),
    scrollTrigger: {
      trigger: '.reducao-social',
      start: 'top-=350',
    },
  });
}

function cardRepetidor() {
  const cardRepetidor = document.querySelectorAll('.lista-card-right');
  const cardRepetidorLeft = document.querySelectorAll('.lista-card-left');

  let TLFADE = gsap.timeline({
    scrollTrigger: {
      trigger: '.box-repetidor',
      start: 'top-=500',
    },
  });

  cardRepetidor.forEach((card, i) => {
    TLFADE.from(
      card,
      {
        duration: 1.5,
        onStart: () => card.classList.add('imgPathRight'),
        ease: 'power.in',
      },
      0
    ); // Começa no mesmo tempo (posição 0 na timeline)
  });

  cardRepetidorLeft.forEach((card, i) => {
    TLFADE.from(
      card,
      {
        duration: 1.5,
        onStart: () => card.classList.add('imgPathLeft'),
        ease: 'power.in',
      },
      0
    ); // Começa no mesmo tempo (posição 0 na timeline)
  });
}

function bigNumero() {
  const imagemBigNumeros = document.querySelector('.img-path-big-numeros');
  const boxCardBigNumeros = document.querySelector('.box-card-big-numeros');
  gsap.from(imagemBigNumeros, {
    duration: 1,
    ease: 'power.in',

    onStart: () => imagemBigNumeros.classList.add('imgPath'),
    scrollTrigger: {
      trigger: '.big-numeros',
      start: 'top-=400',
    },
  });
  gsap.from(boxCardBigNumeros, {
    duration: 1,
    ease: 'power.in',

    onStart: () => boxCardBigNumeros.classList.add('imgPath'),
    scrollTrigger: {
      trigger: '.big-numeros',
      start: 'top-=300',
    },
  });
}

function modalJeitoDue() {
  $('.js-modal-jeito-due').on('click', function (e) {
    $('.box-img-repeater').addClass('modal-open-box-img');

    e.preventDefault();
    var msrc = $(this).data('src');
    $('.js-modal').find('.video-container').html(msrc);
    $('.js-modal').fadeIn();
  });

  $('.js-modal-close-jeito-due, .js-modal-close-btn-jeito-due').on('click', function (e) {
    $('.box-img-repeater').removeClass('modal-open-box-img');

    e.preventDefault();
    $('.js-modal').fadeOut(function () {
      $('.js-modal').find('.video-container').html('');
    });
  });
}

function faq() {
  // Deixa o primeiro desWrapper com display block
  jQuery('.desWrapper').first().css('display', 'block');
  jQuery('.title-svg').first().parent().addClass('active');

  jQuery('.title-svg').click(function () {
    var parent = jQuery(this).parent();
    var toggle = parent.find('.desWrapper');

    toggle.slideToggle('slow');
    parent.toggleClass('active');
    parent.find('.svg-faq').toggleClass('hover-svg-faq');
  });

  jQuery('.inactive').click(function () {
    jQuery(this).toggleClass('inactive active');
  });
}

function bannerSinttaStay() {
  const swiper = new Swiper('.swiper-sintta', {
    fadeEffect: {
      crossFade: true,
    },
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    effect: 'fade',
  });
  const swiperIniciativas = new Swiper('.swiper-iniciativas', {
    slidesPerView: 1.05,
    spaceBetween: 7,
    draggable: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      767: {
        spaceBetween: 16,
        slidesPerView: 3.4,
      },
    },
    navigation: {
      nextEl: '.swiper-btn-next',
      prevEl: '.swiper-btn-prev',
    },
  });
}
function videoFull() {
  $('.box-video').on('click', function (event) {
    event.preventDefault(); // Evita que o link siga o href

    // Animação de entrada
    gsap.to('.box-youtube-vivencie', {
      duration: 0.8,
      scale: 1,
      opacity: 1,
      ease: 'power3.out',
      onStart: function () {
        $('.box-youtube-vivencie').css('pointer-events', 'all'); // Permite interação
      },
    });

    // Adiciona a classe 'vivencie-modal' ao elemento '.vivencie'
    $('.sobre-a-due').addClass('vivencie-modal');
    $('.box-youtube-vivencie').addClass('box-youtube-vivencie-modal');

    lenis.stop(); // Pausa o scroll suave
  });

  $('.svg-close').on('click', function (event) {
    event.preventDefault(); // Evita que o link siga o href

    // Função para parar o vídeo
    function stopYouTubeVideo() {
      var $iframe = $('#youtube-player');
      var src = $iframe.attr('src'); // Captura o src atual
      $iframe.attr('src', ''); // Remove o src para parar o vídeo
      $iframe.attr('src', src); // Reatribui o src para resetar o player
    }

    stopYouTubeVideo();
    // Animação de saída
    gsap.to('.box-youtube-vivencie', {
      duration: 0.8,
      scale: 0,
      opacity: 0,
      ease: 'power3.in',
      onComplete: function () {
        $('.box-youtube-vivencie').css('pointer-events', 'none'); // Remove interação
      },
    });

    // Remove a classe 'vivencie-modal' do elemento '.vivencie'
    $('.sobre-a-due').removeClass('vivencie-modal');
    $('.box-youtube-vivencie').removeClass('box-youtube-vivencie-modal');

    lenis.start(); // Retoma o scroll suave
  });
}
function cursoVideo() {
  const $cursor = $('<div id="custom-cursor"></div>');
  $('body').append($cursor);

  // Estilizando o cursor customizado
  $('#custom-cursor').css({
    position: 'absolute',
    width: '80px',
    height: '80px',
    'background-image': `url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none"><rect x="0.5" y="0.5" width="79" height="79" rx="39.5" fill="white"/><rect x="0.5" y="0.5" width="79" height="79" rx="39.5" stroke="white"/><path d="M37 48V36.6316V32L48.7895 40L37 48Z" stroke="#003B4B"/></svg>')`,
    'background-size': 'contain',
    'pointer-events': 'none', // Evita interferências no clique
    'z-index': 9999,
    display: 'none', // Escondido por padrão
  });

  // Exibindo e movimentando o cursor na área da seção
  $('.box-video').on('mouseenter', function () {
    $('#custom-cursor').fadeIn();
    $('body').css('cursor', 'none'); // Esconde o cursor padrão
  });

  $('.box-video').on('mousemove', function (e) {
    gsap.to('#custom-cursor', {
      x: e.pageX - 40, // Centraliza o SVG no ponteiro
      y: e.pageY - 40,
      duration: 0.2,
    });
  });

  $('.box-video').on('mouseleave', function () {
    $('#custom-cursor').fadeOut();
    $('body').css('cursor', 'default'); // Restaura o cursor padrão
  });
}
function initJeitoDUE() {
  bannerJeitoDUE();
  imagemGrow();
  nossoProposito();
  backgroundReducaoSocial();
  reducaoSocial();
  cardRepetidor();
  bigNumero();
  modalJeitoDue();
  faq();
  bannerSinttaStay();
  videoFull();
  cursoVideo();
}

export {initJeitoDUE};
