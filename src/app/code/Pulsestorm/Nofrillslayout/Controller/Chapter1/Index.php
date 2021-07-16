<?php
namespace Pulsestorm\Nofrillslayout\Controller\Chapter1;
use Pulsestorm\Nofrillslayout\Controller\Base;

class Index extends Base
{
    public function execute()
    {
        $objectManager = $this->getObjectManager();
        $layout = $objectManager->get('Magento\Framework\View\Layout');
        $blockParent = $layout->createBlock('Magento\Framework\View\Element\Template', 'pulsestorm_nofrills_parent');
        $blockParent->setTemplate('Pulsestorm_Nofrillslayout::chapter1/user/parent.phtml');

        $blockChild1 = $layout->createBlock('Magento\Framework\View\Element\Template', 'pulsestorm_nofrills_child1');
        $blockChild1->setTemplate('Pulsestorm_Nofrillslayout::chapter1/user/child1.phtml');

        $blockParent->append($blockChild1);

        $layout->addContainer('top', 'The top level container');

        $structure = $layout->getStructure(); // note: not standard magento
        $structure->setAsChild('pulsestorm_nofrills_parent', 'top');

        $layout->generateElements();
        echo $layout->getOutput();
    }
}
