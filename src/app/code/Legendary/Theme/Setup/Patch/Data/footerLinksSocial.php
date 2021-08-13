<?php
/*
 *  @category  	Techflarestudio
 *  @author	Wasalu Duckworth
 *  @copyright Copyright (c) 2021 Techflarestudio, Ltd. 			(https://techflarestudio.com)
 *  @license http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0 (OSL-3.0)
 */

namespace Legendary\Theme\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use \Magento\Cms\Model\BlockFactory;


/**
 * Class UpdateBlockData
 * @package Techflarestudio\Content\Setup\Patch\Data
 */
class footerLinksSocial
    implements DataPatchInterface,
    PatchRevertableInterface
{
    const BLOCK_IDENTIFIER = 'footer-links-social';
    /**
     * @var BlockFactory
     */
    protected $blockFactory;

    /**
     * UpdateBlockData constructor.
     * @param BlockFactory $blockFactory
     */
    public function __construct(
        BlockFactory $blockFactory
    ) {
        $this->blockFactory = $blockFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $headerNoticeData = [
            'title' => 'Footer block Keep In Touch',
            'identifier' => self::BLOCK_IDENTIFIER,
            'content' => "<div class='footer-social footer--links'>
                                <h3 class='footer-links--tiitle'>keep in touch</h3>
                                <ul class='footer-links--list'>
                                    <li class='footer-links--item'>
                                        <a href='#' class='footer-links--link'>facebook</a>
                                    </li>
                                    <li class='footer-links--item'>
                                        <a href='#' class='footer-links--link'>twitter</a>
                                    </li>
                                    <li class='footer-links--item'>
                                        <a href='#' class='footer-links--link'>rss</a>
                                    </li>
                                </ul>

                            </div>",
            'stores' => [0],
            'is_active' => 1,
        ];
        $headerNoticeBlock = $this->blockFactory
            ->create()
            ->load($headerNoticeData['identifier'], 'identifier');

        /**
         * Create the block if it does not exists, otherwise update the content
         */
        if (!$headerNoticeBlock->getId()) {
            $headerNoticeBlock->setData($headerNoticeData)->save();
        } else {
            $headerNoticeBlock->setContent($headerNoticeData['content'])->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        /**
         * No dependencies for this
         */
        return [];
    }

    /**
     * Delete the block
     */
    public function revert()
    {
        $headerNoticeBlock = $this->blockFactory
            ->create()
            ->load(self::BLOCK_IDENTIFIER, 'identifier');

        if($headerNoticeBlock->getId()) {
            $headerNoticeBlock->delete();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        /**
         * Aliases are useful if we change the name of the patch until then we do not need any
         */
        return [];
    }
}
