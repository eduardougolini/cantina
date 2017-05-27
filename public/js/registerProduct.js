$(document).ready(function() {
   
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
});