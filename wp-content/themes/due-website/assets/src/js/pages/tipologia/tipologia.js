import { renderFilters } from '../../components/filter';
import { initBanner } from '../../components/banner';

function tipologiaPage() {
  console.warn('Módulo Tipologia Iniciado!');

  try {
    // Tipologias passadas via wp_localize
    const tipologiasData = TipologiasData.tipologias;
    console.log("🚀 ~ tipologiasData:", tipologiasData)

    function renderTipologias(tipologias) {
      const $container = $('.cards-tipologia.cards');
      const $resultsText = $('.tipologia-results-text');

      updateResultsText($resultsText, tipologias.length);
      clearContainer($container);

      if (tipologias.length === 0) {
        console.log('Nenhuma tipologia para exibir.');
        return;
      }

      tipologias.forEach((tipologia) => {
        const cardTemplate = createTipologiaCard(tipologia);
        $container.append(cardTemplate);
      });
    }

    function updateResultsText($element, tipologiaCount) {
      const text =
        tipologiaCount === 1
          ? `Selecionamos <span class="bold-5">${tipologiaCount} tipologia</span>  para você`
          : `Selecionamos <span class="bold-5">${tipologiaCount} tipologias</span>  para você`;
      $element.html(text);
    }

    function clearContainer($container) {
      $container.html('');
    }

    function createTipologiaCard(tipologia) {
      const template = document.getElementById('tipologia-template');
      const cardTemplate = template.content.cloneNode(true);
      const $boxCard = $(cardTemplate).find('.box-card');
      $boxCard.attr('href', tipologia.link);

      addStatusClass($boxCard, tipologia.status);
      updateCardContent(cardTemplate, tipologia);

      return cardTemplate;
    }

    function addStatusClass($boxCard, status) {
      const statusMap = {
        'Em obra': 'em_obra',
        Lançamento: 'lancamento',
        '100% vendido': 'vendido',
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
          .append(tipologia.lastUnits.length ? `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="5" fill="#861D1D" /><circle cx="10" cy="10" r="9.5" stroke="#861D1D" /></svg>` : '')
      $(cardTemplate)
        .find('.texto-fale')
        .text(tipologia.lastUnits || '');
      $(cardTemplate)
        .find('.localizacao-tipologia')
        .text(tipologia.location || 'N/A');
      $(cardTemplate)
        .find('.label-informativo')
        .text(tipologia.status || 'N/A');


      updateRooms(cardTemplate, tipologia.rooms, tipologia.isStudio);
      updateSize(cardTemplate, tipologia.size);
      updateOffer(cardTemplate, tipologia.offer, tipologia.tituloOffer);
      updateMedia(cardTemplate, tipologia.photo, tipologia.video);
      updateDiffs(cardTemplate, tipologia.diffs);
    }

    function updateRooms(cardTemplate, rooms, isStudio) {
      const quartos = rooms && rooms[0];
      let roomsText = 'N/A';

      if (quartos) {
        const minQuartos = parseInt(quartos.minimo_de_quartos_tipologia, 10);
        let maxQuartos = parseInt(quartos.maximo_de_quartos_tipologia, 10);

        if (isNaN(maxQuartos) || maxQuartos === 0 || maxQuartos === 1) {
          roomsText = `${isStudio ? 'Studio e ' : ''} ${minQuartos} ${minQuartos === 1 ? 'qto' : 'qtos'}`;
        } else {
          roomsText = `${isStudio ? 'Studio e ' : ''}${minQuartos} a ${maxQuartos} qtos`;
        }
      }

      $(cardTemplate).find('.info-quartos').text(roomsText);
    }

    function updateSize(cardTemplate, size) {
      const tamanho = size && size[0];
      const sizeText = tamanho
        ? tamanho.metragem_minima_tipologia === tamanho.metragem_maxima_tipologia
          ? `${tamanho.metragem_maxima_tipologia}m²`
          : `${tamanho.metragem_minima_tipologia} a ${tamanho.metragem_maxima_tipologia}m²`
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

    function populateFilterOptions() {
      const locationOptions = [...new Set(tipologiasData.map((e) => e.location))];
      const statusOptions = [...new Set(tipologiasData.map((e) => e.status))];
      const empreendimentoOptions = [...new Set(tipologiasData.map((e) => e.project))];

      const diferenciaisOptions = [...new Set(tipologiasData.flatMap((e) => e.diffs))];

      const roomsOptions = new Set();
      tipologiasData.forEach((e) => {
        if (e.rooms && e.rooms.length > 0) {
          let minimo = parseInt(e.rooms[0].minimo_de_quartos_tipologia, 10);
          let maximo = parseInt(e.rooms[0].maximo_de_quartos_tipologia, 10);

          if (isNaN(minimo) || minimo <= 1) {
            minimo = 1;
          }

          if (isNaN(maximo) || maximo <= 1) {
            maximo = 1;
          }

          if (maximo < minimo) {
            maximo = minimo;
          }

          for (let i = minimo; i <= maximo; i++) {
            roomsOptions.add(i);
          }
        }
      });

      const isStudio = tipologiasData.map((t) => t.isStudio).includes(true);

      const options = {
        location: Array.from(locationOptions).map((location) => ({ value: location, label: location })),
        status: Array.from(statusOptions).map((status) => ({ value: status, label: status })),
        empreendimento: Array.from(empreendimentoOptions).map((empreendimento) => ({
          value: empreendimento,
          label: empreendimento,
        })),
        diferenciais: Array.from(diferenciaisOptions).map((diferencial) => ({ value: diferencial, label: diferencial })),
        rooms: [
          ...(isStudio ? [{ value: 'studio', label: 'Studio' }] : []),
          ...Array.from(roomsOptions)
            .sort()
            .map((room) => ({
              value: room,
              label: `${room} ${room === 1 ? 'quarto' : 'quartos'}`,
            })),
        ],
      };

      return options;
    }

    const filters = {
      location: $('#tipologia-filter-location, #mobile-tipologia-filter-location'),
      status: $('#tipologia-filter-status, #mobile-tipologia-filter-status'),
      empreendimento: $('#tipologia-filter-empreendimento, #mobile-tipologia-filter-empreendimento'),
      diferenciais: $('#tipologia-filter-diferenciais, #mobile-tipologia-filter-diferenciais'),
      rooms: $('#tipologia-filter-rooms, #mobile-tipologia-filter-rooms'),
    };
    const options = populateFilterOptions();
    renderFilters(filters, options);

    function getFilterValue(filterType) {
      const selector = filters[filterType];
      const value = selector
        .find('input:checked')
        .map(function () {
          return this.value;
        })
        .get();

      return value.length > 0 ? value : null;
    }

    function getFilterLabel(filterType) {
      const selector = filters[filterType];
      const value = selector
        .find('input:checked')
        .map(function () {
          return this.value;
        })
        .get();

      return value.length > 0 ? value : null;
    }

    function filterTipologias(tipologias) {
      const locationFilter = getFilterValue('location');
      const statusFilter = getFilterValue('status');
      const empreendimentoFilter = getFilterValue('empreendimento');
      const diferenciaisFilter = getFilterValue('diferenciais');
      const roomsFilter = getFilterValue('rooms');

      if (!locationFilter && !statusFilter && !empreendimentoFilter && !diferenciaisFilter && !roomsFilter) {
        return tipologias;
      }

      return tipologias.filter((tipologia) => {
        const matchLocation = !locationFilter || locationFilter.includes(tipologia.location);
        const matchStatus = !statusFilter || statusFilter.includes(tipologia.status);
        const matchEmpreendimento = !empreendimentoFilter || empreendimentoFilter.includes(tipologia.project);

        const matchRooms =
          !roomsFilter ||
          (roomsFilter.includes('studio')
            && tipologia.isStudio
            || tipologia.rooms.some((room) => {
              const minQuartos = parseInt(room.minimo_de_quartos_tipologia, 10);
              let maxQuartos = parseInt(room.maximo_de_quartos, 10);

              if (isNaN(maxQuartos) || maxQuartos === 0 || maxQuartos === 1) {
                maxQuartos = minQuartos;
              }

              return roomsFilter.some((selectedRoom) => selectedRoom >= minQuartos && selectedRoom <= maxQuartos);
            }));

        const matchDiferenciais =
          !diferenciaisFilter || diferenciaisFilter.every((diff) => tipologia.diffs.includes(diff));

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
          <button type="button" class="tipologia-remove-badge" data-filter="${filterType}" data-value="${filterValue}"><svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
  <path d="M1 8L8 1M1 1L8 8" stroke="#51848C" stroke-width="0.583333" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button>
        </span>
      `;

      $('.tipologia-filters-applied').append(badgeTemplate);
    }

    function updateBadges() {
      $('.tipologia-filters-applied').html('');

      const locationFilter = getFilterLabel('location');
      const statusFilter = getFilterLabel('status');
      const empreendimentoFilter = getFilterLabel('empreendimento');
      const diferenciaisFilter = getFilterLabel('diferenciais');
      const roomsFilter = getFilterLabel('rooms');

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

        $(
          `#tipologia-filter-${filterType} input[value="${filterValue}"]:checked, #mobile-tipologia-filter-${filterType} input[value="${filterValue}"]:checked`
        ).click();

        updateBadges();
        buildFilterUrl();
        updateFilterNumberIndicador();
        filterAndRender();
      });
    }

    function removeAccents(str) {
      return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    }

    function buildFilterUrl() {
      const locationFilter = getFilterLabel('location');
      const statusFilter = getFilterLabel('status');
      const empreendimentoFilter = getFilterLabel('empreendimento');
      const diferenciaisFilter = getFilterLabel('diferenciais');
      const roomsFilter = getFilterLabel('rooms');

      const params = new URLSearchParams();
      let hasFilters = false;

      if (locationFilter) {
        const formattedLocation = locationFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
          .join(',');
        params.set('tipo-localizacao', formattedLocation);
        hasFilters = true;
      }

      if (statusFilter) {
        const formattedStatus = statusFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
          .join(',');
        params.set('tipo-estagio', formattedStatus);
        hasFilters = true;
      }

      if (empreendimentoFilter) {
        const formattedEmpreendimento = empreendimentoFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
          .join(',');
        params.set('tipo-empreendimento', formattedEmpreendimento);
        hasFilters = true;
      }

      if (diferenciaisFilter) {
        const formattedDiferenciais = diferenciaisFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
          .join(',');
        params.set('tipo-diferenciais', formattedDiferenciais);
        hasFilters = true;
      }

      if (roomsFilter) {
        const formattedRooms = roomsFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
          .join(',');
        params.set('tipo-qtos', formattedRooms);
        hasFilters = true;
      }

      if (hasFilters) {
        params.set('tipologia', 'true');
      }

      const newUrl = `${window.location.pathname}${window.location.hash}${params.toString().length ? '?' : ''
        }${params.toString()}`;
      window.history.pushState({}, '', newUrl);
    }

    function updateFilterNumberIndicador() {
      $('.filter-desktop .filter-wrapper, .tipologia-drawer-content .tipologia-filter-category').each(function () {
        const current_filter = $(this);
        const checked_count = $(current_filter).find('.checkboxes input:checked, .tipologia-category-content input:checked').length;
        const filter_count_el = $(current_filter).find('.filter_count');

        if (checked_count > 0) {
          $(filter_count_el).html(`(${checked_count})`)
        } else {
          $(filter_count_el).html('')
        }

      })
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
          const formattedValue = decodeURIComponent(value).replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-location input[value="${formattedValue}"]`).click();
        });
      }

      if (statusFilter) {
        statusFilter.split(',').forEach((value) => {
          let formattedValue = decodeURIComponent(value).replace(/_/g, ' ').replace(/%/g, '');

          // Condição para transformar 'ultimas_unidades' em 'Últimas unidades'
          formattedValue = formattedValue === 'Ultimas unidades' ? 'Últimas unidades' : formattedValue;
          formattedValue = formattedValue === '100 vendido' ? '100% vendido' : formattedValue;
          formattedValue = formattedValue === 'Lancamento' ? 'Lançamento' : formattedValue;

          $(`#tipologia-filter-status input[value="${formattedValue}"]`).click();
        });
      }

      if (empreendimentoFilter) {
        empreendimentoFilter.split(',').forEach((value) => {
          const formattedValue = decodeURIComponent(value).replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-empreendimento input[value="${formattedValue}"]`).click();
        });
      }

      if (diferenciaisFilter) {
        diferenciaisFilter.split(',').forEach((value) => {
          const formattedValue = decodeURIComponent(value).replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-diferenciais input[value="${formattedValue}"]`).click();
        });
      }

      if (roomsFilter) {
        roomsFilter.split(',').forEach((value) => {
          const formattedValue = decodeURIComponent(value).replace(/_/g, ' ').replace(/%/g, '');
          $(`#tipologia-filter-rooms input[value="${formattedValue}"]`).click();
        });
      }

      filterAndRender();
    }

    let filteredTipologias = [];

    function filterAndRender() {
      filteredTipologias = filterTipologias(tipologiasData);
      renderTipologias(filteredTipologias);
      updateBadges();
    }

    renderTipologias(tipologiasData);

    function hideOptions(changedFilter) {
      const isOptionVisible = (value, key) => {
        return filteredTipologias.some((tipologia) => {
          if (key === 'location') return tipologia.location === value;
          if (key === 'status') return tipologia.status === value;
          if (key === 'rooms') {
            const minimo = parseInt(tipologia.rooms[0].minimo_de_quartos_tipologia);
            const maximo = parseInt(tipologia.rooms[0].maximo_de_quartos_tipologia);
            return (tipologia.isStudio && value === 'studio') || (value >= minimo && value <= maximo);
          }
          if (key === 'empreendimento') return tipologia.project === value;
          if (key === 'diferenciais') return tipologia.diffs.includes(value);
          return false;
        });
      };

      const getAppliedFilterCategories = () => {
        return Object.keys(filters).filter((key) => {
          return filters[key].find('input.ckkBox:checked').length > 0;
        });
      };

      const appliedFilterCategories = getAppliedFilterCategories();

      if (appliedFilterCategories.length === 0) {
        Object.keys(filters).forEach((key) => {
          filters[key].find('input.ckkBox').each(function () {
            $(this).closest('label').show();
          });
        });
        return;
      }

      if (appliedFilterCategories.length === 1) {
        const lastFilterCategory = appliedFilterCategories[0];
        filters[lastFilterCategory].find('input.ckkBox').each(function () {
          $(this).closest('label').show();
        });
      }

      Object.keys(filters).forEach((key) => {
        if (key !== changedFilter) {
          const $filter = filters[key];
          if (!(appliedFilterCategories.length === 1 && key === appliedFilterCategories[0])) {
            $filter.find('input.ckkBox').each(function () {
              const $checkbox = $(this);
              const value = $checkbox.val();

              if (isOptionVisible(value, key) || $checkbox.is(':checked')) {
                $checkbox.closest('label').show();
              } else {
                $checkbox.closest('label').hide();
              }
            });
          }
        }
      });
    }

    // Event listeners for filter changes
    filters['location'].find('input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      hideOptions('location');
      const selectedLocations = filters['location']
        .find('input.ckkBox:checked')
        .map(function () {
          return $(this).val();
        })
        .get();
      initBanner({ location: selectedLocations });
    });

    filters['status'].find('input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      hideOptions('status');
    });

    filters['empreendimento'].find('input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      hideOptions('empreendimento');
    });

    filters['diferenciais'].find('input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      hideOptions('diferenciais');
    });

    filters['rooms'].find('input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      hideOptions('rooms');
    });

    applyFiltersFromUrl();

    $('.tipologia-filter-button').click(function () {
      $('.tipologia-filter-drawer').addClass('tipologia-open');
      $('body').addClass('tipologia-drawer-open');
    });

    // Toggle filter categories
    $('.tipologia-drawer-content').on('click', '.tipologia-category-toggle', function () {
      $(this).next('.tipologia-category-content').toggleClass('tipologia-open');
    });

    $('.tipologia-apply-filters').click(function () {
      // Collect selected filters
      const selectedFilters = {};
      $('.tipologia-filter-category').each(function () {
        const categoryId = $(this).find('.tipologia-category-content').attr('id');
        const selectedOptions = [];
        $(this)
          .find('.ckkBox:checked')
          .each(function () {
            selectedOptions.push($(this).val());
          });
        selectedFilters[categoryId] = selectedOptions;
      });

      // Close the drawer
      $('.tipologia-filter-drawer').removeClass('tipologia-open');
      $('body').removeClass('tipologia-drawer-open');
    });
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
  cardHover();
}

export { initTipologia };
