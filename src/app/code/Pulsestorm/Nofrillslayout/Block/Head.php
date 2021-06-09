<?php

namespace Pulsestorm\Nofrillslayout\Block;

class Head extends \Magento\Framework\View\Element\Template
{
    public $assetRepository ;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    )
    {
        $this->assetRepository = $context->getAssetRepository();
        return parent::__construct($context , $data);
    }
}
