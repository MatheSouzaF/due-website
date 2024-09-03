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
function navbar() {
  $('#btn-navbar').click(function () {
    $('#btn-navbar').toggleClass('active-btn');
    $('.sidebar').toggleClass('active-sidebar');
  });
}

function menuMove() {
  const $navLinks = $('.btn-menu-navlink').not('.last-item');
  const $lastLink = $('.last-item');
  const $navigaton = $('.navigation__menu-label');
  const $boxSidebar = $('.box-sidebar');
  const $headerSticky = $('header');
  const tl = gsap.timeline();

  // Primeira animação: move os links para a direita e diminui a opacidade
  $navLinks.each(function (index, link) {
    tl.to(link, {
      duration: 0.2,
      x: 60,
      opacity: 0,
      ease: 'power1.inOut',
      onComplete: function () {
        $(link).addClass('move-right');
      },
    });
  });

  // Após a animação, oculta os links com display: none
  $navLinks.each(function (index, link) {
    tl.set(link, {
      display: 'none',
    });
  });

  // Animação para o último link
  tl.to($lastLink, {
    duration: 0.2,
    opacity: 1,
    ease: 'power1.inOut',
  });

  // Animação para o elemento de navegação e adicionar a classe no box-sidebar
  tl.to($navigaton, {
    position: 'relative',
    opacity: 1,
    onComplete: function () {
      $boxSidebar.addClass('active-sidebar');
    },
  });
  tl.to($headerSticky, {
    height: '100px',
  });
}

function menuSticky() {
  const $boxSidebar = $('.box-sidebar');
  const $navigaton = $('.navigation__menu-label');
  const $headerSticky = $('header');

  window.onscroll = function () {
    var header = document.querySelector('header');
    if (window.pageYOffset > 0) {
      if (!header.classList.contains('sticky')) {
        header.classList.add('sticky');
        menuMove();
      }
    } else {
      header.classList.remove('sticky');

      // Remove a classe 'active-sidebar' do $boxSidebar primeiro
      $boxSidebar.removeClass('active-sidebar');

      // Remove as classes e estilos dos links com um atraso
      gsap.to($('.btn-menu-navlink'), {
        onComplete: function () {
          $(this.targets()).removeClass('fade-out move-right').css({
            transform: '',
            opacity: '',
            display: '',
          });
        },
      });

      // Reverte os estilos do $navigaton

      gsap.to($navigaton, {
        position: '',
        opacity: '',
      });
      gsap.to($headerSticky, {
        height: '',
      });
    }
  };

  $('.link-hover').on('click', function (e) {
    e.preventDefault();
    var target = this.hash;
    var $target = $(target);
    $('html, body')
      .stop()
      .animate(
        {
          scrollTop: $target.offset().top - 150,
        },
        900,
        'swing'
      );
  });
}

function initHeader() {
  menuSticky();
  scrollsmooth();
  navbar();
}

export {initHeader};
