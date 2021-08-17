define(['uiElement'], function (uiElement) {
    'use strict';

    return uiElement.extend({
        defaults: {
            label: 'defaults My first ui component',
            values: [22, 1, 5, 777]
        },
        label: 'My first ui component'
    });
});
