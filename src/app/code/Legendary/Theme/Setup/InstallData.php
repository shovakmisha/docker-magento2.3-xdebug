<?php

namespace Legendary\Theme\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    private $_blockFactory;

    /**
     * InstallData constructor
     *
     * @param \Magento\Cms\Model\BlockFactory $blockFactory
     */
    public function __construct(
        \Magento\Cms\Model\BlockFactory $blockFactory
    )
    {
        $this->_blockFactory = $blockFactory;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Exception
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // Load cms block by identifier
        $cmsBlock = $this->_blockFactory->create()->load('call-us', 'identifier');

        // Create CMS Block
        if (!$cmsBlock->getId()) {
            $cmsBlockData = [
                'title' => 'Call us',
                'identifier' => 'call-us',
                'content' => "<div class='call-us'>
                                <span class='call-us__title'>call us</span>
                                <span class='call-us__symbol'>:</span>
                                <span class='call-us__number'>1800 123 45 67 58</span>
                            </div>",
                'is_active' => 1,
                'stores' => [0]
            ];

            $this->_blockFactory->create()->setData($cmsBlockData)->save();
        }
    }
}
