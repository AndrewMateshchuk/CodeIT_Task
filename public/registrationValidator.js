                                    //Валидация при изменении и отправки формы
$(document).ready(function () {
    $('#registration-form').on('submit', validateForm);
    $('#registration-form').on('input', validateForm);
    $('#agreement').on('change', validateForm);
});
var data = {
    'email' : {
        'min' : 8,
        'max' : 50,
        'pattern' : /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i
    },
    'login' : {
        'min' : 5,
        'max' : 30,
        'pattern' : /([^a-zA-Z0-9-_])|[0-9-_]{2,}/
    },
    'name' : {
        'min' : 5,
        'max' : 30,
        'pattern' : /([^a-zA-Zа-яА-Я])/
    },
    'password' : {
        'min' : 8,
        'max' : 30,
        'pattern' : /([^a-zA-Z0-9-_])|[-_]{2,}/
    }
}
function validateForm() {
    if(validate('email') &&
       validate('login') &&
       validate('name') &&
       validate('password') &&
       validateRepeatPassword()&&
       validateBirthDate()
       ){} else return false;        //Если все данные валидны проверяем чекбокс и
    if($('#agreement').prop("checked")) { //отправляем данные
        $('#agreement-rules').hide();
        $('#registration-btn').removeClass('btn-default');
        $('#registration-btn').addClass('btn-primary');
    }else{
        $('#agreement-rules').show("slow");
        return false;
    }
}

function validateBirthDate() {
    var date = $('#birthDate').val();
    var pattern = /\d\d\d\d-\d\d-\d\d/;
    if(!pattern.test(date)){
        return failure('birthDate');
    }else{
         return success('birthDate');
    }
}
function validateRepeatPassword() {
    $('#repeat-password').val($('#repeat-password').val().replace(' ', ''));
    var password = $('#password').val();
    var repeat_password = $('#repeat-password').val();
    if(password != repeat_password){
        return failure('repeat-password');
    }else{
        return success('repeat-password');
    }
}
function success(id) {
    $('#'+id).removeClass('warning');
    $('#'+id+'-rules').hide();
    return true;
}
function failure(id) {
    $('#'+id).addClass('warning');
    $('#'+id+'-rules').show("slow");
    return false;
}
function validate(id) {
    if(id == "name") $('#'+id).val(capitalizeFirstLetter($('#'+id).val().toLowerCase()));
    var value = $('#'+id).val();
    var test = data[id]['pattern'].test(value);
    if(id == "email") test = !test;
    if(value.length < data[id]['min'] || value.length > data[id]['max'] || test) {
        return failure(id);                                       //Некорректные данные - отмена отправки
    } else {                                                      //Все ок идем дальше ...
        return success(id);
    }                                                             //Так для каждого inputa
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}