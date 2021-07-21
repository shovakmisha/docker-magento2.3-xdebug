define([
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
], function (Component, renderList) {
    'use strict';

    renderList.push({
        type: 'pronko_authorizenet',
        component: 'Pronko_Authorizenet/js/view/payment/method-renderer/cc-form.js'
    });

    return Component.extend({})
});
