function getBannerToShow(banners, location) {
  if (!location || location.length !== 1) {
    return banners.find((banner) => banner.location === 'Rota DUE');
  }
  return banners.find((banner) => banner.location === location[0]);
}

function updateBannerContent(banner) {
  $('#image-inject')
    .attr('src', banner.media.url || 'N/A')
    .attr('alt', banner.media.alt || banner.media.title || 'N/A');
  $('#titulo-do-banner').html(banner.title || 'N/A');
  $('#descricao-do-banner').html(banner.description || 'N/A');

  if (banner.link) {
    $('#link-banner').attr('href', banner.link.url);
    $('#link-text').html('Saiba mais');
    $('#link-banner').show();
  } else {
    $('#link-banner').hide();
  }
}

function updateBannerImages(banner) {
  $('#svg-rota-due').html(`<img src="${banner.svg_rota.url || 'N/A'}" alt="${banner.svg_rota.title || 'N/A'}">`);
  $('#svg-caribe').html(`<img src="${banner.svg_caribe_logo.url || 'N/A'}" alt="${banner.svg_caribe_logo.title || 'N/A'}">`);
}

function updateBannerComments(banner) {
  $('#comentarios-container').empty();
  if (banner.comments && banner.comments.length > 0) {
    banner.comments.forEach(function (comment) {
      var commentHTML = `
        <div class="comment">
          <img src="${comment.svg_comentario_banner.url || 'N/A'}" alt="${
        comment.svg_comentario_banner.title || 'N/A'
      }">
          <p class="titulo-comentarios founders-grotesk">${comment.texto_comentario_banner || 'N/A'}</p>
        </div>
      `;
      $('#comentarios-container').append(commentHTML);
    });
  } else {
    $('#comentarios-container').append('<p>Sem comentários</p>');
  }
}

export function initBanner({location}) {
  const banners = BannersData.banners;

  const bannerToShow = getBannerToShow(banners, location);

  if (bannerToShow) {
    updateBannerContent(bannerToShow);
    updateBannerImages(bannerToShow);
    updateBannerComments(bannerToShow);
  } else {
    console.log('Nenhum banner encontrado para a localização especificada.');
    updateBannerContent({title: 'N/A', description: 'N/A', media: {url: 'N/A', alt: 'N/A', title: 'N/A'}, link: null});
    updateBannerImages({svg_rota: {url: 'N/A', title: 'N/A'}, svg_caribe: {url: 'N/A', title: 'N/A'}});
    updateBannerComments({comments: []});
  }
}
