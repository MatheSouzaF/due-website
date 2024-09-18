export function getFilterLabel(selector) {
  const value = $(selector)
    .find('input:checked')
    .map(function () {
      return this.value;
    })
    .get();

  return value.length > 0 ? value : null;
}