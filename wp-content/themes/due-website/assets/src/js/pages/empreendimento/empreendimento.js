import { getEmpreendimentos } from "../../services/EmpreendimentoService";
import { renderFilters } from "../../components/filter";

async function empreendimentoPage() {
  console.warn('Módulo Empreendimento Iniciado!');

  try {
    const empreendimentosData = await getEmpreendimentos();

    function renderEmpreendimentos(empreendimentos) {
      $('.empreendimentos').html('');

      empreendimentos.forEach(function (empreendimento) {
        const cardTemplate = $('#empreendimento-template').contents().clone(true);

        cardTemplate.find('.nome-empreendimento').text(empreendimento.name);
        cardTemplate.find('.localizacao-empreendimento').text(empreendimento.location);
        cardTemplate.find('.label-informativo').text(empreendimento.status);
        cardTemplate.find('.info-quartos').text(`${empreendimento.rooms[0].minimo_de_quartos} a ${empreendimento.rooms[0].maximo_de_quartos} quartos`);
        cardTemplate.find('.info-tamanho').text(`${empreendimento.size[0].metragem_minima} a ${empreendimento.size[0].metragem_maxima}m²`);
        cardTemplate.find('.valor').text(empreendimento.offer);

        // if (empreendimento.photo) {
        //   cardTemplate.find('.imagem-empreendimento').attr('src', empreendimento.photo.url).show();
        // } else {
        //   cardTemplate.find('.imagem-empreendimento').hide();
        // }

        // if (empreendimento.video) {
        //   cardTemplate.find('.video-empreendimento').attr('src', empreendimento.video).show();
        // } else {
        //   cardTemplate.find('.video-empreendimento').hide();
        // }

        $('.empreendimentos').append(cardTemplate);
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
        'filter-rooms': Array.from(roomsOptions).map(room => ({ value: room, label: `${room} Quartos` }))
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

    function filterAndRender() {
      const filteredEmpreendimentos = filterEmpreendimentos(empreendimentosData);
      renderEmpreendimentos(filteredEmpreendimentos);
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
