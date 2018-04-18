<?php
namespace Esgi\Storelocator\Block;

use Esgi\Storelocator\Model\Store as Store;
use Magento\Framework\View\Element\Template as Template;
use Magento\Framework\View\Element\Template\Context as Context;

class Storeslist extends Template
{
    public function __construct(Context $context, Store $model)
    {
        parent::__construct($context);
        $this->model = $model;
        $this->setData('storelocator',array());
    }

    public function getHelloCollection()
    {
        $helloCollection = $this->model->getCollection();
        return $helloCollection;
    }

    public function sayHello()
	{
		return __('Hello World');
	}

    public function addStorelocator($count)
    {
        $_contacts = $this->getData('storelocator');
        $actualNumber = count($_contacts);
        $names = array();
        for($i=$actualNumber;$i<($actualNumber+$count);$i++) {
            $_contacts[] = 'nom '.($i+1);
        }
        $this->setData('storelocator',$_contacts);
    }
}