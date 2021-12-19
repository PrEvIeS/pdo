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
                        value: key,
                        text: value,
                    })
                );
            })
        });
    });
});