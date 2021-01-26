$('#receive').click(function () {
  if ($("#receive").prop("checked") == true) {
    $('#rating_button').removeAttr('disabled');
  }
  if ($("#receive").prop("checked") == false){
    $("#rating_button").prop("disabled", true);
  }
});

$(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.parent().parent().next(':text').val(label);
});