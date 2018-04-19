<?php
namespace Esgi\Storelocator\Controller\Adminhtml\Store;
use Magento\Backend\App\Action;
use Esgi\Storelocator\Model\Store as Store;

class NewAction extends \Magento\Backend\App\Action
{
    /**
     * Edit A Store Page
     *
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $storeDatas = $this->getRequest()->getParam('store');
        if(is_array($storeDatas)) {
            $store = $this->_objectManager->create(Store::class);
            $store->setData($storeDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}