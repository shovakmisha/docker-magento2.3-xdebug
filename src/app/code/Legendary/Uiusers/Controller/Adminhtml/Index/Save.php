<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Rohan Hapani
 */
namespace Legendary\Uiusers\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Legendary\Uiusers\Model\Users;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    public $imageUploader;

    protected $dataPersistor;

    /**
     * @var Users
     */
    protected $uiExamplemodel;

    /**
     * @var Session
     */
    protected $adminsession;

    /**
     * @param Action\Context $context
     * @param Users           $uiExamplemodel
     * @param Session        $adminsession
     */
    public function __construct(
        \Legendary\Uiusers\Model\ImageUploader $imageUploader,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        Action\Context $context,
        Users $uiExamplemodel,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->uiExamplemodel = $uiExamplemodel;
        $this->adminsession = $adminsession;
        $this->dataPersistor = $dataPersistor;
        $this->imageUploader = $imageUploader;
    }

    /**
     * Save blog record action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $blog_id = $this->getRequest()->getParam('user_id');
            if ($blog_id) {
                $this->uiExamplemodel->load($blog_id);
            }

            if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['name'];
                $this->imageUploader->moveFileFromTmp($data['image']);
            } elseif (isset($data['image'][0]['name']) && !isset($data['icon'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['name'];
            } else {
                $data['image'] = '';
            }

            $this->uiExamplemodel->setData($data);

            try {
                $this->uiExamplemodel->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->adminsession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath('*/*/edit', ['user_id' => $this->uiExamplemodel->getUserId(), '_current' => true]);
                    }
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['user_id' => $this->getRequest()->getParam('user_id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }

}
