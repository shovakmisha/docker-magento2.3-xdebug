define([
    'jquery',
    'underscore',
    'Magento_Payment/js/view/payment/cc-form'
], function ($, _, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Pronko_SamplePaymentGateway/payment/cc-form',
            code: 'sample_gateway'
        },

        getCode: function () {
            return 'sample_gateway';
        },

        isActive: function () {
            return this.getCode() === this.isChecked();
        },

        /**
         * Get list of available month values
         * @returns {Object}
         */
        getCcMonthsValues: function () {
            let x = this.getCcMonths();
            return _.map(this.getCcMonths(), function (value, key) {
                return {
                    'value': key,
                    'month': value
                };
            });
        },

        /**
         * Get list of months
         * @returns {Object}
         */
        getCcMonths: function () {
            return window.checkoutConfig.payment.ccform.months['sample_gateway'];
        },
    });
});
