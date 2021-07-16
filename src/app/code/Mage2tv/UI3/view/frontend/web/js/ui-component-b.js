define(['ko', 'uiComponent'], function (ko, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            title: 'Component B',
            value: 'value of Component B',
            fromExport: ko.observable('export property')
        }
    });
})
