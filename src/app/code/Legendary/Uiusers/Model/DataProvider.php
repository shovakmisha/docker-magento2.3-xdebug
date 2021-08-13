<?php

namespace Legendary\Uiusers\Model;

use Legendary\Uiusers\Model\ResourceModel\Users\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * id field in database
     */
    const ID_FIELD = 'user_id';

    const IMAGE_PATH = 'codextblog/feature/';

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var array
     */
    protected $loadedData;

    // @codingStandardsIgnoreStart
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        StoreManagerInterface $storeManager,
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $blogCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->request = $request;
        $this->storeManager = $storeManager;
        $this->collection = $blogCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    // @codingStandardsIgnoreEnd

    public function getData()
    {

        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $id = $this->request->getParam(self::ID_FIELD);

        $items = $this->collection->getItems();

        foreach ($items as $blog) {
            $this->loadedData[$blog->getUserId()] = $blog->getData();
        }



        if (isset($this->loadedData[$id]['image'])) {
            $name = $this->loadedData[$id]['image'];
            unset($this->loadedData[$id]['image']);
            $this->loadedData[$id]['image'][0] = [
                'name' => $name,
                'url' => $this->getMediaUrl().self::IMAGE_PATH.$name
            ];
        }

        return $this->loadedData;
    }

    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl;
    }
}
