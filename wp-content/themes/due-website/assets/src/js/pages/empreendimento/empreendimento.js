import { renderFilters } from '../../components/filter';
import { initBanner } from '../../components/banner';
import { clearContainer, createEmpreendimentoCard, updateResultsText } from '../../components/cards/empreendimento-card';
import { generateBadge } from '../../components/badge';
import { getFilterValue } from '../../utils/get-filter-value';
import { getFilterLabel } from '../../utils/get-filter-label';

async function empreendimentoPage() {
  console.warn('Módulo Empreendimento Iniciado!');

  try {
    const empreendimentosData = EmpreendimentosData.empreendimentos;

    const isMobile = isMobileDevice();
    const itemsPerLoad = isMobile ? 4 : 12;
    let currentItemsShown = itemsPerLoad;

    function renderEmpreendimentos(empreendimentos) {
      const $container = $('.empreendimentos.cards');
      const $resultsText = $('.results-text');

      updateResultsText($resultsText, empreendimentos.length);
      clearContainer($container);

      // Limit the number of empreendimentos to show
      const itemsToRender = empreendimentos.slice(0, currentItemsShown);

      itemsToRender.forEach((empreendimento) => {
        const cardTemplate = createEmpreendimentoCard(empreendimento);
        $container.append(cardTemplate);
      });

      // Remove any existing "Ver mais" button
      $('.see-more-button').remove();

      // If there are more items to show, add a "Ver mais" button
      if (currentItemsShown < empreendimentos.length) {
        const $seemoreContainer = $('.see-more-container-button');

        const $seeMoreButton = $('<button>', {
          html: 'CARREGAR MAIS',
          class: 'see-more-button button',
        });
        $seemoreContainer.append($seeMoreButton);

        $seeMoreButton.on('click', function () {
          // Increase the number of items shown
          currentItemsShown += itemsPerLoad;

          // Ensure we don't exceed the total number of items
          if (currentItemsShown > empreendimentos.length) {
            currentItemsShown = empreendimentos.length;
          }

          // Re-render the empreendimentos
          renderEmpreendimentos(empreendimentos);
        });
      }

      if (empreendimentos.length === 0) {
        $('#no-empreendimentos-message').show();
        $('.see-more-button').remove();
        return;
      } else {
        $('#no-empreendimentos-message').hide();
      }
    }

    function filterEmpreendimentos(empreendimentos) {
      const locationFilter = getFilterValue('#filter-location, #mobile-filter-location');
      const statusFilter = getFilterValue('#filter-status, #mobile-filter-status');
      const roomsFilter = getFilterValue('#filter-rooms, #mobile-filter-rooms');

      if (!locationFilter && !statusFilter && !roomsFilter) {
        return empreendimentos;
      }

      return empreendimentos.filter((empreendimento) => {
        const matchLocation = !locationFilter || locationFilter.includes(empreendimento.location.toLowerCase());
        const matchStatus = !statusFilter || statusFilter.includes(empreendimento.status.toLowerCase());

        const matchRooms =
          !roomsFilter ||
          (roomsFilter.includes('studio') && empreendimento.isStudio) ||
          roomsFilter.some((selectedRoom) => empreendimento.rooms.includes(selectedRoom));

        return matchLocation && matchStatus && matchRooms;
      });
    }

    function getUniqueValues(array) {
      return [...new Set(array)];
    }

    function updateBadges() {
      $('.filters-applied').html('');

      const locationFilter = getFilterLabel('#filter-location, #mobile-filter-location');
      const statusFilter = getFilterLabel('#filter-status, #mobile-filter-status');
      const roomsFilter = getFilterLabel('#filter-rooms, #mobile-filter-rooms');

      if (locationFilter || statusFilter || roomsFilter) {
        $('.clean-filters').show();
      } else {
        $('.clean-filters').hide();
      }

      if (locationFilter) {
        getUniqueValues(locationFilter).forEach((value) => generateBadge(value, 'location'));
      }

      if (statusFilter) {
        getUniqueValues(statusFilter).forEach((value) => generateBadge(value, 'status'));
      }

      if (roomsFilter) {
        getUniqueValues(roomsFilter).forEach((value) => generateBadge(value, 'rooms'));
      }

      $('.remove-badge').on('click', function () {
        const filterType = $(this).data('filter');
        const filterValue = $(this).data('value');

        $(
          `#filter-${filterType} input[value="${filterValue}"]:checked, #mobile-filter-${filterType} input[value="${filterValue}"]:checked`
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
      const locationFilter = getFilterLabel('#filter-location, #mobile-filter-location');
      const statusFilter = getFilterLabel('#filter-status, #mobile-filter-status');
      const roomsFilter = getFilterLabel('#filter-rooms, #mobile-filter-rooms');

      // Parse the current URL
      const url = new URL(window.location.href);

      // Get the current search parameters
      const params = url.searchParams;

      // Remove existing filter parameters to prevent duplicates
      params.delete('localizacao');
      params.delete('estagio');
      params.delete('qtos');

      if (locationFilter && locationFilter.length > 0) {
        const formattedLocation = locationFilter.map((value) =>
          encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, ''))
        );
        params.set('localizacao', getUniqueValues(formattedLocation).join(','));
      }

      if (statusFilter && statusFilter.length > 0) {
        const formattedStatus = statusFilter.map((value) =>
          encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, ''))
        );
        params.set('estagio', getUniqueValues(formattedStatus).join(','));
      }

      if (roomsFilter && roomsFilter.length > 0) {
        const formattedRooms = roomsFilter.map((value) =>
          encodeURIComponent(removeAccents(value).replace(/ /g, '_').replace(/%/g, ''))
        );
        params.set('qtos', getUniqueValues(formattedRooms).join(','));
      }

      // Update the URL with the new search parameters
      url.search = params.toString();
      window.history.pushState({}, '', url);
    }

    function updateFilterNumberIndicador() {
      $('.filter-desktop .filter-wrapper, .filter-drawer .filter-category').each(function () {
        const current_filter = $(this);
        const checked_count = $(current_filter).find(
          '.checkboxes input:checked, .category-content input:checked'
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

      const locationFilter = params.get('localizacao');
      const statusFilter = params.get('estagio');
      const roomsFilter = params.get('qtos');

      const filtersList = [
        {
          filterName: locationFilter,
          selector: '#filter-location',
          selectorMobile: '#mobile-filter-location',
        },
        {
          filterName: statusFilter,
          selector: '#filter-status',
          selectorMobile: '#mobile-filter-status',
        },
        {
          filterName: roomsFilter,
          selector: '#filter-rooms',
          selectorMobile: '#mobile-filter-rooms',
        },
      ];

      if (isMobileDevice()) {
        filtersList.map((filter) => applyFilter(filter.filterName, filter.selectorMobile));
        filterAndRender();
        return;
      }

      filtersList.map((filter) => applyFilter(filter.filterName, filter.selector));
      filterAndRender();
    }

    let filteredEmpreendimentos = [];

    function populateFilterOptions() {
      const empreendimentos = filteredEmpreendimentos.length ? filteredEmpreendimentos : empreendimentosData;

      const locationOptions = [...new Set(empreendimentos.map((e) => e.location))];
      const statusOptions = [...new Set(empreendimentos.map((e) => e.status).filter((status) => status !== ''))];

      const roomsOptions = new Set();
      empreendimentos.forEach((e) => {
        e.rooms.forEach((room) => {
          const roomNumber = parseInt(room, 10);
          if (!isNaN(roomNumber)) {
            roomsOptions.add(roomNumber);
          }
        });
      });

      const isStudio = empreendimentos.map((e) => e.isStudio);

      const options = {
        'filter-location': Array.from(locationOptions).map((location) => ({ value: location, label: location })),
        'filter-status': Array.from(statusOptions).map((status) => ({ value: status, label: status })),
        'filter-rooms': [
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
      'filter-location': $('#filter-location, #mobile-filter-location'),
      'filter-status': $('#filter-status, #mobile-filter-status'),
      'filter-rooms': $('#filter-rooms, #mobile-filter-rooms'),
    };

    const options = populateFilterOptions();
    renderFilters(filters, options);

    function filterAndRender() {
      filteredEmpreendimentos = filterEmpreendimentos(empreendimentosData);
      currentItemsShown = itemsPerLoad; // Reset the number of items shown
      renderEmpreendimentos(filteredEmpreendimentos);
      updateBadges();
    }

    function hideOptions(changedFilter) {
      const isOptionVisible = (value, key) => {
        return filteredEmpreendimentos.some((empreendimento) => {
          if (key === 'filter-location') return empreendimento.location === value;
          if (key === 'filter-status') return empreendimento.status === value;
          if (key === 'filter-rooms') {
            const minimo = parseInt(empreendimento.rooms[0].minimo_de_quartos, 10);
            let maximo = parseInt(empreendimento.rooms[0].maximo_de_quartos, 10);

            if (maximo === 0) {
              maximo = minimo;
            }

            return (empreendimento.isStudio && value === 'studio') || (value >= minimo && value <= maximo);
          }

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

    renderEmpreendimentos(empreendimentosData);

    // Atualiza os eventos para considerar os filtros móveis e desktop
    $('#filter-location input.ckkBox, #mobile-filter-location input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();

      const selectedLocations = $('#filter-location input.ckkBox:checked, #mobile-filter-location input.ckkBox:checked')
        .map(function () {
          return $(this).val();
        })
        .get();

      initBanner({ location: selectedLocations });
      hideOptions('filter-location');
    });

    initBanner({ location: 'Rota DUE' });

    $('#filter-status input.ckkBox, #mobile-filter-status input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      hideOptions('filter-status');
    });

    $('#filter-rooms input.ckkBox, #mobile-filter-rooms input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      hideOptions('filter-rooms');
    });

    applyFiltersFromUrl();

    // Eventos para o drawer do filtro mobile
    $('.filter-button').click(function () {
      $('.filter-drawer').addClass('open');
      $('body').addClass('drawer-open');
    });

    $('.drawer-content').on('click', '.category-toggle', function (e) {
      e.stopPropagation(); // Evita o fechamento quando clicar no próprio toggle

      // Fecha todos os elementos abertos com animação
      $('.category-content.open').not($(this).next()).slideUp(300).removeClass('open');

      // Abre o elemento clicado com animação
      $(this).next('.category-content').slideToggle(300).toggleClass('open');
    });

    // Fecha todas as categorias abertas ao clicar fora de .drawer-content
    $(document).on('click', function (e) {
      // Verifica se o clique NÃO foi dentro de .drawer-content E NÃO foi no .filter-button
      if (!$(e.target).closest('.drawer-content').length && !$(e.target).closest('.filter-button').length) {
        $('.filter-drawer').removeClass('open');
        $('body').removeClass('drawer-open');

        // Opcional: Fecha todas as categorias abertas com animação
        $('.category-content.open').slideUp(300).removeClass('open');
      }
    });

    $('.apply-filters').click(function () {
      // Fechar o drawer
      $('.filter-drawer').removeClass('open');
      $('body').removeClass('drawer-open');

      // Aplicar os filtros selecionados
      filterAndRender();
      buildFilterUrl();
      updateFilterNumberIndicador();
      updateBadges();
    });

    $('.clean-filters').click(function () {
      clearFiltersEmpreendimentos();
    });

    function clearFiltersEmpreendimentos() {
      $('.ckkBox').each(function () {
        const $checkbox = $(this);
        const isChecked = $checkbox.prop('checked');

        if ($checkbox.closest('#filter-location, #mobile-filter-location').length) {
          if (isChecked) {
            $checkbox.click();
          }
        }

        if ($checkbox.closest('#filter-status, #mobile-filter-status').length) {
          if (isChecked) {
            $checkbox.click();
          }
        }

        if ($checkbox.closest('#filter-rooms, #mobile-filter-rooms').length) {
          if (isChecked) {
            $checkbox.click();
          }
        }
      });
    }
  } catch (error) {
    console.error('Erro ao carregar os empreendimentos:', error);
  }
}

function encanteSe() {
  gsap.registerPlugin(ScrollTrigger);
  const encanteseZoom = document.querySelector('.encante-se');

  const btnAppears = document.querySelector('.box-conteudo-right');
  const showSvg = document.querySelector('.svg-caribe');

  function bgOpen() {
    if (btnAppears) {
      btnAppears.classList.add('clipPath'); // Adiciona a classe 'background-open'
    }
  }

  let TLFADE = gsap.timeline({
    duration: 1,
    scrollTrigger: {
      trigger: '.encante-se',
      start: 'top center',
      onEnter: bgOpen,
    },
  });

  TLFADE.from(
    showSvg,
    {
      autoAlpha: 0,
      duration: 0.6,
    },
    '-=.2'
  );

  function zommOpen() {
    if (encanteseZoom) {
      encanteseZoom.classList.add('zoom'); // Adiciona a classe 'background-open'
    }
  }
  function bgClose() {
    if (encanteseZoom) {
      encanteseZoom.classList.remove('zoom'); // Remove a classe 'background-open'
    }
  }
  gsap.from('.encante-se', {
    scrollTrigger: {
      trigger: '.encante-se',
      start: 'top-=500',
      end: 'bottom-=400 ',
      scrub: true,
      onEnter: zommOpen,
      onLeave: bgClose,
    },
  });
}


async function initEmpreendimento() {
  await empreendimentoPage();
  encanteSe();
}

export { initEmpreendimento };
