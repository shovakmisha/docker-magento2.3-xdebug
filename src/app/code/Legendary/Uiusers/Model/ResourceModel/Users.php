<?php

namespace Legendary\Uiusers\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Users extends AbstractDb
{

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('ui_users', 'user_id');
        $this->_useIsObjectNew = true;
    }
}
