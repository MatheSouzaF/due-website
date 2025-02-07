function openWhats() {
  $('.open-whats-credito').click(function () {
    $('.floating-button--close').remove();
  });
}


function ancoraDescubra() {
  $('.ancora-descubra').on('click', function (e) {
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


function accordeon() {
  const accordionTriggers = document.querySelectorAll('[data-toggle="accordion"]');

  const toggleItem = (trigger, isOpen) => {
    const content = trigger.closest(".duvidas-title-arrow").nextElementSibling;
    const arrow = trigger.closest(".duvidas-title-arrow").querySelector("svg");

    content.style.maxHeight = isOpen ? null : `${content.scrollHeight}px`;
    content.classList.toggle("open", !isOpen);
    content.closest(".duvidas-item").style.paddingBottom = isOpen ? "0" : "32px";
    arrow.style.transform = isOpen ? "rotate(180deg)" : "rotate(0deg)";
  };

  // Define estados iniciais e adiciona eventos de clique
  accordionTriggers.forEach((trigger, index) => {
    const isFirst = index === 0;
    toggleItem(trigger, !isFirst); // Abre o primeiro item, fecha os demais
    trigger.addEventListener("click", () => {
      document.querySelectorAll(".duvida-response-list.open").forEach(openContent => {
        const openTrigger = openContent.closest(".duvidas-item").querySelector('[data-toggle="accordion"]');
        if (openTrigger !== trigger) toggleItem(openTrigger, true);
      });
      toggleItem(trigger, trigger.closest(".duvidas-title-arrow").nextElementSibling.classList.contains("open"));
    });
  });
}


function homeResort() {
  var animation = lottie.loadAnimation({
    container: document.getElementById('descubra-lottie-animation'),
    renderer: 'svg',
    loop: false, // Inicialmente, sem loop
    autoplay: false, // A reprodução será controlada manualmente
    path: '/wp-content/themes/due-website/assets/src/lottie/due_infografico.json',

  });

  animation.addEventListener('complete', function () {
    animation.playSegments([145, 185], true);
  });

  gsap.registerPlugin(ScrollTrigger);

  ScrollTrigger.create({
    trigger: '.descubra-como-funciona',
    start: 'top center',
    once: true,
    onEnter: () => {
      animation.play();
    },
  });
}



function initCredito() {
  accordeon();
  homeResort();
  ancoraDescubra();
  openWhats();
}

export { initCredito };