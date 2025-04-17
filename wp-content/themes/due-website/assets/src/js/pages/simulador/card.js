export function updateRooms(cardTemplate, rooms, isStudio) {
    let roomsText = 'N/A';

    if (rooms && rooms.length > 0) {
        const numberOfRoomns = rooms.sort((a, b) => a - b).map((n) => parseInt(n, 10));

        if (numberOfRoomns.length === 1) {
            roomsText = `${isStudio ? 'Studio e ' : ''}${numberOfRoomns[0]} ${numberOfRoomns[0] === 1 ? 'quarto' : 'quartos'
                }`;
        } else if (numberOfRoomns.length === 2) {
            roomsText = `${isStudio ? 'Studio, ' : ''}${numberOfRoomns[0]} e ${numberOfRoomns[1]} quartos`;
        } else {
            const minRoom = numberOfRoomns[0];
            const maxRoom = numberOfRoomns[numberOfRoomns.length - 1];
            roomsText = `${isStudio ? 'Studio, ' : ''}${minRoom} a ${maxRoom} quartos`;
        }
    }

    $(cardTemplate).find('.info-quartos').text(roomsText);
}

export function updateOffer(cardTemplate, offer, tituloOffer) {
    $(cardTemplate)
        .find('.valor')
        .text(offer || 'N/A');
    $(cardTemplate)
        .find('.entradas')
        .text(tituloOffer || 'N/A');
}


function updateSize(cardTemplate, size) {
    const tamanho = size && size[0];
    const sizeText = tamanho
        ? tamanho.metragem_minima === tamanho.metragem_maxima
            ? `${tamanho.metragem_maxima}m²`
            : `${tamanho.metragem_minima} a ${tamanho.metragem_maxima}m²`
        : 'N/A';
    $(cardTemplate).find('.info-tamanho').text(sizeText);
}

function updateCardContent(cardTemplate, empreendimento) {
    $(cardTemplate)
        .find('.nome-empreendimento')
        .text(empreendimento.name || 'N/A');
    $(cardTemplate)
        .find('.localizacao-empreendimento')
        .text(empreendimento.location || 'N/A');
    $(cardTemplate)
        .find('.label-informativo')
        .text(empreendimento.status || '');

    updateRooms(cardTemplate, empreendimento.rooms, empreendimento.isStudio);
    updateSize(cardTemplate, empreendimento.size);
    updateOffer(cardTemplate, empreendimento.offer, empreendimento.tituloOffer);
    updateMedia(cardTemplate, empreendimento.photo, empreendimento.video);
}

function updateMedia(cardTemplate, photo, video) {
    if (photo && photo.url) {
        $(cardTemplate).find('.imagem-empreendimento').attr('src', photo.url);
    } else {
        $(cardTemplate).find('.imagem-empreendimento').hide();
    }

    if (video) {
        $(cardTemplate).find('.video-empreendimento').attr('src', video);
    } else {
        $(cardTemplate).find('.video-empreendimento').hide();
    }
}

export function createEmpreendimentoCard(empreendimento) {
    const template = document.getElementById('resultado-empreendimento-template');
    const cardTemplate = template.content.cloneNode(true);
    const $boxCardLink = $(cardTemplate).find('.box-card');

    $boxCardLink.attr('href', empreendimento.link);

    updateCardContent(cardTemplate, empreendimento);

    return cardTemplate;
}