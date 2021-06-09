define(['jquery'], function ($) {
    'use strict';

    return function (config, element) {
        console.log(config, element);
        $.getJSON(config.base_url);
    }
});
