define(['jquery', 'collapsible'], function ($) {
    'use strict';

    let waitForUpdate = function () {
        if(!this.content.attr('array-busy')) {
            return this.content.trigger('contentUpdated')
        }
    }
});
