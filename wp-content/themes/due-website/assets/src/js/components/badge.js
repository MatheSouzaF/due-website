export function generateBadge(filterValue, filterType) {
  let badgeLabel = filterValue;

  if (filterType === 'rooms' && filterValue !== 'studio') {
    badgeLabel += Number(filterValue) === 1 ? ' quarto' : ' quartos';
  }

  const badgeTemplate = `
    <span class="badge ${filterType}">
      ${badgeLabel}
      <button type="button" class="remove-badge" data-filter="${filterType}" data-value="${filterValue}"><svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
  <path d="M1 8L8 1M1 1L8 8" stroke="#51848C" stroke-width="0.583333" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button>
    </span>
  `;

  $('.filters-applied').append(badgeTemplate);
}
