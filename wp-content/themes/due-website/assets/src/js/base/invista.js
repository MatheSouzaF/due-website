function initInvista() {
  const swiper = new Swiper('.swiper-container', {
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

export {initInvista};
