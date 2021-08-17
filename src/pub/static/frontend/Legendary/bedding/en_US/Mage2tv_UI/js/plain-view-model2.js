define(['ko'], function (ko) {
    'use strict';

    return function (config) {
        console.log(config);
        let viewModel = {
            label: ko.observable('current Info')
        };
        viewModel.output = ko.computed(function () {
           return this.label() + ': something';
        }.bind(viewModel));
        return viewModel;
    }
});
