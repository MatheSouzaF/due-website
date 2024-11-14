export function updateOffer(cardTemplate, offer, tituloOffer) {
  $(cardTemplate)
    .find('.valor')
    .text(offer || 'N/A');
  $(cardTemplate)
    .find('.entradas')
    .text(tituloOffer || 'N/A');
}
