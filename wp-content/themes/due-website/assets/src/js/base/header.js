function scrollsmooth() {
  if (window.location.pathname.includes('empreendimentos')) return;

  gsap.registerPlugin(ScrollTrigger);

  const lenis = new Lenis({lerp: 0.07});
  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add((time) => lenis.raf(time * 1000));
}
function navbar() {
  $('.container-menu-lateral').click(function () {
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
  tl.to('header', {
    duration: 0.2,
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
  tl.to('.box-video-destinos', {
    duration: 0.2,
    zIndex: 1, // Aumenta o z-index para 1
    ease: 'power1.inOut',
    pointerEvents: 'initial',
  });
  tl.to('.row-videos', {
    duration: 0.2,
    clipPath: 'inset(0 0 -100px -100px)',
    ease: 'power1.inOut',
  });

  function revertAnimation() {
    tl.timeScale(3); // Aumenta a velocidade da animação reversa
    tl.reverse();
  }

  $('#destinos').hover(function () {
    tl.play();
  });

  $('header').mouseleave(function () {
    revertAnimation();
  });

  $('.btn-menu-navlink')
    .not('#destinos')
    .hover(function () {
      revertAnimation();
    });
}

function animationFooter() {
  function siteFooter() {
    var siteContent = $('.main');
    var siteFooter = $('footer');

    var siteFooterHeight = siteFooter.height();

    // console.log('Content Height = ' + siteContent.height() + 'px');
    // console.log('Footer Height = ' + siteFooterHeight + 'px');

    siteContent.css({
      'margin-bottom': siteFooterHeight + 320 + 'px',
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
function relaod() {
  let windowWidth = $(window).width();

  $(window).resize(function () {
    let newWindowWidth = $(window).width();
    if ((windowWidth > 768 && newWindowWidth <= 768) || (windowWidth <= 768 && newWindowWidth > 768)) {
      location.reload();
    }
  });
}

function callForm() {
  $('.ancora-footer').on('click', function (e) {
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

function fabFixed() {
  class FabButton extends HTMLElement {
    isOpenAttribute = 'is-open';

    constructor() {
      super();

      this.toggleButton = this.querySelector('.fab__toggle');
      this.isOpen = false;

      this.toggleButton.addEventListener('click', this._onToggleClick);
    }

    set isOpen(value) {
      this._isOpen = value;
      console.log('click', this._isOpen);
      this._isOpen ? this.setAttribute(this.isOpenAttribute, '') : this.removeAttribute(this.isOpenAttribute);
    }

    get isOpen() {
      return this._isOpen;
    }

    _onToggleClick = () => {
      this.isOpen = !this.isOpen;
    };
  }

  if ('customElements' in window) {
    customElements.define('fab-button', FabButton);
  }
}
function hoverJeitoDue() {
  var tl = gsap.timeline({ paused: true });

  // Define a animação para o header
  tl.to('header', {
    duration: 0.4,
    height: '282px',
    backgroundColor: '#faf2eb',
    ease: 'power1.inOut',
    onStart: function () {
      $('header').addClass('hover-box-cards'); // Adiciona a classe no início da animação
    },
    onReverseComplete: function () {
      $('header').removeClass('hover-box-cards'); // Remove a classe quando a animação reverte
    },
  });

  // Define o stagger para os elementos dentro do header
  tl.to('.header .some-element', {
    duration: 0.4,
    opacity: 1,
    stagger: 0.1, // Ajuste esse valor para controlar o intervalo entre as animações
    ease: 'power1.inOut',
  }, "+=0.3");

  // Define o stagger para os elementos dentro do .header
  tl.to('.header .some-image', {
    duration: 0.4,
    opacity: 1,
    clipPath: 'inset(0 0 -100px -100px)',
    ease: 'power1.inOut',
  }, "-=1.8");

  // Ao clicar no link com ID "jeito-due"
  $('#jeito-due').on('click', function (e) {
    e.preventDefault(); // Previne o comportamento padrão do link
    $('.header').addClass('hover-jeito-due'); // Adiciona a classe "hover-jeito-due"

    // Reinicia a animação do início
    tl.restart();
  });

  // Quando o mouse sai do <.header>
  $('.header').on('mouseleave', function () {
    // Aplica uma animação de saída direta ao .header
    gsap.to('.header', {
      height: '72px', // Reverte a altura para o valor original
      backgroundColor: 'initial', // Reverte a cor de fundo
      duration: 0.2,
      ease: 'power1.inOut',
      onComplete: function () {
        $('.header').removeClass('hover-jeito-due'); // Remove a classe "hover-jeito-due" após a animação
        $('.header').removeClass('hover-box-cards'); // Remove a classe "hover-box-cards" após a animação
      },
    });

    // Remove a opacidade de todos os elementos simultaneamente
    gsap.to('.header .some-element', {
      opacity: 0,
      duration: 0.2,
      ease: 'power1.inOut',
      onComplete: function () {
        tl.pause(0); // Reseta a timeline para o estado inicial
      },
    });

    gsap.to('.header .some-image', {
      opacity: 0,
      duration: 0.2,
      ease: 'power1.inOut',
      onComplete: function () {
        tl.pause(0); // Reseta a timeline para o estado inicial
      },
    });
  });
}


function initHeader() {
  menuSticky();
  scrollsmooth();
  navbar();
  hoverDestinos();
  animationFooter();
  relaod();
  callForm();
  fabFixed();
  hoverJeitoDue();
}

export {initHeader};
