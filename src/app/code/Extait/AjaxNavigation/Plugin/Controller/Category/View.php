<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_AjaxLayer
 * @copyright   Copyright (c) Mageplaza (http://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Extait\AjaxNavigation\Plugin\Controller\Category;

use Extait\AjaxNavigation\Helper\Data as LayerData;

/**
 * Class View
 * @package Extait\AjaxNavigation\Controller\Plugin\Category
 */
class View
{
    /**
     * @var LayerData
     */
    protected $_moduleHelper;

    /**
     * View constructor.
     *
     * @param LayerData $moduleHelper
     */
    public function __construct(
        LayerData $moduleHelper
    ) {
        $this->_moduleHelper = $moduleHelper;
    }

    /**
     * @param \Magento\Catalog\Controller\Category\View $action
     * @param $page
     *
     * @return mixed
     */
    public function afterExecute(\Magento\Catalog\Controller\Category\View $action, $page)
    {
        if ($action->getRequest()->isAjax()) {
            $navigation = $page->getLayout()->getBlock('catalog.leftnav');
            $products = $page->getLayout()->getBlock('category.products');
            $result = ['products' => $products->toHtml(), 'navigation' => $navigation->toHtml()];


            $quickView = $page->getLayout()->getBlock('mpquickview.quickview');
            $result['quickview'] = $quickView->toHtml();


            $action->getResponse()->representJson(LayerData::jsonEncode($result));
        } else {
            return $page;
        }
    }
}
