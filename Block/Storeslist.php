<?php
namespace Esgi\Storelocator\Block;
use Magento\Framework\View\Element\Template;

class Storeslist extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = array())
    {
        parent::__construct($context, $data);
        $this->setData('storelocator',array());
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