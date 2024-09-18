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
      const locationFilter = getFilterValue('#filter-location');
      const statusFilter = getFilterValue('#filter-status');
      const roomsFilter = getFilterValue('#filter-rooms');

      if (!locationFilter && !statusFilter && !roomsFilter) {
        return empreendimentos;
      }

      return empreendimentos.filter((empreendimento) => {
        const matchLocation = !locationFilter || locationFilter.includes(empreendimento.location.toLowerCase());
        const matchStatus = !statusFilter || statusFilter.includes(empreendimento.status.toLowerCase());

        const matchRooms = !roomsFilter ||
          (roomsFilter.includes('studio') ? empreendimento.isStudio :
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

      const locationFilter = getFilterLabel('#filter-location');
      const statusFilter = getFilterLabel('#filter-status');
      const roomsFilter = getFilterLabel('#filter-rooms');

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

        $(`#filter-${filterType} input[value="${filterValue}"]`).click();

        updateBadges();
        buildFilterUrl();
        filterAndRender();
      });
    }

    function buildFilterUrl() {
      const locationFilter = getFilterLabel('#filter-location');
      const statusFilter = getFilterLabel('#filter-status');
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
      const roomsFilter = params.get('qtos');

      if (locationFilter) {
        locationFilter.split(',').forEach((value) => {
          const formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');
          $(`#filter-location input[value="${formattedValue}"]`).click();
        });
      }

      if (statusFilter) {
        statusFilter.split(',').forEach((value) => {

          let formattedValue = value.replace(/_/g, ' ').replace(/%/g, '');

          formattedValue = formattedValue === '100 vendido' ? '100% vendido' : formattedValue;

          $(`#filter-status input[value="${formattedValue}"]`).click();
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
      'filter-location': $('#filter-location'),
      'filter-status': $('#filter-status'),
      'filter-rooms': $('#filter-rooms'),
    };

    const options = populateFilterOptions();
    renderFilters(filters, options);

    function filterAndRender() {
      filteredEmpreendimentos = filterEmpreendimentos(empreendimentosData);
      renderEmpreendimentos(filteredEmpreendimentos);
      updateBadges();
    }

    renderEmpreendimentos(empreendimentosData);

    $('#filter-location input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();

      const selectedLocations = $('#filter-location input.ckkBox:checked').map(function () {
        return $(this).val();
      }).get();

      initBanner({ location: selectedLocations });
    });

    initBanner({ location: 'Rota DUE' })

    $('#filter-status input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    $('#filter-rooms input.ckkBox').on('change', function () {
      filterAndRender();
      buildFilterUrl();
    });

    applyFiltersFromUrl();
  } catch (error) {
    console.error('Erro ao carregar os empreendimentos:', error);
  }
}

async function initEmpreendimento() {
  await empreendimentoPage();
  cardHover();
}

export { initEmpreendimento };
