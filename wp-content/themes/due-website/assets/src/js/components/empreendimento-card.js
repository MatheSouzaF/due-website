function addStatusClass($boxCard, status) {
  const statusMap = {
    'Em obra': 'em_obra',
    "Lançamento": 'lancamento',
    "Em breve lançamento": 'lancamento',
    '100% vendido': 'vendido',
    'Pronto pra morar': 'pronto',
    'Últimas unidades': 'ultimas_unidades',
  };

  const statusClass = statusMap[status] || status;
  $boxCard.addClass(statusClass);
}

function updateCardContent(cardTemplate, empreendimento) {
  $(cardTemplate)
    .find('.nome-empreendimento')
    .text(empreendimento.name || 'N/A');
  $(cardTemplate)
    .find('.localizacao-empreendimento')
    .text(empreendimento.location || 'N/A');
  $(cardTemplate)
    .find('.label-informativo')
    .text(empreendimento.status || '');

  updateRooms(cardTemplate, empreendimento.rooms, empreendimento.isStudio);
  updateSize(cardTemplate, empreendimento.size);
  updateOffer(cardTemplate, empreendimento.offer, empreendimento.tituloOffer);
  updateMedia(cardTemplate, empreendimento.photo, empreendimento.video);
}

function updateRooms(cardTemplate, rooms, isStudio) {
  let roomsText = 'N/A';

  if (rooms && rooms.length > 0) {
    rooms.sort((a, b) => a - b).map(n => parseInt(n, 10));

    if (rooms.length === 1) {
      roomsText = `${isStudio ? 'Studio e ' : ''}${rooms[0]} ${rooms[0] === 1 ? 'quarto' : 'quartos'}`;
    } else if (rooms.length === 2) {
      roomsText = `${isStudio ? 'Studio, ' : ''}${rooms[0]} e ${rooms[1]} quartos`;
    } else {
      const minRoom = rooms[0];
      const maxRoom = rooms[rooms.length - 1];
      roomsText = `${isStudio ? 'Studio, ' : ''}${minRoom} a ${maxRoom} quartos`;
    }
  }

  $(cardTemplate).find('.info-quartos').text(roomsText);
}

function updateSize(cardTemplate, size) {
  const tamanho = size && size[0];
  const sizeText = tamanho
  ? tamanho.metragem_minima === tamanho.metragem_maxima
    ? `${tamanho.metragem_maxima}m²`
    : `${tamanho.metragem_minima} a ${tamanho.metragem_maxima}m²`
  : 'N/A';  
  $(cardTemplate).find('.info-tamanho').text(sizeText);
}

function updateOffer(cardTemplate, offer, tituloOffer) {
  $(cardTemplate)
    .find('.valor')
    .text(offer || 'N/A');
  $(cardTemplate)
    .find('.entradas')
    .text(tituloOffer || 'N/A');
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
  const $boxCard = $(cardTemplate).find('.card-empreendimentos');
  const $boxCardLink = $(cardTemplate).find('.box-card');

  $boxCardLink.attr('href', empreendimento.link);

  addStatusClass($boxCard, empreendimento.status);
  updateCardContent(cardTemplate, empreendimento);

  return cardTemplate;
}

export function updateResultsText($element, empreendimentoCount) {
  const text =
    empreendimentoCount === 1
      ? `Selecionamos <span class="bold-5">${empreendimentoCount} imóvel</span> para você`
      : `Selecionamos <span class="bold-5">${empreendimentoCount} imóveis</span> para você`;
  $element.html(text);
}

export function clearContainer($container) {
  $container.html('');
}
