$(document).ready(function () {
    $(document).on('change', '#PROGRAMM', function (e) {
        var value = $(this).val();
        $('#course').empty();
        $('#period').empty();
        $.ajax({
            url: '/ajax/getCourses.php',
            method: 'POST',
            data: {
                program: value
            },
        }).done(function (response) {
            $.each(response, function (key, value) {
                $('select[id=course]').append(
                    $('<option>', {
                        value: key,
                        text: value,
                    })
                );
            })
        });
    });
    $('#date-of-birth').datepicker({
        format: "dd.mm.yyyy",
        language: "ru"
    });
    $('#date-of-issue').datepicker({
        format: "dd.mm.yyyy",
        language: "ru"
    });
    jQuery(function($){
        $(".phone_mask").mask("+7(999)999-99-99");
    });
    $(document).on('change', '#course', function (e) {
        $('#period').empty();
        var value = $(this).val();
        $.ajax({
            url: '/ajax/getPeriods.php',
            method: 'POST',
            data: {
                id: value
            },
        }).done(function (response) {
            $.each(response, function (key, value) {
                $('select[id=period]').append(
                    $('<option>', {
                        value: value,
                        text: value,
                    })
                );
            })
        });
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
            alert('Вы успешно зарегистрированы!');
            window.location.reload();
        }).fail(function (jqXHR, textStatus, error) {
            alert(jqXHR.responseJSON.message);
        });
    });
    $(document).on('click', '#printStatement', function (e) {

        var request = {
            type: $('#PROGRAMM').val(),
            course: $('#course').val(),
            period: $('#period').val(),
        };
        window.open('/ajax/getStatement.php?type=' + request.type + '&course=' + request.course + '&period=' + request.period, '_blank');
        window.focus();
    });
});