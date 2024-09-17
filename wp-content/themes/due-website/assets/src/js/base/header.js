function scrollsmooth() {
  // Verifica se o usuário não está na home
  if (window.location.pathname !== '/') {
    gsap.registerPlugin(ScrollTrigger);

    const lenis = new Lenis({
      lerp: 0.07,
    });

    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
      lenis.raf(time * 1000);
    });
  }
}
function navbar() {
  $('#btn-navbar').click(function () {
    $('#btn-navbar').toggleClass('active-btn');
    $('.sidebar').toggleClass('active-sidebar');
  });
  $('#newsletter').click(function () {
    $('.box-newsletter').addClass('active-newsletter');
    $('#btn-navbar').addClass('index-sidebar');
  });
  $('#close-newsletter').click(function () {
    $('.box-newsletter').removeClass('active-newsletter');
    $('#btn-navbar').removeClass('index-sidebar');
  });
}
function menuSticky() {
  var offsetTop = 100; // Altere o valor conforme necessário

  $(window).scroll(function () {
    if ($(window).scrollTop() > offsetTop) {
      $('header').addClass('sticky');
    } else {
      $('header').removeClass('sticky');
    }
  });
}

function hoverDestinos() {
  var tl = gsap.timeline({paused: true});

  // Armazena a altura original do header
  var originalHeaderHeight = $('header').css('height');

  // Animação do header
  tl.to('header', {
    duration: 0.5,
    height: '590px',
    backgroundColor: '#faf2eb',
    ease: 'power1.inOut',
    onStart: function () {
      $('header').addClass('hover-destinos'); // Adiciona a classe no início da animação
    },
    onReverseComplete: function () {
      $('header').removeClass('hover-destinos'); // Remove a classe quando a animação reverte
    },
  });

  // Animação do box de vídeos destinos
  tl.to('.box-video-destinos', {
    duration: 0.3,
    zIndex: 1, // Aumenta o z-index para 1
    ease: 'power1.inOut',
    pointerEvents: 'initial',
  });

  // Animação dos rows de vídeos
  tl.to(
    '.row-videos',
    {
      duration: 0.6,
      clipPath: 'inset(0 0 -100px -100px)',
      stagger: 0.2,
      ease: 'power1.inOut',
    },
    '-=.8'
  );

  function revertAnimation() {
    // Cria uma nova timeline para reverter em ordem específica
    var reverseTL = gsap.timeline();

    // Primeiro reverte os .row-videos
    reverseTL.to('.row-videos', {
      duration: 0.6,
      clipPath: 'inset(0 0 100% 100%)', // Reverte o clipPath
      stagger: 0.2,
      ease: 'power1.inOut',
    });

    // Depois reverte o .box-video-destinos
    reverseTL.to(
      '.box-video-destinos',
      {
        duration: 0.3,
        zIndex: 0, // Volta o z-index para 0
        pointerEvents: 'none',
        ease: 'power1.inOut',
      },
      '-=.3'
    );

    // Por último reverte o header usando a altura original
    reverseTL.to('header', {
      duration: 0.5,
      height: originalHeaderHeight, // Volta para a altura original
      backgroundColor: 'transparent',
      ease: 'power1.inOut',
    });

    // Quando a reversão completa, garante que a timeline principal seja resetada para o início
    reverseTL.eventCallback('onComplete', function () {
      tl.pause(0); // Reseta a timeline principal para o início
    });
  }

  // Ao passar o mouse sobre #destinos, inicia a animação
  $('#destinos').hover(function () {
    tl.play();
  });

  // Ao sair com o mouse do header, reverte a animação
  $('header').mouseleave(function () {
    revertAnimation();
  });

  // Quando o mouse passar sobre qualquer link, exceto o #destinos, reverte a animação
  $('.btn-menu-navlink')
    .not('#destinos')
    .hover(function () {
      revertAnimation();
    });
}

function animationFooter() {
  function siteFooter() {
    var siteContent = $('main');
    var siteFooter = $('footer');

    var siteFooterHeight = siteFooter.height();

    console.log('Content Height = ' + siteContent.height() + 'px');
    console.log('Footer Height = ' + siteFooterHeight + 'px');

    siteContent.css({
      'margin-bottom': siteFooterHeight + 120 + 'px',
    });
  }

  function initFooterAnimation() {
    if ($(window).width() > 1024) {
      siteFooter(); // Aplica o ajuste inicial
    }
  }

  initFooterAnimation();

  $(window).resize(function () {
    if ($(window).width() > 1024) {
      siteFooter();
    }
  });
}

function initHeader() {
  menuSticky();
  scrollsmooth();
  navbar();
  hoverDestinos();
  animationFooter();
}

export {initHeader};
