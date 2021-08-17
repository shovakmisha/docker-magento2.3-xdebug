define(['jquery'], function ($) {
    return function (config, elem) {
        $(elem).on('click', function () {
            $('.product-info-main .reviews-actions .add').click();
        })
    }
})
