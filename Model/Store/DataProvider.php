<?php
namespace Esgi\Storelocator\Model\Store;
use Esgi\Storelocator\Model\ResourceModel\Store\CollectionFactory;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $storeCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $storeCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $storeCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Customer $customer */
        foreach ($items as $contact) {
            // notre fieldset s'apelle "store" d'ou ce tableau pour que magento puisse retrouver ses datas :
            $this->loadedData[$store->getId()]['store'] = $store->getData();
        }


        return $this->loadedData;

    }
}