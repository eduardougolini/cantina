$('document').ready(function() {
   
    $('.addBalance').click(function(e) {
       e.preventDefault();
       
       var paymentSlipUrl = $(this).attr('href');
       var token = $(this).siblings('input[name=_token]').val();
       var value = $(this).siblings('.value').val();
       
       $.post(paymentSlipUrl, {
           _token: token,
           value: value
       }, function(data) {
            window.document.write(data);
       });
    });
    
});