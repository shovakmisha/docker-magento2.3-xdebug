define(['ko'], function (ko) {
    'use strict';

    return function (config) {

        let viewModel = {
            exchange_rates: ko.observableArray([
                {
                    currency_to: 'USD',
                    rate: 1.0
                }
            ])
        };

        return viewModel;
    }
});
