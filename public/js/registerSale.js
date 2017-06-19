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
   
    $('.addProductButton').click(function() {
        var productId = $('.productSelect paper-item.iron-selected').attr('product_id');
        
        $.get('/getProduct/' + productId, function(data) {
            data = JSON.parse(data);
            
            $('.productsTable tbody').append(
                '<tr>' +
                    '<td class="mdl-data-table__cell--non-numeric">' + data.name + '</td>' +
                    '<td class="mdl-data-table__cell--non-numeric"><input class="ammount" type="number" value=1 /></td>' +
                    '<td class="value mdl-data-table__cell--non-numeric" unit_price = ' + data.value + '>' + data.value + '</td>' +
                    '<td class="mdl-data-table__cell--non-numeric"><a class="removeProductButton mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color--red-500">Remover</a></td>' +
                '</tr>'
            );
        });
    });
    
    $('.productsTable').on('change', '.ammount', function() {
        var valueObj = $(this).parents('td').siblings('.value');
        
        valueObj.text((valueObj.attr('unit_price') * $(this).val()).toFixed(2));
    });
    
    $('.productsTable').on('click', '.removeProductButton', function() {
        var rowToRemove = $(this).parents('tr').remove();
    });
});