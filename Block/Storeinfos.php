<?php
namespace Esgi\Storelocator\Block;

use Esgi\Storelocator\Model\Store as Store;
use Magento\Framework\View\Element\Template as Template;
use Magento\Framework\View\Element\Template\Context as Context;

class Storeinfos extends Template
{   
    protected $response;

    public function __construct(Context $context, Store $model)
    {
        parent::__construct($context);
        $this->model = $model;
        $this->setData('storelocator',array());
    }

    public function getDatasById($id)
    {
        $helloCollection = $this->model->getCollection()->addFieldToFilter('storelocator_store_id', ['like' => intval($id)]);
        return ($helloCollection->getSize()) ? $helloCollection->getFirstItem() : NULL;
    }
}