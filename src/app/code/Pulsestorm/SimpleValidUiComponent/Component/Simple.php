<?php
namespace Pulsestorm\SimpleValidUiComponent\Component;
class Simple extends \Magento\Ui\Component\AbstractComponent
{
    const NAME = 'html_content_pulsestorm_simple';
    public function getComponentName()
    {
        return self::getName();
    }
}
