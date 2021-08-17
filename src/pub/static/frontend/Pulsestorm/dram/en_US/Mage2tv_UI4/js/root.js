define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
        defaults: {
            imports: {
                value: "root.sharedState:value"
            },
            value: 0
        }
    });
})
