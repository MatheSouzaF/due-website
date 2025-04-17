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

  // Objeto para armazenar os dados do formulário
  const formData = {};

  // Inicializa o simulador ocultando o formulário, o step-indicator e o resultado
  $simuladorWrapper.hide();
  $stepIndicator.hide();
  $resultadoSection.hide();

  // Inicia o simulador ao clicar no botão "Comece Agora"
  $('.start-simulador').on('click', function () {
    $introSection.hide(); // Oculta a introdução
    $simuladorWrapper.show(); // Exibe o simulador
    $stepIndicator.show(); // Exibe o indicador de steps
    showStep(currentStep); // Mostra o primeiro step
  });

  function showStep(step) {
    // Atualiza a exibição dos steps
    $formSteps.removeClass('active');
    $formSteps.filter(`[data-step="${step}"]`).addClass('active');

    // Atualiza os indicadores de progresso
    $stepCircles.removeClass('active');
    if (step <= $stepCircles.length) {
      $stepCircles.each(function (index) {
        if (index + 1 === step) {
          $(this).addClass('active');
        }
      });
    }

    // Oculta o step-indicator no último step (dados-usuario)
    if (step === $formSteps.length) {
      $stepIndicator.addClass('hidden');
    } else {
      $stepIndicator.removeClass('hidden');
    }

    // Desabilita o botão "Avançar" no início do step
    const $currentStep = $formSteps.filter(`[data-step="${step}"]`);
    const $nextButton = $currentStep.find('.next-step');
    $nextButton.prop('disabled', true);

    // Verifica se já existe uma opção de rádio selecionada
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

  // Função para simular o envio do formulário
  function simulateFormSubmission() {
    // Adiciona dados mockados para simulação
    formData.mockData = {
      userId: '12345',
      sessionId: 'abcde',
      timestamp: new Date().toISOString(),
      exampleField: 'Example Value',
    };

    console.log('Dados simulados enviados:', formData);

    // Simula o envio bem-sucedido
    setTimeout(() => {
      $simuladorWrapper.hide(); // Oculta o simulador
      $resultadoSection.show(); // Exibe o resultado
    }, 1000); // Simula um atraso de 1 segundo
  }

  // Envio do formulário
  $simuladorForm.on('submit', function (e) {
    e.preventDefault(); // Impede o envio padrão do formulário

    // Coleta os dados do último step
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

    // Simula o envio do formulário
    simulateFormSubmission();
  });

  // Botão para simular envio manualmente (opcional para testes)
  $('.simulate-submit').on('click', function () {
    simulateFormSubmission();
  });
}

export {initSimulador};
