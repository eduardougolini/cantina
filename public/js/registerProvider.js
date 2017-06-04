$(document).ready(function() {
   
    $('.providersForm .submit').click(function(e) {
        e.preventDefault();
        
        var saveRoute = $(this).attr('href');
        var token = $('.providersForm input[name=_token]').val();
        var name = $('.providersForm input[name=name]').val();
        var phone = $('.providersForm input[name=phone]').val();
        var email = $('.providersForm input[name=email]').val();
        var cep = $('.providersForm input[name=cep]').val();
        var state = $('.providersForm input[name=state]').val();
        var city = $('.providersForm input[name=city]').val();
        var district = $('.providersForm input[name=district]').val();
        var street = $('.providersForm input[name=street]').val();
        var number = $('.providersForm input[name=number]').val();
        
        $.post(saveRoute, {
           _token: token,
           name: name,
           phone: phone,
           email: email,
           cep: cep,
           state: state,
           city: city,
           district: district,
           street: street,
           number: number
        }, function(data) {
            debugger;
        });
    });
    
});