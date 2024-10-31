function formRD() {
  const originalXHR = window.XMLHttpRequest.prototype.open;
  window.XMLHttpRequest.prototype.open = function() {
    this.addEventListener('load', function() {
      if (this.responseURL.includes('cta-redirect.rdstation.com/v2/conversions') && this.status === 200) {
        const $form = $('#conversion-form-rodape-rota, #conversion-form-newsletter, .box-formulario form');
        const $boxSucesso = $('.box-sucesso');

        $form.find('input[type="text"], input[type="email"], input[type="tel"], textarea').val('');
        $form.find('input[type="checkbox"], input[type="radio"]').prop('checked', false);
        $form.find('select').val('');

        $boxSucesso.addClass('visible');

        setTimeout(() => {
          $boxSucesso.removeClass('visible');
        }, 5000);

        console.log('RD Station Conversion Response:', this.response);
      }
    });
    originalXHR.apply(this, arguments);
  };

  $(document).on('click', '.close-feedback-sucesso', function() {
    $('.box-sucesso').removeClass('visible');
  });
}

function initFooter() {
  formRD();
}

export { initFooter };