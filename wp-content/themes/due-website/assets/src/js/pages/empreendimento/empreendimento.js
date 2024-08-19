import { getEmpreendimentos } from "../../services/EmpreendimentoService";

async function empreendimentoPage() {
  console.warn('Módulo Empreendimento Iniciado!');

  try {
    const empreendimentosData = await getEmpreendimentos();
    console.log("🚀 ~ empreendimentos:", empreendimentosData);

    empreendimentosData.forEach(function(empreendimento) {
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

      if (empreendimento.video) {
        cardTemplate.find('.video-empreendimento').attr('src', empreendimento.video).show();
      } else {
        cardTemplate.find('.video-empreendimento').hide();
      }

      $('.empreendimentos').append(cardTemplate);
    });
  } catch (error) {
    console.error('Erro ao carregar os empreendimentos:', error);
  }
}

async function initEmpreendimento() {
  await empreendimentoPage();
}

export { initEmpreendimento };
