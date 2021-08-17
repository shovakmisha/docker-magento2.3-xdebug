define(['jquery'], function($){
    'use strict';
    console.log("Called this Hook.");
    return function(targetModule){
        $.widget('mage.catalogAddToCart', targetModule, {
            submitForm: function (form) {
                console.log('Add to cart');
                console.log(form);
                return this._super(form);
            },
        })
        // return targetModule; // це поверне старий віджжет, а мені треба повернути мій новий
        return $.mage.catalogAddToCart;
    };
});
