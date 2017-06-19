$(document).ready(function() {
    
    $('.inCash').click(function() {
        if ($(this).attr('checked') === 'checked') {
            $('.paymentSlip').removeAttr('checked');
        } else {
            $('.paymentSlip').attr('checked', 1);
        }
    });
    
    $('.paymentSlip').click(function() {
        if ($(this).attr('checked') === 'checked') {
            $('.inCash').removeAttr('checked');
        } else {
            $('.inCash').attr('checked', 1);
        }
    });
    
});