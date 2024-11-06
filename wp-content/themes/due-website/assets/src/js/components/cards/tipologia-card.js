import {updateOffer} from './update-offer';
import {updateRooms} from './update-rooms';

function updateSize(cardTemplate, size) {
  const tamanho = size && size[0];
  const sizeText = tamanho
    ? tamanho.metragem_minima_tipologia === tamanho.metragem_maxima_tipologia
      ? `${tamanho.metragem_maxima_tipologia}m²`
      : `${tamanho.metragem_minima_tipologia} a ${tamanho.metragem_maxima_tipologia}m²`
    : 'N/A';
  $(cardTemplate).find('.info-tamanho').text(sizeText);
}

function updateMedia(cardTemplate, photo, video) {
  if (photo && photo.url) {
    $(cardTemplate).find('.imagem-tipologia').attr('src', photo.url);
  } else {
    $(cardTemplate).find('.imagem-tipologia').hide();
  }

  if (video) {
    $(cardTemplate).find('.video-tipologia').attr('src', video);
  } else {
    $(cardTemplate).find('.video-tipologia').hide();
  }
}

function updateDiffs(cardTemplate, diffs) {
  const diffsContainer = $(cardTemplate).find('.box-tipos');
  diffs.forEach((diff) => {
    const diffTemplate = `
        <div class="linha-tipos">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <path d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z" stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <p class="titulo-tipos founders-grotesk">${diff}</p>
        </div>`;
    diffsContainer.append(diffTemplate);
  });
}

function addStatusClass($boxCard, status) {
  const statusMap = {
    'Em obra': 'em_obra',
    Lançamento: 'lancamento',
    'Em breve lançamento': 'lancamento',
    '100% vendido': 'vendido',
    'Pronto pra morar': 'pronto',
    'Últimas unidades': 'ultimas_unidades',
  };

  const statusClass = statusMap[status] || status;
  $boxCard.addClass(statusClass);
}

function updateCardContent(cardTemplate, tipologia) {
  $(cardTemplate)
    .find('.nome-tipologia')
    .text(tipologia.name || 'N/A');
  $(cardTemplate)
    .find('.nome-empreendimento')
    .text(tipologia.project || 'N/A');
  $(cardTemplate)
    .find('.fale-com-time')
    .append(
      tipologia.lastUnits.length
        ? `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="5" fill="#861D1D" /><circle cx="10" cy="10" r="9.5" stroke="#861D1D" /></svg>`
        : ''
    );
  $(cardTemplate)
    .find('.texto-fale')
    .text(tipologia.lastUnits || '');
  $(cardTemplate)
    .find('.localizacao-tipologia')
    .text(tipologia.location || 'N/A');
  $(cardTemplate)
    .find('.label-informativo')
    .text(tipologia.status || '');

  updateRooms(cardTemplate, tipologia.rooms, tipologia.isStudio);
  updateSize(cardTemplate, tipologia.size);
  updateOffer(cardTemplate, tipologia.offer, tipologia.tituloOffer);
  updateMedia(cardTemplate, tipologia.photo, tipologia.video);
  updateDiffs(cardTemplate, tipologia.diffs);
}

export function createTipologiaCard(tipologia) {
  const template = document.getElementById('tipologia-template');
  const cardTemplate = template.content.cloneNode(true);
  const $boxCard = $(cardTemplate).find('.box-card');
  $boxCard.attr('href', tipologia.link);

  addStatusClass($boxCard, tipologia.status);
  updateCardContent(cardTemplate, tipologia);

  return cardTemplate;
}
