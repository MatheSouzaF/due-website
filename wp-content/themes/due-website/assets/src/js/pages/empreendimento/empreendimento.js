import { renderFilters } from '../../components/filter';
import { initBanner } from '../../components/banner'
import { clearContainer, createEmpreendimentoCard, updateResultsText } from '../../components/empreendimento-card';
import { generateBadge } from '../../components/badge';
import { getFilterValue } from '../../utils/get-filter-value';
import { getFilterLabel } from '../../utils/get-filter-label';
import { cardHover } from '../../components/card-hover'

async function empreendimentoPage() {
  console.warn('Módulo Empreendimento Iniciado!');

  try {
    const empreendimentosData = EmpreendimentosData.empreendimentos;

    function renderEmpreendimentos(empreendimentos) {
      const $container = $('.empreendimentos.cards');
      const $resultsText = $('.results-text');

      updateResultsText($resultsText, empreendimentos.length);
      clearContainer($container);

      if (empreendimentos.length === 0) {
        console.log('Nenhum empreendimento para exibir.');
        return;
      }

      empreendimentos.forEach(empreendimento => {
        const cardTemplate = createEmpreendimentoCard(empreendimento);
        $container.append(cardTemplate);
      });
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

        const matchRooms = !roomsFilter || (
          (roomsFilter.includes('studio') && empreendimento.isStudio) ||
          empreendimento.rooms.some((room) => {
            const minQuartos = parseInt(room.minimo_de_quartos, 10);
            const maxQuartos = parseInt(room.maximo_de_quartos, 10);
            return roomsFilter.some(
              (selectedRoom) => selectedRoom >= minQuartos && selectedRoom <= maxQuartos
            );
          })
        );

        return matchLocation && matchStatus && matchRooms;
      });
    }

    function updateBadges() {
      $('.filters-applied').html('');

      const locationFilter = getFilterLabel('#filter-location, #mobile-filter-location');
      const statusFilter = getFilterLabel('#filter-status, #mobile-filter-status');
      const roomsFilter = getFilterLabel('#filter-rooms, #mobile-filter-rooms');

      if (locationFilter) {
        locationFilter.forEach((value) => generateBadge(value, 'location'));
      }

      if (statusFilter) {
        statusFilter.forEach((value) => generateBadge(value, 'status'));
      }

      if (roomsFilter) {
        roomsFilter.forEach((value) => generateBadge(value, 'rooms'));
      }

      $('.remove-badge').on('click', function () {
        const filterType = $(this).data('filter');
        const filterValue = $(this).data('value');

        $(`#filter-${filterType} input[value="${filterValue}"]:checked, #mobile-filter-${filterType} input[value="${filterValue}"]:checked`).click();

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

      const params = new URLSearchParams();

      if (locationFilter) {
        const formattedLocation = locationFilter.map((value) =>
          encodeURIComponent(
            removeAccents(value).replace(/ /g, '_').replace(/%/g, '')
          )
        ).join(',');
        params.set('localizacao', formattedLocation);
      }

      if (statusFilter) {
        const formattedStatus = statusFilter.map((value) =>
          encodeURIComponent(
            removeAccents(value).replace(/ /g, '_').replace(/%/g, '')
          )
        ).join(',');
        params.set('estagio', formattedStatus);
      }

      if (roomsFilter) {
        const formattedRooms = roomsFilter.map((value) =>
          encodeURIComponent(
            removeAccents(value).replace(/ /g, '_').replace(/%/g, '')
          )
        ).join(',');
        params.set('qtos', formattedRooms);
      }

      const newUrl = `${window.location.pathname}${params.toString().length ? '?' : ''}${params.toString()}`;
      window.history.pushState({}, '', newUrl);
    }

    function updateFilterNumberIndicador() {
      $('.filter-desktop .filter-wrapper, .filter-drawer .filter-category').each(function () {
        const current_filter = $(this);
        const checked_count = $(current_filter).find('.checkboxes input:checked, .category-content input:checked').length;
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

      const locationFilter = params.get('localizacao');
      const statusFilter = params.get('estagio');
      const roomsFilter = params.get('qtos');

      if (locationFilter) {
        locationFilter.split(',').forEach((value) => {
          const formattedValue = decodeURIComponent(value)
            .replace(/_/g, ' ')
            .replace(/%/g, '');
          $(`#filter-location input[value="${formattedValue}"]`).prop('checked', true);
        });
      }

      if (statusFilter) {
        statusFilter.split(',').forEach((value) => {
          let formattedValue = decodeURIComponent(value)
            .replace(/_/g, ' ')
            .replace(/%/g, '');
          formattedValue = formattedValue === 'Ultimas unidades' ? 'Últimas unidades' : formattedValue;
          formattedValue = formattedValue === '100 vendido' ? '100% vendido' : formattedValue;
          formattedValue = formattedValue === 'Lancamento' ? 'Lançamento' : formattedValue;
          $(`#filter-status input[value="${formattedValue}"]`).prop('checked', true);
        });
      }

      if (roomsFilter) {
        roomsFilter.split(',').forEach((value) => {
          const formattedValue = decodeURIComponent(value)
            .replace(/_/g, ' ')
            .replace(/%/g, '');
          $(`#filter-rooms input[value="${formattedValue}"]`).prop('checked', true);
        });
      }

      filterAndRender();
    }

    let filteredEmpreendimentos = []

    function populateFilterOptions() {
      const empreendimentos = filteredEmpreendimentos.length ? filteredEmpreendimentos : empreendimentosData

      const locationOptions = [...new Set(empreendimentos.map((e) => e.location))];
      const statusOptions = [...new Set(empreendimentos.map((e) => e.status))];

      const roomsOptions = new Set();
      empreendimentos.forEach((e) => {
        const minimo = parseInt(e.rooms[0].minimo_de_quartos);
        const maximo = parseInt(e.rooms[0].maximo_de_quartos);

        for (let i = minimo; i <= maximo; i++) {
          roomsOptions.add(i);
        }
      });

      const isStudio = empreendimentos.map(e => e.isStudio)

      const options = {
        'filter-location': Array.from(locationOptions).map((location) => ({ value: location, label: location })),
        'filter-status': Array.from(statusOptions).map((status) => ({ value: status, label: status })),
        'filter-rooms': [
          ...(isStudio ? [{ value: 'studio', label: 'Studio' }] : []),
          ...Array.from(roomsOptions)
            .sort()
            .map((room) => ({
              value: room,
              label: `${room} ${room === 1 ? 'quarto' : 'quartos'}`
            }))
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
      renderEmpreendimentos(filteredEmpreendimentos);
      updateBadges();
    }

    function hideOptions(changedFilter) {
      const isOptionVisible = (value, key) => {
        return filteredEmpreendimentos.some((empreendimento) => {
          if (key === 'filter-location') return empreendimento.location === value;
          if (key === 'filter-status') return empreendimento.status === value;
          if (key === 'filter-rooms') {
            const minimo = parseInt(empreendimento.rooms[0].minimo_de_quartos);
            const maximo = parseInt(empreendimento.rooms[0].maximo_de_quartos);
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

              if (isOptionVisible(value, key)) {
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

      const selectedLocations = $('#filter-location input.ckkBox:checked, #mobile-filter-location input.ckkBox:checked').map(function () {
        return $(this).val();
      }).get();

      initBanner({ location: selectedLocations });
      hideOptions('filter-location');
    });

    initBanner({ location: 'Rota DUE' })

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

    $('.close-drawer').click(function () {
      $('.filter-drawer').removeClass('open');
      $('body').removeClass('drawer-open');
    });

    // Toggle das categorias no filtro mobile
    $('.drawer-content').on('click', '.category-toggle', function () {
      $(this).next('.category-content').toggleClass('open');
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
