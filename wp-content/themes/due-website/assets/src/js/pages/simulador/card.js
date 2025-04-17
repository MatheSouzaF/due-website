export function createEmrpeendimentoCard(projeto) {
    // Imagem ou vídeo padrão caso não tenha sido fornecido
    const mediaHTML = projeto.photo ?
        `<img src="${projeto.photo}" alt="${projeto.name}" class="card-image">` :
        (projeto.video ?
            `<div class="card-video-container"><video src="${projeto.video}" class="card-video" controls></video></div>` :
            '<div class="card-no-media">Sem imagem disponível</div>');

    // Status da obra com classe CSS
    const statusClass = projeto.status ? projeto.status.toLowerCase().replace(/\s+/g, '-') : '';

    // Link para a página do empreendimento
    const linkURL = projeto.link || '#';

    return `
      <div class="resultado-card">
        <div class="card-media">
          ${mediaHTML}
        </div>
        <div class="card-content">
          <h3 class="card-title">${projeto.name}</h3>
          <div class="card-location">${projeto.location || ''}</div>
          <div class="card-details">
            ${projeto.rooms ? `<span class="card-rooms">${projeto.rooms} quartos</span>` : ''}
            ${projeto.isStudio ? '<span class="card-studio">Studio</span>' : ''}
            ${projeto.size ? `<span class="card-size">${projeto.size}m²</span>` : ''}
          </div>
          <div class="card-status ${statusClass}">${projeto.status || ''}</div>
          ${projeto.offer ? `<div class="card-offer">${projeto.tituloOffer || 'Oferta especial'}: ${projeto.offer}</div>` : ''}
          <a href="${linkURL}" class="card-link btn-primary">Ver detalhes</a>
        </div>
      </div>
    `;
}