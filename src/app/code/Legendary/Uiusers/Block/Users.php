<?php

namespace Legendary\Uiusers\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;


class Users extends \Magento\Framework\View\Element\Template
{

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var \Legendary\Uiusers\Model\Users
     */
    protected $users;

    /**
     * Users constructor.
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Legendary\Uiusers\Model\UsersFactory $users,
        Template\Context $context,
        StoreManagerInterface $storeManager,
        array $data = []
    )
    {
        $this->storeManager = $storeManager;
        $this->users = $users;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Framework\Data\Collection\AbstractDb|\Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection|null
     */
    public function getUsers()
    {
        $users = $this->users->create();
        return $users->getCollection();
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl;
    }
}
