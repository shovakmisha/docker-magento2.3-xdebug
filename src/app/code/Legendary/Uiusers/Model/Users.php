<?php

namespace Legendary\Uiusers\Model;

use Legendary\Uiusers\Model\ResourceModel\Users as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Users extends AbstractModel
{

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
