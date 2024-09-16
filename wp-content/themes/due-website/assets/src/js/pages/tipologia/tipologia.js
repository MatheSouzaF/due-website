import { renderFilters } from '../../components/filter';

function tipologiaPage() {
  console.warn('Módulo Tipologia Iniciado!');

  try {
    // Tipologias passados via wp_localize
    const tipologiasData = TipologiasData.tipologias;

    function renderTipologias(tipologias) {
      const $container = $('.cards-tipologia.cards');
      const $resultsText = $('.tipologia-results-text');

      updateResultsText($resultsText, tipologias.length);
      clearContainer($container);

      if (tipologias.length === 0) {
        console.log('Nenhuma tipologia para exibir.');
        return;
      }

      tipologias.forEach(tipologia => {
        const cardTemplate = createTipologiaCard(tipologia);
        $container.append(cardTemplate);
      });
    }

    function updateResultsText($element, tipologiaCount) {
      const text = tipologiaCount === 1 ? `Selecionamos ${tipologiaCount} tipologia para você` : `Selecionamos ${tipologiaCount} tipologias para você`;
      $element.text(text);
    }

    function clearContainer($container) {
      $container.html('');
    }

    function createTipologiaCard(tipologia) {
      const template = document.getElementById('tipologia-template');
      const cardTemplate = template.content.cloneNode(true);
      const $boxCard = $(cardTemplate).find('.box-card');

      addStatusClass($boxCard, tipologia.status);
      updateCardContent(cardTemplate, tipologia);

      return cardTemplate;
    }

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

    function updateCardContent(cardTemplate, tipologia) {
      $(cardTemplate).find('.nome-tipologia').text(tipologia.name || 'N/A');
      $(cardTemplate).find('.nome-empreendimento').text(tipologia.project || 'N/A');
      $(cardTemplate).find('.localizacao-tipologia').text(tipologia.location || 'N/A');
      $(cardTemplate).find('.label-informativo').text(tipologia.status || 'N/A');

      updateRooms(cardTemplate, tipologia.rooms, tipologia.isStudio);
      updateSize(cardTemplate, tipologia.size);
      updateOffer(cardTemplate, tipologia.offer, tipologia.tituloOffer);
      updateMedia(cardTemplate, tipologia.photo, tipologia.video);
      updateDiffs(cardTemplate, tipologia.diffs);
    }

    function updateRooms(cardTemplate, rooms, isStudio) {
      const quartos = rooms && rooms[0];
      const roomsText = quartos ? `${isStudio ? 'Studio e ' : ''}${quartos.minimo_de_quartos_tipologia} a ${quartos.maximo_de_quartos_tipologia} qtos` : 'N/A';
      $(cardTemplate).find('.info-quartos').text(roomsText);
    }

    function updateSize(cardTemplate, size) {
      const tamanho = size && size[0];
      const sizeText = tamanho ? `${tamanho.metragem_minima_tipologia} a ${tamanho.metragem_maxima_tipologia}m²` : 'N/A';
      $(cardTemplate).find('.info-tamanho').text(sizeText);
    }

    function updateOffer(cardTemplate, offer, tituloOffer) {
      $(cardTemplate).find('.valor').text(offer || 'N/A');
      $(cardTemplate).find('.entradas').text(tituloOffer || 'N/A');
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
      diffs.forEach(diff => {
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

    function populateFilterOptions() {
      const locationOptions = [...new Set(tipologiasData.map((e) => e.location))];
      const statusOptions = [...new Set(tipologiasData.map((e) => e.status))];
      const empreendimentoOptions = [...new Set(tipologiasData.map((e) => e.project))];

      const diferenciaisOptions = [...new Set(tipologiasData.flatMap((e) => e.diffs))];

      const roomsOptions = new Set();
      tipologiasData.forEach((e) => {
        const minimo = parseInt(e.rooms[0].minimo_de_quartos_tipologia);
        const maximo = parseInt(e.rooms[0].maximo_de_quartos_tipologia);

        for (let i = minimo; i <= maximo; i++) {
          roomsOptions.add(i);
        }
      });

      const isStudio = tipologiasData.map(t => t.isStudio)

      const options = {
        'tipologia-filter-location': Array.from(locationOptions).map((location) => ({ value: location, label: location })),
        'tipologia-filter-status': Array.from(statusOptions).map((status) => ({ value: status, label: status })),
        'tipologia-filter-empreendimento': Array.from(empreendimentoOptions).map((empreendimento) => ({ value: empreendimento, label: empreendimento })),
        'tipologia-filter-diferenciais': Array.from(diferenciaisOptions).map((diferencial) => ({ value: diferencial, label: diferencial })),
        'tipologia-filter-rooms': [
          ...(isStudio ? [{ value: 'studio', label: 'Studio' }] : []),
          ...Array.from(roomsOptions)
            .sort()
            .map((room) => ({ value: room, label: `${room} Quartos` })),
        ],
      };

      return options;
    }

    const filters = {
      'tipologia-filter-location': $('#tipologia-filter-location'),
      'tipologia-filter-status': $('#tipologia-filter-status'),
      'tipologia-filter-empreendimento': $('#tipologia-filter-empreendimento'),
      'tipologia-filter-diferenciais': $('#tipologia-filter-diferenciais'),
      'tipologia-filter-rooms': $('#tipologia-filter-rooms'),
    };
    const options = populateFilterOptions();
    renderFilters(filters, options);

    function getFilterValue(selector) {
      const value = $(selector)
        .find('input:checked')
        .map(function () {
          return selector === '#tipologia-filter-diferenciais' ? this.value : this.value.toLowerCase();
        })
        .get();

      return value.length > 0 ? value : null;
    }

    function getFilterLabel(selector) {
      const value = $(selector)
        .find('input:checked')
        .map(function () {
          return this.value;
        })
        .get();

      return value.length > 0 ? value : null;
    }

    function filterTipologias(tipologias) {
      const locationFilter = getFilterValue('#tipologia-filter-location');
      const statusFilter = getFilterValue('#tipologia-filter-status');
      const empreendimentoFilter = getFilterValue('#tipologia-filter-empreendimento');
      const diferenciaisFilter = getFilterValue('#tipologia-filter-diferenciais');
      const roomsFilter = getFilterValue('#tipologia-filter-rooms');

      if (!locationFilter && !statusFilter && !empreendimentoFilter && !diferenciaisFilter && !roomsFilter) {
        return tipologias;
      }

      return tipologias.filter((tipologia) => {
        const matchLocation = !locationFilter || locationFilter.includes(tipologia.location.toLowerCase());
        const matchStatus = !statusFilter || statusFilter.includes(tipologia.status.toLowerCase());
        const matchEmpreendimento = !empreendimentoFilter || empreendimentoFilter.includes(tipologia.project.toLowerCase());

        const matchRooms = !roomsFilter ||
          (roomsFilter.includes('studio') ? tipologia.isStudio :
            tipologia.rooms.some((room) => {
              const minQuartos = parseInt(room.minimo_de_quartos_tipologia, 10);
              const maxQuartos = parseInt(room.maximo_de_quartos_tipologia, 10);
              return roomsFilter.some(
                (selectedRoom) => selectedRoom >= minQuartos && selectedRoom <= maxQuartos
              );
            })
          );

        const matchDiferenciais =
          !diferenciaisFilter ||
          diferenciaisFilter.every((diff) => tipologia.diffs.includes(diff));

        return matchLocation && matchStatus && matchEmpreendimento && matchDiferenciais && matchRooms;
      });
    }

    function generateBadge(filterValue, filterType) {
      let badgeLabel = filterValue;

      if (filterType === 'rooms' && filterValue !== 'studio') {
        badgeLabel += Number(filterValue) === 1 ? ' qto' : ' qtos';
      }

      const badgeTemplate = `
        <span class="badge ${filterType}">
          ${badgeLabel}
          <button type="button" class="tipologia-remove-badge" data-filter="${filterType}" data-value="${filterValue}">x</button>
        </span>
      `;

      $('.tipologia-filters-applied').append(badgeTemplate);
    }

    function updateBadges() {
      $('.tipologia-filters-applied').html('');

      const locationFilter = getFilterLabel('#tipologia-filter-location');
      const statusFilter = getFilterLabel('#tipologia-filter-status');
      const empreendimentoFilter = getFilterLabel('#tipologia-filter-empreendimento');
      const diferenciaisFilter = getFilterLabel('#tipologia-filter-diferenciais');
      const roomsFilter = getFilterLabel('#tipologia-filter-rooms');

      if (locationFilter) {
        locationFilter.forEach((value) => generateBadge(value, 'location'));
      }

      if (statusFilter) {
        statusFilter.forEach((value) => generateBadge(value, 'status'));
      }

      if (empreendimentoFilter) {
        empreendimentoFilter.forEach((value) => generateBadge(value, 'empreendimento'));
      }

      if (diferenciaisFilter) {
        diferenciaisFilter.forEach((value) => generateBadge(value, 'diferenciais'));
      }

      if (roomsFilter) {
        roomsFilter.forEach((value) => generateBadge(value, 'rooms'));
      }

      $('.tipologia-remove-badge').on('click', function () {
        const filterType = $(this).data('filter');
        const filterValue = $(this).data('value');

        $(`#tipologia-filter-${filterType} input[value="${filterValue}"]`).click();

        updateBadges();
        buildFilterUrl();
        filterAndRender();
      });
    }

    function buildFilterUrl() {
      const locationFilter = getFilterLabel('#tipologia-filter-location');
      const statusFilter = getFilterLabel('#tipologia-filter-status');
      const empreendimentoFilter = getFilterLabel('#tipologia-filter-empreendimento');
      const diferenciaisFilter = getFilterLabel('#tipologia-filter-diferenciais');
      const roomsFilter = getFilterLabel('#tipologia-filter-rooms');

      const params = new URLSearchParams();
      let hasFilters = false

      if (locationFilter) {
        const formattedLocation = locationFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('tipo-localizacao', formattedLocation);
        hasFilters = true;
      }

      if (statusFilter) {
        const formattedStatus = statusFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('tipo-estagio', formattedStatus);
        hasFilters = true;
      }

      if (empreendimentoFilter) {
        const formattedEmpreendimento = empreendimentoFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('tipo-empreendimento', formattedEmpreendimento);
        hasFilters = true;
      }

      if (diferenciaisFilter) {
        const formattedDiferenciais = diferenciaisFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('tipo-diferenciais', formattedDiferenciais);
        hasFilters = true;
      }

      if (roomsFilter) {
        const formattedRooms = roomsFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('tipo-qtos', formattedRooms);
        hasFilters = true;
      }

      if (hasFilters) {
        params.set('tipologia', 'true');
      }

      const newUrl = `${window.location.pathname}${window.location.hash}${params.toString().length ? '?' : ''}${params.toString()}`;
      window.history.pushState({}, '', newUrl);
    }

    function applyFiltersFromUrl() {
      const params = new URLSearchParams(window.location.search);

      const locationFilter = params.get('tipo-localizacao');
      const statusFilter = params.get('tipo-estagio');
      const empreendimentoFilter = params.get('tipo-empreendimento');
      const diferenciaisFilter = params.get('tipo-diferenciais');
      const roomsFilter = params.get('tipo-qtos');

      if (locationFilter) {
        locationFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-location input[value="${formattedValue}"]`).click();
        });
      }

      if (statusFilter) {
        statusFilter.split(',').forEach((value) => {
          let formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');

          formattedValue = formattedValue === '100 vendido' ? '100% vendido' : formattedValue;

          $(`#tipologia-filter-status input[value="${formattedValue}"]`).click();
        });
      }

      if (empreendimentoFilter) {
        empreendimentoFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-empreendimento input[value="${formattedValue}"]`).click();
        });
      }

      if (diferenciaisFilter) {
        diferenciaisFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-diferenciais input[value="${formattedValue}"]`).click();
        });
      }

      if (roomsFilter) {
        roomsFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-rooms input[value="${formattedValue}"]`).click();
        });
      }

      filterAndRender();
    }

    function filterAndRender() {
      const filteredTipologias = filterTipologias(tipologiasData);
      renderTipologias(filteredTipologias);
      updateBadges();
    }

    renderTipologias(tipologiasData);

    $('#tipologia-filter-location input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#tipologia-filter-status input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#tipologia-filter-empreendimento input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#tipologia-filter-diferenciais input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#tipologia-filter-rooms input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    applyFiltersFromUrl();
  } catch (error) {
    console.error('Erro no módulo de Tipologias:', error);
  }
}
function cardHover() {
  $(document).ready(function () {
    $('.card-tipologias').hover(
      function () {
        // Mouse enter
        const video = $(this).find('.video-tipologia');
        if (video.length) {
          video.css('opacity', 1);
          video[0].play();
        }
        $(this).addClass('hover-card');
      },
      function () {
        // Mouse leave
        const video = $(this).find('.video-tipologia');
        if (video.length) {
          video.css('opacity', 0);
          video[0].pause();
          video[0].currentTime = 0;
        }
        $(this).removeClass('hover-card');
      }
    );
  });
}


function initTipologia() {
  tipologiaPage();
  cardHover()
}

export { initTipologia };
