$(document).ready(function () {
    $(document).on('change', '#PROGRAMM', function (e) {
        var value = $(this).val();
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
    $(document).on('change', '#course', function (e) {
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