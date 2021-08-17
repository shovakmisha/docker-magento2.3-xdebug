define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
        defaults: {
            label: 'Component A',
            amount:11,
            links: {
                amount: 'componente-b:value'
            },
            tracks: {
              amount: true
            },
            imports: {
                amount: '${$.provider}:value' // $ виступає в ролі this. Але this не можна писати
            }
        }
    });
})
