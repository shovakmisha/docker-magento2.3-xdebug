define(['jquery'], function($)
{
    return function(config, element)
    {
        let qtyInput = $('#qty');

        $('.qty-arrow--top').click(function () {
            qtyInput.val( qtyInput.val()*1 + 1);
        })

        $('.qty-arrow--bottom').click(function () {
            qtyInput.val( qtyInput.val()*1 - 1);
        })
    };
});
