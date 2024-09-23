

function formRD() {
  $(document).ready(function () {
    $(document).on('submit', '#rodape-rota-94b2c53eb7e8aa7ccc61 form', function (event) {
      event.preventDefault();
      var $form = $(this);
        var $boxSucesso = $('.box-sucesso');
      $form.find('input[type="text"], input[type="email"], input[type="tel"], textarea').val(''); // Adiciona a limpeza do input type="tel"
      $form.find('input[type="checkbox"], input[type="radio"]').prop('checked', false);
      $boxSucesso.addClass('visible');
      
    });
  });
}

function initFooter() {
  // btnFixed();
  formRD();
}

export {initFooter};
