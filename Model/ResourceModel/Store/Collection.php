<?php

namespace Esgi\Storelocator\Model\ResourceModel\Store;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Esgi\Storelocator\Model\Store', 'Esgi\Storelocator\Model\ResourceModel\Store');
    }
}