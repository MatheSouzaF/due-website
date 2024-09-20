import { resetCheckboxesEmpreendimentos, resetCheckboxesTipologia } from "../utils/reset-filters"

function initTabToggle() {
  console.log('Init tab toggle')

  const $abaEmpreendimento = $(".aba-empreendimentos")
  const $abaTipologia = $(".aba-tipologias")

  const $showEmpreendimento = $(".show-empreendimentos")
  const $showTipologia = $(".show-tipologias")

  function showEmpreendimento({ tabRender }) {
    $abaEmpreendimento.show();
    $abaTipologia.hide();
    
    $showEmpreendimento.find('h2').addClass('active');
    $showTipologia.find('h2').removeClass('active');
    
    if (tabRender) {
      resetCheckboxesEmpreendimentos();
      history.pushState("", document.title, window.location.pathname);
    }
  }

  function showTipologia({ tabRender }) {
    
    $abaEmpreendimento.hide();
    $abaTipologia.show();
    
    $showTipologia.find('h2').addClass('active');
    $showEmpreendimento.find('h2').removeClass('active');
    
    if (tabRender) {
      resetCheckboxesTipologia();
      
      const newUrl = `${window.location.pathname}${window.location.hash}?tipologia=true`;
      window.history.pushState({}, document.title, newUrl);
    }
  }

  function getIsTipologia() {
    const params = new URLSearchParams(window.location.search);
    return Boolean(params.get('tipologia'));
  }

  if (getIsTipologia()) {
    showTipologia({ tabRender: false });
  } else {
    showEmpreendimento({ tabRender: false });
  }

  $showEmpreendimento.on('click', function () {
    showEmpreendimento({ tabRender: true });
  })

  $showTipologia.on('click', function () {
    showTipologia({ tabRender: true });
  })
}

export { initTabToggle }
