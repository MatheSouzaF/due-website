import { getEmpreendimentos } from "../../services/EmpreendimentoService";
import { renderFilters } from "../../components/filter";

async function empreendimentoPage() {
  console.warn('Módulo Empreendimento Iniciado!');

  try {

    // Empreendimentos passados via wp_localize
    const empreendimentosData = EmpreendimentosData.empreendimentos;

    function renderEmpreendimentos(empreendimentos) {
      const $container = $('.empreendimentos.cards');
      $container.html('');
      console.log("Container limpo.");

      if (empreendimentos.length === 0) {
        console.log("Nenhum empreendimento para exibir.");
        return;
      }

      empreendimentos.forEach(function (empreendimento) {
        const template = document.getElementById('empreendimento-template');
        const cardTemplate = template.content.cloneNode(true);

        $(cardTemplate).find('.nome-empreendimento').text(empreendimento.name || 'N/A');
        $(cardTemplate).find('.localizacao-empreendimento').text(empreendimento.location || 'N/A');
        $(cardTemplate).find('.label-informativo').text(empreendimento.status || 'N/A');

        const quartos = empreendimento.rooms && empreendimento.rooms[0];
        $(cardTemplate).find('.info-quartos').text(quartos ? `${quartos.minimo_de_quartos} a ${quartos.maximo_de_quartos} quartos` : 'N/A');

        const tamanho = empreendimento.size && empreendimento.size[0];
        $(cardTemplate).find('.info-tamanho').text(tamanho ? `${tamanho.metragem_minima} a ${tamanho.metragem_maxima}m²` : 'N/A');

        $(cardTemplate).find('.valor').text(empreendimento.offer || 'N/A');

        if (empreendimento.photo && empreendimento.photo.url) {
          $(cardTemplate).find('.imagem-empreendimento').attr('src', empreendimento.photo.url);
        } else {
          $(cardTemplate).find('.imagem-empreendimento').hide();
        }

        if (empreendimento.video) {
          $(cardTemplate).find('.video-empreendimento').attr('src', empreendimento.video);
        } else {
          $(cardTemplate).find('.video-empreendimento').hide();
        }

        $container.append(cardTemplate);
      });
    }

    function populateFilterOptions() {
      const locationOptions = [...new Set(empreendimentosData.map(e => e.location))];
      const statusOptions = [...new Set(empreendimentosData.map(e => e.status))];

      const roomsOptions = new Set();
      empreendimentosData.forEach(e => {
        const minimo = parseInt(e.rooms[0].minimo_de_quartos);
        const maximo = parseInt(e.rooms[0].maximo_de_quartos);

        for (let i = minimo; i <= maximo; i++) {
          roomsOptions.add(i);
        }
      });

      const options = {
        'filter-location': Array.from(locationOptions).map(location => ({ value: location, label: location })),
        'filter-status': Array.from(statusOptions).map(status => ({ value: status, label: status })),
        'filter-rooms': Array.from(roomsOptions).sort().map(room => ({ value: room, label: `${room} Quartos` }))
      };

      return options
    }

    populateFilterOptions()

    const filters = {
      'filter-location': $('#filter-location'),
      'filter-status': $('#filter-status'),
      'filter-rooms': $('#filter-rooms')
    };

    const options = populateFilterOptions()
    renderFilters(filters, options);

    function getFilterValue(selector) {
      const value = $(selector).find('input:checked').map(function () {
        return this.value.toLowerCase();
      }).get();

      return value.length > 0 ? value : null;
    }

    function getFilterLabel(selector) {
      const value = $(selector).find('input:checked').map(function () {
        return this.value;
      }).get();

      return value.length > 0 ? value : null;
    }

    function filterEmpreendimentos(empreendimentos) {
      const locationFilter = getFilterValue('#filter-location');
      const statusFilter = getFilterValue('#filter-status');
      const roomsFilter = getFilterValue('#filter-rooms');

      if (!locationFilter && !statusFilter && !roomsFilter) {
        return empreendimentos;
      }

      return empreendimentos.filter(empreendimento => {
        const matchLocation = !locationFilter || locationFilter.includes(empreendimento.location.toLowerCase());
        const matchStatus = !statusFilter || statusFilter.includes(empreendimento.status.toLowerCase());
        const matchRooms = !roomsFilter ||
          empreendimento.rooms.some(room =>
            roomsFilter.includes(room.minimo_de_quartos.toString()) ||
            roomsFilter.includes(room.maximo_de_quartos.toString())
          );

        return matchLocation && matchStatus && matchRooms;
      });
    }

    function generateBadge(filterValue, filterType) {
      const badgeTemplate = `
        <span class="badge ${filterType}">
          ${filterValue} ${filterType === 'rooms' ? " qto" : ""}
          <button type="button" class="remove-badge" data-filter="${filterType}" data-value="${filterValue}">x</button>
        </span>
      `;

      $('.filters-applied').append(badgeTemplate);
    }

    function updateBadges() {
      $('.filters-applied').html(''); // Limpa os badges atuais

      // Gerar badges para os filtros selecionados
      const locationFilter = getFilterLabel('#filter-location');
      const statusFilter = getFilterLabel('#filter-status');
      const roomsFilter = getFilterLabel('#filter-rooms');

      if (locationFilter) {
        locationFilter.forEach(value => generateBadge(value, 'location'));
      }

      if (statusFilter) {
        statusFilter.forEach(value => generateBadge(value, 'status'));
      }

      if (roomsFilter) {
        roomsFilter.forEach(value => generateBadge(value, 'rooms'));
      }

      // Adiciona evento de clique nos botões de remoção dos badges
      $('.remove-badge').on('click', function () {
        const filterType = $(this).data('filter');
        const filterValue = $(this).data('value');

        $(`#filter-${filterType} input[value="${filterValue}"]`).prop('checked', false); // Desmarca o filtro
        updateBadges(); // Atualiza os badges
        filterAndRender(); // Filtra e renderiza os empreendimentos
      });
    }

    function filterAndRender() {
      const filteredEmpreendimentos = filterEmpreendimentos(empreendimentosData);
      renderEmpreendimentos(filteredEmpreendimentos);
      updateBadges(); // Atualiza os badges ao filtrar
    }

    renderEmpreendimentos(empreendimentosData);

    $('#filter-location input.ckkBox').on('change', filterAndRender);
    $('#filter-status input.ckkBox').on('change', filterAndRender);
    $('#filter-rooms input.ckkBox').on('change', filterAndRender);

  } catch (error) {
    console.error('Erro ao carregar os empreendimentos:', error);
  }
}

async function initEmpreendimento() {
  await empreendimentoPage();
}

export { initEmpreendimento };
