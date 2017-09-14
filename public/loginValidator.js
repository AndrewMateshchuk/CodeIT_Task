$(document).ready(function () {
    $('#login-form').on('submit', validate);
    $('#login-form').on('input', validate);
});
//Функция валидации формы входа
function validate() {
    $('#email').val($('#email').val().replace(' ', ''));
    var email = $('#email').val();
    var pattern = /([^a-zA-Z0-9-_@.])/;
    if(email.length < 5 || email.length > 50 || pattern.test(email)){
        $('#email').addClass('warning');
        return false;
    } else {
        $('#email').removeClass('warning');
    }
    $('#password').val($('#password').val().replace(' ', ''));
    var password = $('#password').val();
    var pattern = /([^a-zA-Z0-9-_])|[-_]{2,}/;
    if(password.length < 8 || password.length > 30 || pattern.test(password)){
        $('#password').addClass('warning');
        return false;
    } else {
        $('#password').removeClass('warning');
        $('#login-btn').addClass('btn-primary');
    }
}