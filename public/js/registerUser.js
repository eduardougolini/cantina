$(document).ready(function () {

    var datepicker = document.querySelector('dom-bind');

    datepicker._onSelectedDateChanged = function (ev) {
        var _value = ev.detail.value;
        $(ev.target).attr('date', _value);
    };
    
    $('.register .submit').click(function(e) {
        e.preventDefault();
        
        var token = $('.register input[name="_token"]').val();
        var username = $('.register input[name="username"]').val();
        var responsibleName = $('.register input[name="responsibleName"]').val();
        var email = $('.register input[name="usermail"]').val();
        var password = $('.register input[name="password"]').val();
        var birthDate = $('.register .birthDate').attr('date');
        var cpf = $('.register input[name="cpf"]').val();
        var rg = $('.register input[name="rg"]').val();
        var registration = $('.register input[name="registration"]').val();
        var phone = $('.register input[name="phone"]').val();
        
        var url = $('.register').attr('action');
        
        $.post(url, {
            _token: token,
            username: username,
            responsibleName: responsibleName,
            email: email,
            password: password,
            birthDate: birthDate,
            cpf: cpf,
            rg: rg,
            registration: registration,
            phone: phone
        }, function(data) {
            window.location.href = data;
        });
    });
});