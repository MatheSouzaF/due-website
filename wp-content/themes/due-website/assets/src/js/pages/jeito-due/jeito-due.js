function bannerJeitoDUE() {
  const tituloJeito = document.querySelector('.titulo-jeito-due');
  const descricaoJeito = document.querySelector('.descricao-jeito-due');
  const imgBanner = document.querySelector('.box-video');

  let TLFADE = gsap.timeline();

  TLFADE.from(tituloJeito, {
    duration: 1,
    autoAlpha: 0,
    delay: 0.7,
    x: -100,
  });

  TLFADE.from(
    descricaoJeito,
    {
      duration: 1,
      autoAlpha: 0,
      x: 100,
    },
    '-=.5'
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
          start: 'top+=350 center',
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
function initJeitoDUE() {
  bannerJeitoDUE();
  imagemGrow();
  nossoProposito();
  backgroundReducaoSocial();
  reducaoSocial();
  cardRepetidor();
  bigNumero();
  modalJeitoDue();
}

export {initJeitoDUE};
