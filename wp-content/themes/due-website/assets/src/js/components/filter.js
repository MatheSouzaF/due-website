export function renderFilters(filters, options) {
  populateFilters(filters, options);
  setCheckboxSelectLabels(filters);

  $('.toggle-next').click(function () {
    $(this).next('.checkboxes').slideToggle(400);
  });

  $('.ckkBox').change(function () {
    toggleCheckedAll(this);
    setCheckboxSelectLabels(filters);
  });
}

function populateFilters(filters, options) {
  $.each(filters, function (key, wrapper) {
    const optionValues = options[key] || [];
    const innerWrap = $(wrapper).find('.inner-wrap');

    optionValues.forEach(option => {
      const checkboxLabel = $('<label>');
      const checkbox = $('<input>')
        .attr('type', 'checkbox')
        .addClass('ckkBox val')
        .val(option.value);
      const span = $('<span>').text(option.label);

      checkboxLabel.append(checkbox).append(span);
      innerWrap.append(checkboxLabel).append('<br>');
    });
  });
}

function setCheckboxSelectLabels(filters) {
  $.each(filters, function (key, wrapper) {
    const checkboxes = $(wrapper).find('.ckkBox');
    const label = $(wrapper).find('.checkboxes').attr('id');
    let prevText = '';
    
    checkboxes.each(function () {
      const button = $(wrapper).find('button');
      if ($(this).prop('checked')) {
        const text = $(this).next().html();
        let btnText = prevText + text;
        const numberOfChecked = $(wrapper).find('input.val:checkbox:checked').length;
        if (numberOfChecked >= 4) {
          btnText = numberOfChecked + ' ' + label + ' selected';
        }
        $(button).text(btnText);
        prevText = btnText + ', ';
      }
    });
  });
}

function toggleCheckedAll(checkbox) {
  const apply = $(checkbox).closest('.filter-wrapper').find('.apply-selection');
  apply.fadeIn('slow');

  const val = $(checkbox).closest('.checkboxes').find('.val');
  const all = $(checkbox).closest('.checkboxes').find('.all');
  const ckkBox = $(checkbox).closest('.checkboxes').find('.ckkBox');

  if (!$(ckkBox).is(':checked')) {
    $(all).prop('checked', true);
    return;
  }

  if ($(checkbox).hasClass('all')) {
    $(val).prop('checked', false);
  } else {
    $(all).prop('checked', false);
  }
}
