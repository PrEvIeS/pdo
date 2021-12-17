var checkboxForm = $('#exampleCheck1');

$(document).on('click', '.js-checkboxCheck', function() {
    checkboxForm.prop('checked', true);
});

$(document).on('click', '.js-checkboxNotCheck', function() {
    checkboxForm.prop('checked', false);
});