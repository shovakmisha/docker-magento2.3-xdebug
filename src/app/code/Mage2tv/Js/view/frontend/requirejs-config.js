
var config = {
    map: {
        '*': {
            coffee: 'Mage2tv_Js/js/script-example'
        }
    },
    paths: {
        'mage2tv': 'Mage2tv_Js/js/v2',
        'mage2tv-title': 'Mage2tv_Js/js/v1/title'
    },

    config: {
        mixins: {
            'Magento_Checkout/js/checkout_data': {
                'Mage2tv_Js/js/checkout-data-mixin': true
            }
        }
    },

    deps: ['Mage2tv_Js/js/log-then-loaded'],

    shim: {
        'Magento_Catalog/js/view/compare-products': {
            deps: ['Mage2tv_Js/js/before-compare-product-example']
        }
    }
};
