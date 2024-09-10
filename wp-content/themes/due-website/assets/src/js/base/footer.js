function btnFixed() {
  gsap.registerPlugin(ScrollTrigger);

  gsap.to('.botoes-fixed', {
    opacity: 0,
    duration: 0.5,
    ease: 'power1.out',
    scrollTrigger: {
      trigger: 'footer',
      start: 'top center',
      end: 'top top',
      toggleActions: 'play none none reverse',
    },
  });
}

function formRD() {
  $(document).ready(function () {
    $(document).on('submit', '#rodape-rota-94b2c53eb7e8aa7ccc61 form', function (event) {
      event.preventDefault();
      var $form = $(this);
      $form.find('input[type="text"], input[type="email"], input[type="tel"], textarea').val(''); // Adiciona a limpeza do input type="tel"
      $form.find('input[type="checkbox"], input[type="radio"]').prop('checked', false);
    });
  });
}
function initFooter() {
  btnFixed();
  formRD();
}

export {initFooter};
