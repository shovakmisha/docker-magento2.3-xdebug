define(['uiElement', 'jquery'], function (uiElement, $) {
    'use strict';

    return uiElement.extend({
        getTitle: function () {
            let remaining = 60 - new Date().getSeconds();
            return $.mage.__('Place order within %1 seconds!').replace('%1', remaining);
        }
    });
});
