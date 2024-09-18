export function getFilterValue(selector) {
  const value = $(selector)
    .find('input:checked')
    .map(function () {
      return this.value.toLowerCase();
    })
    .get();

  return value.length > 0 ? value : null;
}