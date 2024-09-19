function swiperEmpreendimento() {
  const swiper = new Swiper('.swiper-empreendimento', {
    spaceBetween: 16,
    draggable: true,
    breakpoints: {
      767: {
        slidesPerView: 2.4,
      },
      1024: {
        slidesPerView: 3.2,
      },
      1280: {
        slidesPerView: 3.4,
      },
    },
    navigation: {
      nextEl: '.swiper-btn-next',
      prevEl: '.swiper-btn-prev',
    },
  });
}
function wordAnimation() {
  var words = document.getElementsByClassName('word');
  var currentWord = 0;

  words[currentWord].style.opacity = 1;

  function changeWord() {
    var cw = words[currentWord];
    var nw = currentWord == words.length - 1 ? words[0] : words[currentWord + 1];

    animateWordOut(cw);
    animateWordIn(nw);

    currentWord = currentWord == words.length - 1 ? 0 : currentWord + 1;
  }

  function animateWordOut(cw) {
    cw.style.opacity = 0; // Pode ajustar com uma animação de transição
  }

  function animateWordIn(nw) {
    nw.style.opacity = 1; // Pode ajustar com uma animação de transição
  }

  changeWord();
  setInterval(changeWord, 2000);
}

// Adiciona um delay de 1 segundo antes de iniciar a animação
setTimeout(wordAnimation, 1000);

function cardHover() {
  $(document).ready(function () {
    $('.card-empreendimentos').hover(
      function () {
        // Mouse enter
        const video = $(this).find('.video-empreendimento');
        if (video.length) {
          video.css('opacity', 1);
          video[0].play();
        }
        $(this).addClass('hover-card');
      },
      function () {
        // Mouse leave
        const video = $(this).find('.video-empreendimento');
        if (video.length) {
          video.css('opacity', 0);
          video[0].pause();
          video[0].currentTime = 0;
        }

        // Adicionando o delay de 500ms
        setTimeout(() => {
          $(this).removeClass('hover-card');
        }, 500);
      }
    );
  });
}

function fadeConteudoEncantese() {
  $('.slide-effect')
    .mouseleave(function () {
      $(this).removeClass('clicked');
    })
    .click(function () {
      $(this).addClass('clicked').html($(this).html());
    });
}

function nossoProposito() {
  function initAnimations() {
    gsap.registerPlugin(ScrollTrigger);

    gsap.to('.img-proposito', {
      yPercent: 0.2,
      ease: 'none',
      scrollTrigger: {
        trigger: '.nosso-proposito',
        start: 'top-=400',
        end: 'bottom-=450',
        scrub: true,
      },
    });

    gsap.to('.video-proposito', {
      yPercent: -40,
      ease: 'none',
      scrollTrigger: {
        trigger: '.nosso-proposito',
        start: 'top-=300',
        end: 'bottom-=300',
        scrub: true,
      },
    });
  }

  function checkScreenWidth() {
    if (window.innerWidth >= 1023) {
      initAnimations();
    } else {
      ScrollTrigger.getAll().forEach((trigger) => trigger.kill());
    }
  }

  checkScreenWidth();

  window.addEventListener('resize', function () {
    checkScreenWidth();
  });
}
function encantese() {
  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.matchMedia({
    // This function will be called when the viewport width is greater than or equal to 1024px
    '(min-width: 1024px)': function () {
      const encanteseZoom = document.querySelector('.encante-se');

      const btnAppears = document.querySelector('.box-conteudo-right');
      const showSvg = document.querySelector('.svg-caribe');

      function bgOpen() {
        if (btnAppears) {
          btnAppears.classList.add('clipPath'); // Adiciona a classe 'background-open'
        }
      }

      let TLFADE = gsap.timeline({
        duration: 1,
        scrollTrigger: {
          trigger: '.encante-se',
          start: 'top center',
          onEnter: bgOpen,
        },
      });

      TLFADE.from(
        showSvg,
        {
          autoAlpha: 0,
          duration: 0.6,
        },
        '-=.2'
      );

      function zommOpen() {
        if (encanteseZoom) {
          encanteseZoom.classList.add('zoom'); // Adiciona a classe 'background-open'
        }
      }
      function bgClose() {
        if (encanteseZoom) {
          encanteseZoom.classList.remove('zoom'); // Remove a classe 'background-open'
        }
      }
      gsap.from('.encante-se', {
        scrollTrigger: {
          trigger: '.encante-se',
          start: 'top-=500',
          end: 'bottom-=400 ',
          scrub: true,
          onEnter: zommOpen,
          onLeave: bgClose,
        },
      });
    },
  });
}

function scrollsmooth() {
  gsap.registerPlugin(ScrollTrigger);

  const lenis = new Lenis({
    lerp: 0.07,
  });

  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });
}

function initPage() {
  swiperEmpreendimento();
  cardHover();
  fadeConteudoEncantese();
  encantese();
  nossoProposito();
  scrollsmooth();
  wordAnimation();
}

export {initPage};
