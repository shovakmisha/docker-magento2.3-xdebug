define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
        defaults: {
            label: 'Observable, now with property getters and setters',
            additional_charge: 2,
            items: [
                {name: 'Surprise Box', qty: 5, price: 1.5},
                {name: 'Chunk of Goo', qty: 1, price: 7.5}
            ],
            tracks: {
                additional_charge: true,
                items: true
            }
        },
        rowTotal: item => item.qty * item.price,
        total: function () {
            const sum = this.items.map(this.rowTotal).reduce((acc, total) => acc + total);
            return sum + this.additional_charge;
        }
    });
})
