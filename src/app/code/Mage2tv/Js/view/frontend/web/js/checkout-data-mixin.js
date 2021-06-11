define([], function () {
   'use strict';

   return function (checkoutData) {
       let orig = checkoutData.setSelectedShippingAddress;
       checkoutData.setSelectedShippingAddress = function () {
           let address = orig.bind(checkoutData);
           console.log("Selected shipping address", address);
           return address;
       }
       return checkoutData;
   }
});
