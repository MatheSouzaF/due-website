function swiperInvista() {
  const swiper = new Swiper('.swiper-invista', {
    slidesPerView: 1.05,
    spaceBetween: 16,
    draggable: true,
    breakpoints: {
      767: {
        slidesPerView: 3.4,
      },
    },
    navigation: {
      nextEl: '.swiper-btn-next',
      prevEl: '.swiper-btn-prev',
    },
  });
}
function hoverCard() {
  $('.card-invista').hover(
    function () {
      $(this).addClass('hover-invista');
      var items = $(this).find('.item-invista-hover');
      items.each(function (index) {
        $(this)
          .delay(150 * index)
          .queue(function (next) {
            $(this).addClass('visible');
            next();
          });
      });
    },
    function () {
      $(this).removeClass('hover-invista');
      var items = $(this).find('.item-invista-hover');
      items.clearQueue().removeClass('visible');
    }
  );
}

function animationCards() {
  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.matchMedia({
    // This function will be called when the viewport width is greater than or equal to 1024px
    '(min-width: 1024px)': function () {
      const cardsInvista = document.querySelectorAll('.card-invista');

      function pathCard() {
        cardsInvista.forEach((card, i) => {
          gsap.to(card, {
            delay: i * 0.3,
            duration: 1.5,
            ease: 'power2.out', // Adiciona um easer para suavizar a animação
            onStart: () => card.classList.add('clipPath-invista'),
          });
        });
      }

      gsap.from('.invista', {
        scrollTrigger: {
          trigger: '.invista',
          ease: 'power2.out', // Adiciona um easer para suavizar a
          start: 'top-=500',
          onEnter: pathCard,
        },
      });
    },
  });
}
function initInvista() {
  swiperInvista();
  hoverCard();
  animationCards();
}

export {initInvista};
