function initTabToggle() {
  console.log('Init tab toggle')

  const $abaEmpreendimento = $(".aba-empreendimentos")
  const $abaTipologia = $(".aba-tipologias")
  
  const $showEmpreendimento = $(".show-empreendimentos")
  const $showTipologia = $(".show-tipologias")

  function resetCheckboxes() {
    $(".ckkBox").each(function() {
      $(this).prop('checked', false);
    });
  }

  function showEmpreendimento() {
    resetCheckboxes();
    $abaEmpreendimento.show();
    $abaTipologia.hide();
    $showEmpreendimento.find('h2').addClass('active');
    $showTipologia.find('h2').removeClass('active');
    
    history.pushState("", document.title, window.location.pathname);
  }
  
  function showTipologia() {
    resetCheckboxes();
    $abaEmpreendimento.hide();
    $abaTipologia.show();
    $showTipologia.find('h2').addClass('active');
    $showEmpreendimento.find('h2').removeClass('active');
    
    history.pushState("", document.title, window.location.pathname);
    window.location.hash = '#tipologias';
  }

  if (window.location.hash.includes('#tipologias')) {
    showTipologia();
  } else {
    showEmpreendimento(); 
  }

  $showEmpreendimento.on('click', function () {
    showEmpreendimento();
  })
  
  $showTipologia.on('click', function () {
    showTipologia();
  })
}

export { initTabToggle }
