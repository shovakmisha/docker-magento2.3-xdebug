/*
 * *
 *  * Magepow
 *  * @category    Magepow
 *  * @copyright   Copyright (c) 2014 Magepow (http://www.magepow.com/)
 *  * @license     http://www.magepow.com/license-agreement.html
 *  * @Author: DavidDuong
 *  * @@Create Date: 4/16/19 3:20 PM
 *  * @@Modify Date: 7/14/20 3:20 PM
 *
 *
 */

define([
    'jquery',
    'Magento_Catalog/js/price-utils',
    'jquery/ui',
    'mage/translate',
    'Magepow_Layerednav/js/layerednav',
    'jquery-ui-modules/slider',
    'jquery-ui-modules/widget'
], function($, ultil) {
    "use strict";

    $.widget('magepow.LayerednavSlider', $.magepow.layerednav, {
        options: {
            sliderElement: '#layerednav_price_slider',
            textElement: '#layered_ajax_price_text'
        },
        _create: function () {

            var self = this;
            var flag = false;
            $(this.options.sliderElement).slider({
                range: true,
                min: self.options.minValue,
                max: self.options.maxValue,
                values: [self.options.selectedFrom, self.options.selectedTo],
                slide: function( event, ui ) {
                    flag = false;
                    self.displayText(ui.values[0], ui.values[1]);
                },
                change: function(event, ui) {
                    if(flag) {
                        ui.value = flag;
                        ui.values =[$(".from_fixed").val().substr(1,2), $(".to_fixed").val().substr(1,2)];
                    }
                    self.ajaxSubmit(self.getUrl(ui.values[0], ui.values[1]));
                }
            });
            this.displayText(this.options.selectedFrom, this.options.selectedTo);
            $(".from_fixed").change(function () {
                let sum = $(this).val().substr(1,2);
                flag = sum;
                $(self.options.sliderElement).slider("value", [sum, self.options.selectedTo]);
            });
            $(".to_fixed").change(function () {
                let sum = $(this).val().substr(1,2);
                flag = sum;
                $(self.options.sliderElement).slider("value", [self.options.selectedFrom, sum]);
            });
        },

        getUrl: function(from, to){
            return this.options.ajaxUrl.replace(encodeURI('{price_start}'), from).replace(encodeURI('{price_end}'), to);
        },

        displayText: function(from, to){
            $(this.options.textElement).html('<span class="space_fixed space_fixed--from"> ' + $.mage.__('from') + ' </span>' +
                                             '<input class="input-slide from_fixed" value="'+this.formatPrice(from) + '" />' +
                                             '<span class="space_fixed space_fixed--to"> ' + $.mage.__('to') + ' </span>' +
                                             '<input class=" input-slide to_fixed" value="' + this.formatPrice(to)+'" />');
        },

        formatPrice: function(value) {
            let formatedPrice = ultil.formatPrice(value, this.options.priceFormat);
            return formatedPrice;
        }
    });

    return $.magepow.LayerednavSlider;
});
