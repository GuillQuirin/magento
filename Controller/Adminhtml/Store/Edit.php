<?php

namespace Esgi\Storelocator\Controller\Adminhtml\Store;

use Esgi\Storelocator\Controller\Adminhtml\Store;

class Edit extends Store
{
   /**
     * @return void
     */
   public function execute()
   {
        $newsId = $this->getRequest()->getParam('id');
        $model = $this->_newsFactory->create();

        if ($newsId) {
            $model->load($newsId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('storelocator_store', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Esgi_Storelocator::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Simple News'));

        return $resultPage;
   }
}