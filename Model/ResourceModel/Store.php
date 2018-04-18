<?php

namespace Esgi\Storelocator\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Store extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        //(Nom de la table, Clé primaire de la table)
        $this->_init('esgi_storelocator', 'storelocator_store_id');
    }
}
