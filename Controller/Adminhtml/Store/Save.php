<?php
namespace Esgi\Storelocator\Controller\Adminhtml\Store;

use Magento\Backend\App\Action\Context;
use Esgi\Storelocator\Model\Store as Store;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Inspection\Exception;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Registry $coreRegistry,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Save action
     *
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $storeDatas = $data['store'];
            if(is_array($storeDatas)) {
                $store = $this->_objectManager->create(Store::class);
                $store->setData($storeDatas)->save();
                $this->messageManager->addSuccess(__('You saved the store.'));
                return $resultRedirect->setPath('*/*/index');
            }
        }

        $this->messageManager->addError(__('This store cannot be saved.'));
        return $resultRedirect->setPath('*/*/');
    }
}
