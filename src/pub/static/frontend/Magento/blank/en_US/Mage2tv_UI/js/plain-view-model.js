define(['ko'], function (ko) {
    'use strict';

    return function (config) {
        // console.log(config);
        let title = ko.observable('title');
        title.subscribe(function (newValueTitle) {
            console.log(newValueTitle);
        });
        title.subscribe(function (oldValue) {
            console.log(oldValue);
        }, this, 'beforeChange');
        return {
            title: title,
            config: config,
            // label: ko.observable('currency info'), // тут застой. Тому створюю новий фай   plain-view-model2 у яякому це буде работати
            // output: ko.computed(function () {
            //     return this.label() + ':';
            // })

        }
    }
});
