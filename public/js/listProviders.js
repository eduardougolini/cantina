$(document).ready(function () {

    $('.deleteButton').click(function () {

        var toDeleteArray = [];

        $('.tableBox table input[type=checkbox]').each(function () {
            if ($(this).is(':checked')) {
                var id = $(this).parents('.provider').attr('provider_id');

                if (id !== undefined) {
                    toDeleteArray.push($(this).parents('.provider').attr('provider_id'));
                }
            }
        });

        var jsonIdArray = JSON.stringify(toDeleteArray);

        $.ajax({
            url: '/deleteProviders',
            type: 'DELETE',
            data: {
                _token: $('._token').text(),
                ids: jsonIdArray
            },
            success: function(data) {
                console.log('deu boa');
            }
        });
    });

});