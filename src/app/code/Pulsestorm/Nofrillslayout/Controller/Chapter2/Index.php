<?php
namespace Pulsestorm\Nofrillslayout\Controller\Chapter2;
use Pulsestorm\Nofrillslayout\Controller\Base;

class Index extends Base
{
    public function execute ()
    {
        $objectManager = $this->getObjectManager();
        $layout = $objectManager->get('Magento\Framework\View\Layout');


        $updateManager = $layout->getUpdate();
        // $updateManager->addUpdate('<container name ="top"></container>');

        // $blockOne = $layout->createBlock('Magento\Framework\View\Element\Template', 'pulsestorm_nofrills_chapter2_block1');
        // $blockOne->setTemplate('Pulsestorm_Nofrillslayout::chapter2/block1.phtml');
        // $structure = $layout->getStructure(); // note: not standard magento
        // $structure->setAsChild('pulsestorm_nofrills_chapter2_block1', 'top');

        // $updateManager->addUpdate(
        //     '<referenceContainer name="top">
        //         <block  class="Magento\Framework\View\Element\Template"
        // >                 name="pulsestorm_nofrills_chapter2_block1"
        //                 template="Pulsestorm_Nofrillslayout::chapter2/block1.phtml" />
        //      </referenceContainer>'
        // );

        $container_xml = $this->loadXmlFromSampleXmlFolder('chapter2/user/top-container.xml');
        $updateManager->addUpdate($container_xml);

        // $block_xml = $this->loadXmlFromSampleXmlFolder('chapter2/user/blocks.xml');

        $block_xml = $this->loadXmlFromSampleXmlFolder('chapter2/page.xml');
        $updateManager->addUpdate($block_xml);

        // START new code ( commenting out structure )
        // $layout -> generateElements ();
        // END new code
        echo $layout->getOutput();
    }
}
