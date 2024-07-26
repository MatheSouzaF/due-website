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

function menuSticy() {
  $('.sidebar a').click(function () {
    $('#btn-navbar').removeClass('active-btn');
    $('.sidebar').removeClass('active-sidebar');
  });
  window.onscroll = function () {
    var header = document.querySelector('header');
    if (window.pageYOffset > 0) {
      header.classList.add('sticky');
    } else {
      header.classList.remove('sticky');
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
        'swing',
        function () {
          // window.location.hash = target;
        }
      );
  });
}
function navbar() {
  $('#btn-navbar').click(function () {
    $('#btn-navbar').toggleClass('active-btn');
    $('.sidebar').toggleClass('active-sidebar');
  });
}
function initHeader() {
  menuSticy();
  scrollsmooth();
  navbar();
}

export {initHeader};
