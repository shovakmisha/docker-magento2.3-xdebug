define(
    [
        'ko',
        'Mage2tv_UI5/js/plain/pixelbg'
    ],
    function (ko, pixelBackground) {
        'use strict';

        ko.bindingHandlers.pixelbg = {
             init: function (node, valueAccessor, allBindings, viewModel, bindingContext) {
                let value = ko.unwrap(valueAccessor() || {});
                let config = {
                  src: typeof value  === "string" ? value : value.src,
                  pixelSize: typeof value  === "string" ? allBindings.get('pixelSize') : value.pixelSize,
                  opaque: typeof value  === "string" ? allBindings.get('opaque') : 0.5
                };
                pixelBackground(config, node);
             }
        }
        return ko;
    }
);
