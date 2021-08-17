define(['uiComponent', 'Mage2tv_UI4/js/counter-state'], function (Component, state) {
    'use strict';

    return Component.extend({
        defaults: {
            // counter: 0,
            // // inc: 0,
            // tracks: {
            //     counter: true,
            //     inc: true
            // },
            // imports: {
            //     value: "root.display:increment"
            // },
            inc: function () {
                return state.increment;
            },
            increment: function () {
                state.counter += state.increment;
            }
        }
    });
})
