<?php

namespace Legendary\Uiusers\Model\ResourceModel\Users;

use Legendary\Uiusers\Model\ResourceModel\Users as ResourceModel;
use Legendary\Uiusers\Model\Users as Model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_eventObject = 'ui_users_collection';

    protected $_eventPrefix = 'ui_users_collection';
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
