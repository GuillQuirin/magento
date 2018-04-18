<?php

namespace Esgi\Storelocator\Controller\Adminhtml\Store;

use Magento\Backend\App\Action;	
use Esgi\Storelocator\Model\Store as Store;

class Edit extends \Magento\Backend\App\Action
{
   /**
     * @return void
     */
   public function execute()
   {
        $this->_view->loadLayout();
        $this->_view->renderLayout();	
   }
}