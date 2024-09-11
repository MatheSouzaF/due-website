import { renderFilters } from '../../components/filter';

async function tipologiaPage() {
  console.warn('Módulo Tipologia Iniciado!');

  try {
    // Tipologias passados via wp_localize
    const tipologiasData = TipologiasData.tipologias;

    function renderTipologias(tipologias) {
      const $container = $('.cards.container-tipologias');
      const $resultsText = $('.results-text');
      $resultsText.text(tipologias.length === 1 ? `Selecionamos ${tipologias.length} tipologia para você` : `Selecionamos ${tipologias.length} tipologias para você`);
      $container.html('');

      if (tipologias.length === 0) {
        console.log('Nenhum tipologia para exibir.');
        return;
      }

      tipologias.forEach(function (tipologia) {
        console.log("🚀 ~ tipologia:", tipologia)
        const template = document.getElementById('tipologia-template');
        const cardTemplate = template.content.cloneNode(true);

        $(cardTemplate)
          .find('.nome-tipologia')
          .text(tipologia.name || 'N/A');
        $(cardTemplate)
          .find('.nome-empreendimento')
          .text(tipologia.project || 'N/A');
        $(cardTemplate)
          .find('.localizacao-tipologia')
          .text(tipologia.location || 'N/A');
        $(cardTemplate)
          .find('.label-informativo')
          .text(tipologia.status || 'N/A');

        const quartos = tipologia.rooms && tipologia.rooms[0];
        $(cardTemplate)
          .find('.info-quartos')
          .text(quartos ? `${quartos.minimo_de_quartos_tipologia} a ${quartos.maximo_de_quartos_tipologia} qtos` : 'N/A');

        const tamanho = tipologia.size && tipologia.size[0];
        $(cardTemplate)
          .find('.info-tamanho')
          .text(tamanho ? `${tamanho.metragem_minima_tipologia} a ${tamanho.metragem_maxima_tipologia}m²` : 'N/A');

        $(cardTemplate)
          .find('.valor')
          .text(tipologia.offer || 'N/A');
        $(cardTemplate)
          .find('.entradas')
          .text(tipologia.tituloOffer || 'N/A');

        if (tipologia.photo && tipologia.photo.url) {
          $(cardTemplate).find('.imagem-tipologia').attr('src', tipologia.photo.url);
        } else {
          $(cardTemplate).find('.imagem-tipologia').hide();
        }

        if (tipologia.video) {
          $(cardTemplate).find('.video-tipologia').attr('src', tipologia.video);
        } else {
          $(cardTemplate).find('.video-tipologia').hide();
        }

        const diffsContainer = $(cardTemplate).find('.box-tipos');
        tipologia.diffs.forEach((diff) => {
          const diffTemplate = `
              <div class="linha-tipos">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <path
                    d="M6.33333 9.66667L8.33333 11.6667L11.6667 7M17 9C17 10.0506 16.7931 11.0909 16.391 12.0615C15.989 13.0321 15.3997 13.914 14.6569 14.6569C13.914 15.3997 13.0321 15.989 12.0615 16.391C11.0909 16.7931 10.0506 17 9 17C7.94943 17 6.90914 16.7931 5.93853 16.391C4.96793 15.989 4.08601 15.3997 3.34315 14.6569C2.60028 13.914 2.011 13.0321 1.60896 12.0615C1.20693 11.0909 1 10.0506 1 9C1 6.87827 1.84285 4.84344 3.34315 3.34315C4.84344 1.84285 6.87827 1 9 1C11.1217 1 13.1566 1.84285 14.6569 3.34315C16.1571 4.84344 17 6.87827 17 9Z"
                    stroke="#003B4B" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="titulo-tipos founders-grotesk">${diff}</p>
              </div>`;
          diffsContainer.append(diffTemplate);
        });

        $container.append(cardTemplate);
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
        'filter-location': Array.from(locationOptions).map((location) => ({ value: location, label: location })),
        'filter-status': Array.from(statusOptions).map((status) => ({ value: status, label: status })),
        'filter-empreendimento': Array.from(empreendimentoOptions).map((empreendimento) => ({ value: empreendimento, label: empreendimento })),
        'filter-diferenciais': Array.from(diferenciaisOptions).map((diferencial) => ({ value: diferencial, label: diferencial })),
        'filter-rooms': [
          ...(isStudio ? [{ value: 'studio', label: 'Studio' }] : []), 
          ...Array.from(roomsOptions)
            .sort()
            .map((room) => ({ value: room, label: `${room} Quartos` })),
        ],
      };
      
      return options;
    }


    populateFilterOptions();

    const filters = {
      'filter-location': $('#filter-location'),
      'filter-status': $('#filter-status'),
      'filter-empreendimento': $('#filter-empreendimento'),
      'filter-diferenciais': $('#filter-diferenciais'),
      'filter-rooms': $('#filter-rooms'),
    };

    const options = populateFilterOptions();
    renderFilters(filters, options);

    function getFilterValue(selector) {
      const value = $(selector)
        .find('input:checked')
        .map(function () {
          return this.value.toLowerCase();
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
      const locationFilter = getFilterValue('#filter-location');
      const statusFilter = getFilterValue('#filter-status');
      const empreendimentoFilter = getFilterValue('#filter-empreendimento');
      const diferenciaisFilter = getFilterValue('#filter-diferenciais');
      const roomsFilter = getFilterValue('#filter-rooms');

      if (!locationFilter && !statusFilter && !empreendimentoFilter && !diferenciaisFilter && !roomsFilter) {
        return tipologias;
      }

      return tipologias.filter((tipologia) => {
        const matchLocation = !locationFilter || locationFilter.includes(tipologia.location.toLowerCase());
        const matchStatus = !statusFilter || statusFilter.includes(tipologia.status.toLowerCase());
        const matchEmpreendimento = !empreendimentoFilter || empreendimentoFilter.includes(tipologia.project.toLowerCase());
        const matchRooms =
        !roomsFilter ||
        tipologia.isStudio && roomsFilter.includes('studio') || 
        tipologia.rooms.some(
          (room) => {
            const minQuartos = parseInt(room.minimo_de_quartos_tipologia);
            const maxQuartos = parseInt(room.maximo_de_quartos_tipologia);
            return roomsFilter.some(
              (selectedRoom) => selectedRoom >= minQuartos && selectedRoom <= maxQuartos
            );
          }
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
          <button type="button" class="remove-badge" data-filter="${filterType}" data-value="${filterValue}">x</button>
        </span>
      `;
    
      $('.filters-applied').append(badgeTemplate);
    }

    function updateBadges() {
      $('.filters-applied').html('');

      const locationFilter = getFilterLabel('#filter-location');
      const statusFilter = getFilterLabel('#filter-status');
      const empreendimentoFilter = getFilterLabel('#filter-empreendimento');
      const diferenciaisFilter = getFilterLabel('#filter-diferenciais');
      const roomsFilter = getFilterLabel('#filter-rooms');

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

      $('.remove-badge').on('click', function () {
        const filterType = $(this).data('filter');
        const filterValue = $(this).data('value');

        $(`#filter-${filterType} input[value="${filterValue}"]`).prop('checked', false);

        updateBadges();
        buildFilterUrl();
        filterAndRender();
      });
    }

    function buildFilterUrl() {
      const locationFilter = getFilterLabel('#filter-location');
      const statusFilter = getFilterLabel('#filter-status');
      const empreendimentoFilter = getFilterLabel('#filter-empreendimento');
      const diferenciaisFilter = getFilterLabel('#filter-diferenciais');
      const roomsFilter = getFilterLabel('#filter-rooms');

      const params = new URLSearchParams();

      if (locationFilter) {
        const formattedLocation = locationFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('localizacao', formattedLocation);
      }

      if (statusFilter) {
        const formattedStatus = statusFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('estagio', formattedStatus);
      }

      if (empreendimentoFilter) {
        const formattedEmpreendimento = empreendimentoFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('empreendimento', formattedEmpreendimento);
      }

      if (diferenciaisFilter) {
        const formattedDiferenciais = diferenciaisFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('diferenciais', formattedDiferenciais);
      }

      if (roomsFilter) {
        const formattedRooms = roomsFilter.map((value) => value.replace(/ /g, '_').replace(/%/g, '')).join(',');
        params.set('qtos', formattedRooms);
      }

      const newUrl = `${window.location.pathname}${params.toString().length ? '?' : ''}${params.toString()}`;
      window.history.pushState({}, '', newUrl);
    }

    function applyFiltersFromUrl() {
      const params = new URLSearchParams(window.location.search);

      const locationFilter = params.get('localizacao');
      const statusFilter = params.get('estagio');
      const empreendimentoFilter = params.get('empreendimento');
      const diferenciaisFilter = params.get('diferenciais');
      const roomsFilter = params.get('qtos');

      if (locationFilter) {
        locationFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#filter-location input[value="${formattedValue}"]`).click();
        });
      }

      if (statusFilter) {
        statusFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#filter-status input[value="${formattedValue}"]`).click();
        });
      }

      if (empreendimentoFilter) {
        empreendimentoFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#filter-empreendimento input[value="${formattedValue}"]`).click();
        });
      }

      if (diferenciaisFilter) {
        diferenciaisFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#filter-diferenciais input[value="${formattedValue}"]`).click();
        });
      }

      if (roomsFilter) {
        roomsFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#filter-rooms input[value="${formattedValue}"]`).click();
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

    $('#filter-location input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#filter-status input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#filter-empreendimento input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#filter-diferenciais input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#filter-rooms input.ckkBox').on('change', function () {
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


async function initTipologia() {
  await tipologiaPage();
}

export { initTipologia };
