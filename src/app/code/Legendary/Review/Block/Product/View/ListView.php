<?php

namespace Legendary\Review\Block\Product\View;


use Magento\Catalog\Api\ProductRepositoryInterface;

class ListView extends \Magento\Review\Block\Product\View\ListView
{

    protected $_reviewFactory;


    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\Framework\Stdlib\StringUtils $string,
        \Magento\Catalog\Helper\Product $productHelper,
        \Magento\Catalog\Model\ProductTypes\ConfigInterface
        $productTypeConfig, \Magento\Framework\Locale\FormatInterface
        $localeFormat, \Magento\Customer\Model\Session $customerSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Magento\Review\Model\ResourceModel\Review\CollectionFactory $collectionFactory,
        \Magento\Review\Model\ReviewFactory $reviewFactory,
        array $data = [])
    {
        $this->_reviewFactory = $reviewFactory;
        parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency,
            $collectionFactory,
            $data);
    }


    /**
     * @param $product
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getRatingSummary($productSku)
    {


        $product = $this->productRepository->get($productSku);

        $this->_reviewFactory->create()->getEntitySummary($product, 1);

        $ratingSummary = $product->getRatingSummary()->getRatingSummary();

        return $ratingSummary;
    }


}
