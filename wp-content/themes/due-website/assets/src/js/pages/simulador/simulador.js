import { createEmpreendimentoCard } from "./card";

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

    if ($currentStep.hasClass('dados-cliente-step')) {
      checkRequiredFields($currentStep, $nextButton);
      
      $currentStep.find('input[required]').on('input', function() {
        checkRequiredFields($currentStep, $nextButton);
      });
    } else {
      const hasChecked = $currentStep.find('input[type="radio"]:checked').length > 0;
      if (hasChecked) {
        $nextButton.prop('disabled', false);
      }

      $currentStep.find('input[type="radio"]').on('change', function () {
        $nextButton.prop('disabled', false);
      });
    }
  }

  function checkRequiredFields($step, $button) {
    let allFilled = true;
    
    $step.find('input[required]').each(function() {
      if ($(this).val() === '') {
        allFilled = false;
        return false; // Sai do loop each
      }
    });
    
    $button.prop('disabled', !allFilled);
  }

  $('input[type=radio]').on('change', function () {
    const name = $(this).attr('name');
    
    formData[name] = $(this).val();

    $(`input[name="${name}"]`).each(function () {
      $(this).closest('.radio-card').removeClass('active');
    });

    $(this).closest('.radio-card').addClass('active');
  });

  $('.next-step').on('click', function () {
    const $current = $formSteps.filter('.active');
    const currentStepNumber = parseInt($current.data('step'));

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

    const faixaInvestimento = formData['faixa-investimento'];
    
    renderResultados(faixaInvestimento);

    $simuladorWrapper.hide();
    $resultadoSection.show();
  });

  function renderResultados(faixaInvestimento) {
    if (!window.simuladorData || !window.simuladorData.projects) {
      console.error('Dados dos empreendimentos não disponíveis');
      return;
    }

    const empreendimentosPermitidos = window.simuladorData.investmentRanges[faixaInvestimento] || [];

    const empreedimentosFiltrados = window.simuladorData.projects.filter(project => {
      return empreendimentosPermitidos.includes(project.name);
    });

    const $resultadoCards = $('#resultado-cards');
    $resultadoCards.empty();

    if (empreedimentosFiltrados.length > 0) {
      empreedimentosFiltrados.forEach(empreedimento => {
        const card = createEmpreendimentoCard(empreedimento);
        $resultadoCards.append(card);
      });
    } 
  }
}

export {initSimulador};
