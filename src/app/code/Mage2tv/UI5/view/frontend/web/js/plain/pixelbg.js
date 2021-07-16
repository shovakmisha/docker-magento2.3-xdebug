define(
    [
        'Mage2tv_UI5/js/lib/pixel-image-canvas',
        'Mage2tv_UI5/js/lib/create-background-canvas'
    ],
    function (pixelImageOnCanvas, createBackgroundCanvas) {
        'use strict';

        return function (config, targetElement) {
             let src = config.src || '';
             let pixelSize = Math.max(config.pixelSize || 5, 1);
             let canvas = createBackgroundCanvas(targetElement);
             canvas.style.opacity = config.opacity || 0.5
             const cols = Math.floor(canvas.scrollWidth / pixelSize);
             const rows = Math.floor(canvas.scrollHeight / pixelSize);
             pixelImageOnCanvas(canvas, src, cols, rows);
             return canvas;
        }
    }
);
