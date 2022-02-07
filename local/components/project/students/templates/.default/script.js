$(document).ready(function () {
    $(document).on('click', '#printCard', function (e) {
        e.preventDefault();
        var request = {
            id: $(this).attr('href'),
        };
        window.open('/ajax/printCard.php?id=' + request.id, '_blank');
        window.focus();
    });
    $(document).on('click', '#printStatement', function (e) {
        e.preventDefault();
        var request = {
            id: $(this).attr('href'),
        };
        window.open('/ajax/printStatement.php?id=' + request.id, '_blank');
        window.focus();
    });
});