define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
        defaults: {
            label: 'Component A',
            amount:11,
            exportValue: 'from component a',
            tracks: {
              amount: true
            },
            imports: {
                amount: 'component-b:value'
            },
            exports: {
                exportValue: 'component-b:fromExport' // тепер у компонента component-b буде свойство value зі значенням 11
            }
        }
    });
})
