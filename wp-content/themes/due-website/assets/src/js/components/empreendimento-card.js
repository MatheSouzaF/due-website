function addStatusClass($boxCard, status) {
  const statusMap = {
    'Em obra': 'em_obra',
    'Lançamento': 'lancamento',
    '100% vendido': 'vendido',
    'Últimas unidades': 'ultimas_unidades'
  };

  const statusClass = statusMap[status] || status;
  $boxCard.addClass(statusClass);
}

function updateCardContent(cardTemplate, empreendimento) {
  $(cardTemplate).find('.nome-empreendimento').text(empreendimento.name || 'N/A');
  $(cardTemplate).find('.localizacao-empreendimento').text(empreendimento.location || 'N/A');
  $(cardTemplate).find('.label-informativo').text(empreendimento.status || 'N/A');

  updateRooms(cardTemplate, empreendimento.rooms, empreendimento.isStudio);
  updateSize(cardTemplate, empreendimento.size);
  updateOffer(cardTemplate, empreendimento.offer, empreendimento.tituloOffer);
  updateMedia(cardTemplate, empreendimento.photo, empreendimento.video);
}

function updateRooms(cardTemplate, rooms, isStudio) {
  const quartos = rooms && rooms[0];
  const roomsText = quartos ? `${isStudio ? 'Studio e ' : ''}${quartos.minimo_de_quartos} a ${quartos.maximo_de_quartos} qtos` : 'N/A';
  $(cardTemplate).find('.info-quartos').text(roomsText);
}

function updateSize(cardTemplate, size) {
  const tamanho = size && size[0];
  const sizeText = tamanho ? `${tamanho.metragem_minima} a ${tamanho.metragem_maxima}m²` : 'N/A';
  $(cardTemplate).find('.info-tamanho').text(sizeText);
}

function updateOffer(cardTemplate, offer, tituloOffer) {
  $(cardTemplate).find('.valor').text(offer || 'N/A');
  $(cardTemplate).find('.entradas').text(tituloOffer || 'N/A');
}

function updateMedia(cardTemplate, photo, video) {
  if (photo && photo.url) {
    $(cardTemplate).find('.imagem-empreendimento').attr('src', photo.url);
  } else {
    $(cardTemplate).find('.imagem-empreendimento').hide();
  }

  if (video) {
    $(cardTemplate).find('.video-empreendimento').attr('src', video);
  } else {
    $(cardTemplate).find('.video-empreendimento').hide();
  }
}

export function createEmpreendimentoCard(empreendimento) {
  const template = document.getElementById('empreendimento-template');
  const cardTemplate = template.content.cloneNode(true);
  const $boxCard = $(cardTemplate).find('.box-card');
  $boxCard.attr('href', empreendimento.link)

  addStatusClass($boxCard, empreendimento.status);
  updateCardContent(cardTemplate, empreendimento);

  return cardTemplate;
}

export function updateResultsText($element, empreendimentoCount) {
  const text = empreendimentoCount === 1 ? `Selecionamos ${empreendimentoCount} imóvel para você` : `Selecionamos ${empreendimentoCount} imóveis para você`;
  $element.text(text);
}

export function clearContainer($container) {
  $container.html('');
}