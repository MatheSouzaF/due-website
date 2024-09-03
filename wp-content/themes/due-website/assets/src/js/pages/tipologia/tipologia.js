import { renderFilters } from '../../components/filter';

async function tipologiaPage() {
  console.warn('Módulo Tipologia Iniciado!');

  try {
    // Tipologias passados via wp_localize
    const tipologiasData = TipologiasData.tipologias;
    console.log("🚀 ~ tipologiasData:", tipologiasData)

    function renderTipologias(tipologias) {
      const $container = $('.cards.container-tipologias');
      const $resultsLength = $('.results-length');
      $resultsLength.text(tipologias.length);
      $container.html('');

      if (tipologias.length === 0) {
        console.log('Nenhum tipologia para exibir.');
        return;
      }

      tipologias.forEach(function (tipologia) {
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

        $container.append(cardTemplate);
      });
    }

    function populateFilterOptions() {
      const locationOptions = [...new Set(tipologiasData.map((e) => e.location))];
      const statusOptions = [...new Set(tipologiasData.map((e) => e.status))];
      const empreendimentoOptions = [...new Set(tipologiasData.map((e) => e.project))];
      const diferenciaisOptions = [...new Set(tipologiasData.map((e) => e.diffs.map(diff => diff)))];

      const roomsOptions = new Set();
      tipologiasData.forEach((e) => {
        const minimo = parseInt(e.rooms[0].minimo_de_quartos_tipologia);
        const maximo = parseInt(e.rooms[0].maximo_de_quartos_tipologia);

        for (let i = minimo; i <= maximo; i++) {
          roomsOptions.add(i);
        }
      });

      const options = {
        'filter-location': Array.from(locationOptions).map((location) => ({ value: location, label: location })),
        'filter-status': Array.from(statusOptions).map((status) => ({ value: status, label: status })),
        'filter-empreendimento': Array.from(empreendimentoOptions).map((empreendimento) => ({ value: empreendimento, label: empreendimento })),
        'filter-diferenciais': Array.from(diferenciaisOptions).map((diferenciais) => ({ value: diferenciais, label: diferenciais })),
        'filter-rooms': Array.from(roomsOptions)
          .sort()
          .map((room) => ({ value: room, label: `${room} Quartos` })),
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
          tipologia.rooms.some(
            (room) =>
              roomsFilter.includes(room.minimo_de_quartos_tipologia.toString()) ||
              roomsFilter.includes(room.maximo_de_quartos_tipologia.toString())
          );
        const matchDiferenciais =
          !diferenciaisFilter ||
          tipologia.diffs.map(diff => diff)

        return matchLocation && matchStatus && matchEmpreendimento && matchDiferenciais && matchRooms;
      });
    }

    function generateBadge(filterValue, filterType) {
      const badgeTemplate = `
        <span class="badge ${filterType}">
          ${filterValue} ${filterType === 'rooms' ? ' qto' : ''}
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
