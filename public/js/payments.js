$(document).ready(function () {

    $('.payment .approveButton').click(function () {
        var paymentId = $(this).parents('tr').attr('payment_id');

        $.post('/setPaymentAsPaid', {
            _token: $('._token').text(),
            paymentId: paymentId
        }, function () {
            window.location.reload();
        });
    });

});