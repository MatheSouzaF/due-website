jQuery(document).ready(function($) {
  $('select[name="acf[field_66b18b1766cb9]').on('change', function() {
      var projectId = $(this).val();

      $.ajax({
          url: ajax_object.ajax_url,
          type: 'POST',
          data: {
              action: 'get_project_by_id',
              project_id: projectId
          },
          success: function(response) {
              if (response.success) {
                  $('input[name="acf[field_66bbadb89514b]"]').val(response.data.location);
                  $('input[name="acf[field_66bbb17e285fa]"]').val(response.data.status);
              }
          }
      });
  });
});
