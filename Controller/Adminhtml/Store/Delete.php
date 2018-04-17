<?php
namespace Esgi\Storelocator\Controller\Adminhtml\Store;
use Esgi\Storelocator\Model\Store as Store;
use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('storelocator_store_id');
 
        if (!($store = $this->_objectManager->create(Store::class)->load($id))) {
            $this->messageManager->addError(__('Unable to proceed. Please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }
        try{
            $store->delete();
            $this->messageManager->addSuccess(__('Your store has been deleted !'));
        } catch (Exception $e) {
            $this->messageManager->addError(__('Error while trying to delete the store: '));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}