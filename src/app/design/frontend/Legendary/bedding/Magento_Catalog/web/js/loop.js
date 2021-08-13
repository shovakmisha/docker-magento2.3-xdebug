define(['jquery'], function($)
{
    return function(config, element)
    {
        $(element).click(function () {
            $('.fotorama__active .fotorama__img').click();
        })
    };
});
