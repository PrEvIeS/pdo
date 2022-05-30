$(document).ready(function () {
    $('#DATE').datepicker({
        format: "dd.mm.yyyy",
        language: "ru"
    });
    $(document).on('click','#addMember',function (e) {
        e.preventDefault();
        $(".member").clone().appendTo(".members");
    });
    $('.form').submit(function (event) {
        event.preventDefault();
        var $form = $(this);
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (response) {
            alert('Заявка успешно принята!');
        }).fail(function (jqXHR, textStatus, error) {
            alert(jqXHR.responseJSON.message);
        });
    });
});