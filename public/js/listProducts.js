$(document).ready(function () {
    $('.deleteButton').click(function () {

        var toDeleteArray = [];

        $('.tableBox table input[type=checkbox]').each(function () {
            if ($(this).is(':checked')) {
                var id = $(this).parents('.product').attr('product_id');

                if (id !== undefined) {
                    toDeleteArray.push($(this).parents('.product').attr('product_id'));
                }
            }
        });

        var jsonIdArray = JSON.stringify(toDeleteArray);

        $.ajax({
            url: '/deleteProducts',
            type: 'DELETE',
            data: {
                _token: $('._token').text(),
                ids: jsonIdArray
            },
            success: function () {
                window.location.reload();
            }
        });
    });
});