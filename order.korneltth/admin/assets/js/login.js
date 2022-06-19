$(document).on('submit', '#adminformlogin', function(event) {
    event.preventDefault();

    var pwd = $('#password').val();

    $.ajax({
        type: 'POST',
        url: 'assets/php/login/login.php',
        cache: false,
        dataType: 'JSON',
        data: {
            task: 'adminlogin',
            pwd: pwd
        },
        success: function(response) {
            console.log(response);
            if (response.success == 1) {
                toastr.success('You have been logged in successfully!');
                location.href = 'index.php';
            } else {
                toastr.error(response.msg);
            }
        },
        error: function(response) {
            console.log(response);
            toastr.error("Something went wrong while authentication. Please try again!");
        }
    });

});

// Updating Password
$(document).on('submit', '#update-password', (function (e) {
    e.preventDefault();
    
    $.ajax({
        url: 'assets/php/login/password.php',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            console.log(response);
            //var obj = JSON.parse(response);
            if (response.success == 1) {
                toastr.success(response.data);
                $('#update-password')[0].reset();
            } else {
                toastr.error(response.data);
            }
        },
        error: function (response) {
            console.log(response);
            toastr.error('Error:' + response.msg);
        }
    });
}));