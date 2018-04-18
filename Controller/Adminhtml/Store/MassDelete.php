<?php

namespace Esgi\Storelocator\Controller\Adminhtml\Store;

use Esgi\Storelocator\Controller\Adminhtml\Store as Store;

class MassDelete extends \Magento\Backend\App\Action
{
   /**
    * @return void
    */
   public function execute()
    {
        $ids = $this->getRequest()->getParam('selected', []);
        //TODO : $ids = array vide

        if (!is_array($ids) || !count($ids)) {
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        foreach ($ids as $id) {
            if ($contact = $this->_objectManager->create(Store::class)->load($id)) {
                $contact->delete();
            }
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', count($ids)));

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}