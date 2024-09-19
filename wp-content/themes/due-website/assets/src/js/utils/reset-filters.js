export function resetCheckboxesEmpreendimentos() {
  const params = new URLSearchParams(window.location.search);
  const locationFilter = params.get('localizacao') ? params.get('localizacao').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];
  const statusFilter = params.get('estagio') ? params.get('estagio').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];
  const roomsFilter = params.get('qtos') ? params.get('qtos').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];

  $(".ckkBox").each(function () {
    const $checkbox = $(this);
    const value = $checkbox.val();
    const isChecked = $checkbox.prop('checked');

    if (
      $checkbox.closest('#filter-location, #mobile-filter-location').length &&
      locationFilter.indexOf(value) === -1
    ) {
      if (isChecked) {
        $checkbox.click();
      }
    }

    if (
      $checkbox.closest('#filter-status, #mobile-filter-status').length &&
      statusFilter.indexOf(value) === -1
    ) {
      if (isChecked) {
        $checkbox.click();
      }
    }

    if (
      $checkbox.closest('#filter-rooms, #mobile-filter-rooms').length &&
      roomsFilter.indexOf(value) === -1
    ) {
      if (isChecked) {
        $checkbox.click();
      }
    }
  });
}

export function resetCheckboxesTipologia() {
  const params = new URLSearchParams(window.location.search);

  const locationFilter = params.get('tipo-localizacao') ? params.get('tipo-localizacao').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];
  const statusFilter = params.get('tipo-estagio') ? params.get('tipo-estagio').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];
  const empreendimentoFilter = params.get('tipo-empreendimento') ? params.get('tipo-empreendimento').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];
  const diferenciaisFilter = params.get('tipo-diferenciais') ? params.get('tipo-diferenciais').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];
  const roomsFilter = params.get('tipo-qtos') ? params.get('tipo-qtos').split(',').map(v => v.replace(/_/g, ' ').replace(/%/g, '')) : [];

  $(".ckkBox").each(function () {
    const $checkbox = $(this);
    const value = $checkbox.val();
    const isChecked = $checkbox.prop('checked');

    const isLocationFilter = $checkbox.closest('#tipologia-filter-location').length && locationFilter.includes(value);
    const isStatusFilter = $checkbox.closest('#tipologia-filter-status').length && statusFilter.includes(value);
    const isEmpreendimentoFilter = $checkbox.closest('#tipologia-filter-empreendimento').length && empreendimentoFilter.includes(value);
    const isDiferenciaisFilter = $checkbox.closest('#tipologia-filter-diferenciais').length && diferenciaisFilter.includes(value);
    const isRoomsFilter = $checkbox.closest('#tipologia-filter-rooms').length && roomsFilter.includes(value);

    if (
      (!isLocationFilter && $checkbox.closest('#tipologia-filter-location').length) ||
      (!isStatusFilter && $checkbox.closest('#tipologia-filter-status').length) ||
      (!isEmpreendimentoFilter && $checkbox.closest('#tipologia-filter-empreendimento').length) ||
      (!isDiferenciaisFilter && $checkbox.closest('#tipologia-filter-diferenciais').length) ||
      (!isRoomsFilter && $checkbox.closest('#tipologia-filter-rooms').length)
    ) {
      if (isChecked) {
        $checkbox.click();
      }
    }
  });
}