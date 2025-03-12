import { renderFilters } from '../../components/filter';
import { initBanner } from '../../components/banner';
import { createTipologiaCard } from '../../components/cards/tipologia-card'

function tipologiaPage() {
  console.warn('Módulo Tipologia Iniciado!');

  try {
    // Tipologias passadas via wp_localize
    const tipologiasData = TipologiasData.tipologias;

    const isMobile = isMobileDevice();
    const itemsPerLoad = isMobile ? 5 : 16;
    let currentItemsShown = itemsPerLoad;

    function renderTipologias(tipologias) {
      const $container = $('.cards-tipologia.cards');
      const $resultsText = $('.tipologia-results-text');

      updateResultsText($resultsText, tipologias.length);
      clearContainer($container);

      const itemsToRender = tipologias.slice(0, currentItemsShown);

      itemsToRender.forEach((tipologia) => {
        const cardTemplate = createTipologiaCard(tipologia);
        $container.append(cardTemplate);
      });

      $('.see-more-tipo-button').remove();

      if (currentItemsShown < tipologias.length) {
        const $seemoreContainer = $('.see-more-tipo-container-button');

        const $seeMoreButton = $('<button>', {
          html: wp_translations.load_more_button,
          class: 'see-more-tipo-button button',
        });
        $seemoreContainer.append($seeMoreButton);

        $seeMoreButton.on('click', function () {
          currentItemsShown += itemsPerLoad;

          if (currentItemsShown > tipologias.length) {
            currentItemsShown = tipologias.length;
          }

          renderTipologias(tipologias);
        });
      }

      if (tipologias.length === 0) {
        $('#no-tipologias-message').show();
        $('.see-more-tipo-button').remove();
        return;
      } else {
        $('#no-tipologias-message').hide();
      }
    }

    function updateResultsText($element, empreendimentoCount) {
      const template =
        empreendimentoCount === 1
          ? wp_translations.single_selection_tipo
          : wp_translations.multiple_selection_tipo;
    
      const text = template.replace("{count}", empreendimentoCount);
      $element.html(text);
    }

    function clearContainer($container) {
      $container.html('');
    }

    function populateFilterOptions() {
      const locationOptions = [...new Set(tipologiasData.map((e) => e.location))];
      const statusOptions = [...new Set(tipologiasData.map((e) => e.status).filter((status) => status !== ''))];
      const empreendimentoOptions = [...new Set(tipologiasData.map((e) => e.project))];

      const diferenciaisOptions = [...new Set(tipologiasData.flatMap((e) => e.diffs))];

      const roomsOptions = new Set();
      tipologiasData.forEach((e) => {
        e.rooms.forEach((room) => {
          const roomNumber = parseInt(room, 10);
          if (!isNaN(roomNumber)) {
            roomsOptions.add(roomNumber);
          }
        });
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
          (roomsFilter.includes('studio') && tipologia.isStudio) ||
          roomsFilter.some((selectedRoom) => tipologia.rooms.includes(selectedRoom));


        const matchDiferenciais =
          !diferenciaisFilter || diferenciaisFilter.every((diff) => tipologia.diffs.includes(diff));

        return matchLocation && matchStatus && matchEmpreendimento && matchDiferenciais && matchRooms;
      });
    }

    function generateBadge(filterValue, filterType) {
      let badgeLabel = filterValue;

      if (filterType === 'rooms' && filterValue !== 'studio') {
        badgeLabel += Number(filterValue) === 1 ? ' quarto' : ' quartos';
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

    function getUniqueValues(array) {
      return [...new Set(array)];
    }

    function updateBadges() {
      $('.tipologia-filters-applied').html('');

      const locationFilter = getFilterLabel('location');
      const statusFilter = getFilterLabel('status');
      const empreendimentoFilter = getFilterLabel('empreendimento');
      const diferenciaisFilter = getFilterLabel('diferenciais');
      const roomsFilter = getFilterLabel('rooms');

      if (locationFilter || statusFilter || empreendimentoFilter || diferenciaisFilter || roomsFilter) {
        $('.clean-filters-tipologia').show();
      } else {
        $('.clean-filters-tipologia').hide();
      }

      if (locationFilter) {
        getUniqueValues(locationFilter).forEach((value) => generateBadge(value, 'location'));
      }

      if (statusFilter) {
        getUniqueValues(statusFilter).forEach((value) => generateBadge(value, 'status'));
      }

      if (empreendimentoFilter) {
        getUniqueValues(empreendimentoFilter).forEach((value) => generateBadge(value, 'empreendimento'));
      }

      if (diferenciaisFilter) {
        getUniqueValues(diferenciaisFilter).forEach((value) => generateBadge(value, 'diferenciais'));
      }

      if (roomsFilter) {
        getUniqueValues(roomsFilter).forEach((value) => generateBadge(value, 'rooms'));
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
        params.set('tipo-localizacao', getUniqueValues(formattedLocation).join(','));
        hasFilters = true;
      }

      if (statusFilter) {
        const formattedStatus = statusFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
        params.set('tipo-estagio', getUniqueValues(formattedStatus).join(','));
        hasFilters = true;
      }

      if (empreendimentoFilter) {
        const formattedEmpreendimento = empreendimentoFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
        params.set('tipo-empreendimento', getUniqueValues(formattedEmpreendimento).join(','));
        hasFilters = true;
      }

      if (diferenciaisFilter) {
        const formattedDiferenciais = diferenciaisFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
        params.set('tipo-diferenciais', getUniqueValues(formattedDiferenciais).join(','));
        hasFilters = true;
      }

      if (roomsFilter) {
        const formattedRooms = roomsFilter
          .map((value) => encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, '')))
        params.set('tipo-qtos', getUniqueValues(formattedRooms).join(','));
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
        const checked_count = $(current_filter).find(
          '.checkboxes input:checked, .tipologia-category-content input:checked'
        ).length;
        const filter_count_el = $(current_filter).find('.filter_count');

        if (checked_count > 0) {
          $(filter_count_el).html(`(${checked_count})`);
        } else {
          $(filter_count_el).html('');
        }
      });
    }

    function applyFilter(paramValue, filterSelector, isStatus = false) {
      if (paramValue) {
        paramValue.split(',').forEach((value) => {
          let formattedValue = removeAccents(decodeURIComponent(value).replace(/_/g, ' ').replace(/%/g, ''));

          if (isStatus) {
            if (formattedValue === 'Ultimas unidades') formattedValue = 'Últimas unidades';
            if (formattedValue === '100 vendido') formattedValue = '100% vendido';
            if (formattedValue === 'Lancamento') formattedValue = 'Lançamento';
          }

          $(`${filterSelector} input`).each(function () {
            const inputValue = removeAccents($(this).val());
            if (inputValue === formattedValue) {
              $(this).click();
            }
          });
        });
      }
    }

    function isMobileDevice() {
      return window.innerWidth <= 768;
    }

    function applyFiltersFromUrl() {
      const params = new URLSearchParams(window.location.search);

      const locationFilter = params.get('tipo-localizacao');
      const statusFilter = params.get('tipo-estagio');
      const empreendimentoFilter = params.get('tipo-empreendimento');
      const diferenciaisFilter = params.get('tipo-diferenciais');
      const roomsFilter = params.get('tipo-qtos');

      const filtersList = [
        {
          filterName: locationFilter,
          selector: '#tipologia-filter-location',
          selectorMobile: '#mobile-tipologia-filter-location',
        },
        {
          filterName: statusFilter,
          selector: '#tipologia-filter-status',
          selectorMobile: '#mobile-tipologia-filter-status'
        },
        {
          filterName: empreendimentoFilter,
          selector: '#tipologia-filter-empreendimento',
          selectorMobile: '#mobile-tipologia-filter-empreendimento',
        },
        {
          filterName: diferenciaisFilter,
          selector: '#tipologia-filter-diferenciais',
          selectorMobile: '#mobile-tipologia-filter-diferenciais',
        },
        {
          filterName: roomsFilter,
          selector: '#tipologia-filter-rooms',
          selectorMobile: '#mobile-tipologia-filter-rooms'
        },
      ];

      if (isMobileDevice()) {
        filtersList.map((filter) => applyFilter(filter.filterName, filter.selectorMobile));
        filterAndRender();
        return;
      }

      filtersList.map((filter) => applyFilter(filter.filterName, filter.selector));
      filterAndRender();

      filterAndRender();
    }

    let filteredTipologias = [];

    function filterAndRender() {
      filteredTipologias = filterTipologias(tipologiasData);
      currentItemsShown = itemsPerLoad; // Reset the number of items shown
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
            const minimo = parseInt(tipologia.rooms[0], 10);
            let maximo = parseInt(tipologia.rooms[tipologia.rooms.length - 1], 10);


            if (maximo === 0) {
              maximo = minimo;
            }

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
    $('.tipologia-drawer-content').on('click', '.tipologia-category-toggle', function (e) {
      e.stopPropagation(); // Evita o fechamento quando clicar no próprio toggle

      // Fecha todos os elementos abertos com animação
      $('.tipologia-category-content.tipologia-open').not($(this).next()).slideUp(300).removeClass('tipologia-open');

      // Abre o elemento clicado com animação
      $(this).next('.tipologia-category-content').slideToggle(300).toggleClass('tipologia-open');
    });

    // Fecha todas as categorias abertas ao clicar fora de .tipologia-drawer-content
    $(document).on('click', function (e) {
      // Verifica se o clique NÃO foi dentro de .tipologia-drawer-content E NÃO foi no .filter-button
      if (
        !$(e.target).closest('.tipologia-drawer-content').length &&
        !$(e.target).closest('.tipologia-filter-button').length
      ) {
        $('.tipologia-filter-drawer').removeClass('tipologia-open');
        $('body').removeClass('tipologia-drawer-open');

        // Opcional: Fecha todas as categorias abertas com animação
        $('.tipologia-category-content.tipologia-open').slideUp(300).removeClass('tipologia-open');
      }
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

    $('.clean-filters-tipologia').click(function () {
      clearFiltersTipologia();
    });

    function clearFiltersTipologia() {
      $('.ckkBox').each(function () {
        const $checkbox = $(this);
        const isChecked = $checkbox.prop('checked');

        if (
          $checkbox.closest('#tipologia-filter-location, #mobile-tipologia-filter-location').length ||
          $checkbox.closest('#tipologia-filter-status, #mobile-tipologia-filter-status').length ||
          $checkbox.closest('#tipologia-filter-empreendimento, #mobile-tipologia-filter-empreendimento').length ||
          $checkbox.closest('#tipologia-filter-diferenciais, #mobile-tipologia-filter-diferenciais').length ||
          $checkbox.closest('#tipologia-filter-rooms, #mobile-tipologia-filter-rooms').length
        ) {
          if (isChecked) {
            $checkbox.click();
          }
        }
      });
    }
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
