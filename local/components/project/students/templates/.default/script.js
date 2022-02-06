$(document).ready(function () {
    $(document).on('click', '#printCard', function (e) {
        var request = {
            id: $('#studentId').val(),
        };
        window.open('/ajax/printCard.php?id=' + request.id, '_blank');
        window.focus();
    });
    $(document).on('click', '#printStatement', function (e) {
        var request = {
            id: $('#studentId').val(),
        };
        window.open('/ajax/printStatement.php?id=' + request.id, '_blank');
        window.focus();
    });
});