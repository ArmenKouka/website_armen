function login_view(login_view) {
    $('.fullscreen-container').html(login_view);
}

$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'registration_view.php',
        success: function(response) {
            login_view(response);
        }
    });
});
