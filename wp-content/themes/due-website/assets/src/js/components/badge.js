export function generateBadge(filterValue, filterType) {
  let badgeLabel = filterValue;

  if (filterType === 'rooms' && filterValue !== 'studio') {
    badgeLabel += Number(filterValue) === 1 ? ' qto' : ' qtos';
  }

  const badgeTemplate = `
    <span class="badge ${filterType}">
      ${badgeLabel}
      <button type="button" class="remove-badge" data-filter="${filterType}" data-value="${filterValue}">x</button>
    </span>
  `;

  $('.filters-applied').append(badgeTemplate);
}