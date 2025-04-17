function initSimulador() {
  console.log('Page simulador loaded');

  const $formSteps = $('.form-step');
  const $stepCircles = $('.step-circle');
  const $stepIndicator = $('.step-indicator');
  const $introSection = $('.simulador-intro');
  const $simuladorWrapper = $('.simulador-wrapper');
  const $resultadoSection = $('.resultado-simulador');
  const $simuladorForm = $('#simuladorForm');
  let currentStep = 1;

  const formData = {};

  $simuladorWrapper.hide();
  $stepIndicator.hide();

  $('.start-simulador').on('click', function () {
    $introSection.hide();
    $simuladorWrapper.show();
    $stepIndicator.show();
    showStep(currentStep);
  });

  function showStep(step) {
    $formSteps.removeClass('active');
    $formSteps.filter(`[data-step="${step}"]`).addClass('active');

    $stepCircles.removeClass('active');
    if (step <= $stepCircles.length) {
      $stepCircles.each(function (index) {
        if (index + 1 === step) {
          $(this).addClass('active');
        }
      });
    }

    if (step === $formSteps.length) {
      $stepIndicator.addClass('hidden');
    } else {
      $stepIndicator.removeClass('hidden');
    }

    const $currentStep = $formSteps.filter(`[data-step="${step}"]`);
    const $nextButton = $currentStep.find('.next-step');
    $nextButton.prop('disabled', true);

    const hasChecked = $currentStep.find('input[type="radio"]:checked').length > 0;
    if (hasChecked) {
      $nextButton.prop('disabled', false);
    }

    // Habilita o botão "Avançar" quando uma opção de rádio for selecionada
    $currentStep.find('input[type="radio"]').on('change', function () {
      $nextButton.prop('disabled', false);
    });
  }

  // Troca visual dos radio cards ao selecionar uma opção
  $('input[type=radio]').on('change', function () {
    const name = $(this).attr('name');
    
    // Armazena o valor selecionado no objeto formData
    formData[name] = $(this).val();

    // Remove a classe 'active' de todos os radio cards do mesmo grupo
    $(`input[name="${name}"]`).each(function () {
      $(this).closest('.radio-card').removeClass('active');
    });

    // Adiciona a classe 'active' ao radio card selecionado
    $(this).closest('.radio-card').addClass('active');
  });

  // Botão "Avançar"
  $('.next-step').on('click', function () {
    const $current = $formSteps.filter('.active');
    const currentStepNumber = parseInt($current.data('step'));

    // Coleta os dados do step atual
    $current.find('input, select, textarea').each(function () {
      const name = $(this).attr('name');
      const value = $(this).val();
      if (name) {
        formData[name] = value;
      }
    });

    if (currentStep < $formSteps.length) {
      currentStep++;
      showStep(currentStep);
    }
  });

  // Botão "Voltar"
  $('.prev-step').on('click', function () {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  });

  $simuladorForm.on('submit', function (e) {
    e.preventDefault();

    $formSteps
      .filter('.active')
      .find('input, select, textarea')
      .each(function () {
        const name = $(this).attr('name');
        const value = $(this).val();
        if (name) {
          formData[name] = value;
        }
      });

    $resultadoSection.show()
  }); 
}

export {initSimulador};
