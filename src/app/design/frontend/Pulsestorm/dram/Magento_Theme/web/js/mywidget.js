define([
    'jquery',
    'jquery/ui'
], function ($) {
    'use strict';

    $.widget('jason.mywidget', {
        options: {
            optionOne: '',
            optionTwo: '',
        },

        /**
         * @private
         */
        _create: function () {
            console.log('widget created');
            console.log(this.element);
            console.log(this.options);
        },
    });

    return $.jason.mywidget;
});
