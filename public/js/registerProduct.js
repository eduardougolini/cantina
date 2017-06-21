$(document).ready(function() {
   
   var datepickers = document.querySelector('dom-bind');
   
    $('.register .imageInput').click(function() {
        $('.register input.picture').click();
    });
    
    $('.register input.picture').change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.register .imageInput').html('<img alt="Imagem do produto">');
                $('.register .imageInput img').attr('src', e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });
    
    $('.register .submit').click(function(e) {
        e.preventDefault();
        
        var saveRoute = $(this).attr('href');
        var token = $('.register input[name=_token]').val();
        var productName = $('.register input[name=name]').val();
        var productDescription = $('.register input[name=description]').val();
        var productValue = $('.register input[name=value]').val();
        var productAmount = $('.register input[name=amount]').val();
        var providerId = $('.providersSelect paper-item[aria-selected=true]').attr('value');
        var productEntryDate = $('.entryDate').attr('date');
        var productValidityDate = $('.expirationDate').attr('date');
        
        $.post(saveRoute, {
            _token: token,
            name: productName,
            description: productDescription,
            value: productValue,
            amount: productAmount,
            providerId: providerId,
            entryDate: productEntryDate,
            validityDate: productValidityDate
        }, function() {
            window.location.reload();
        });
    });
    
    datepickers._onSelectedDateChanged = function(ev) {
        var _value = ev.detail.value;
        $(ev.target).attr('date', _value);
    };
});