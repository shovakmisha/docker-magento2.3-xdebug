/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery'
], function ($) {
    'use strict';

    /**
     * @param {String} url
     * @param {*} fromPages
     */
    function processReviews(url, fromPages) {
        $.ajax({
            url: url,
            cache: true,
            dataType: 'html',
            showLoader: false,
            loaderContext: $('.product.data.items')
        }).done(function (data) {
            $('#product-review-container').html(data).trigger('contentUpdated');
            $('[data-role="product-review"] .pages a').each(function (index, element) {
                $(element).click(function (event) { //eslint-disable-line max-nested-callbacks
                    processReviews($(element).attr('href'), true);
                    event.preventDefault();
                });
            });
        }).complete(function () {
            if (fromPages == true) { //eslint-disable-line eqeqeq
                $('html, body').animate({
                    scrollTop: $('#reviews').offset().top - 50
                }, 300);
            }
        });
    }

    return function (config) {

        processReviews(config.productReviewUrl, location.hash === '#reviews');

        let blockWriteReview = document.querySelector('#review-form');
        blockWriteReview.style.display = 'none';

        $(function () {
            $('.product-info-main .reviews-actions a').click(function (event) {
                var anchor, addReviewBlock;

                event.preventDefault();
                blockWriteReview.style.display = 'block';
                anchor = $(this).attr('href').replace(/^.*?(#|$)/, '');
                addReviewBlock = $('#' + anchor);

                if (addReviewBlock.length) {
                    $('html, body').animate({
                        scrollTop: addReviewBlock.offset().top - 30
                    }, 300);
                }

            });
        });
    };
});
