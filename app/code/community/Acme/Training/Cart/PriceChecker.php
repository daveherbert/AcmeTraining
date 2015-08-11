<?php

class Acme_Training_Cart_PriceChecker
{

    /**
     * @var Mage_Core_Model_Logger
     */
    private $logger;

    public function __construct(Mage_Core_Model_Logger $logger)
    {
        $this->logger = $logger;
    }

    public function filterCheapest(
        Acme_Training_Model_Resource_Product_Collection $collection
    ) {

        $this->logger->log('filterCheapest Begin');

        foreach ($collection as $item) {
            $cheapest = $item;
            if ($item->getPrice() < $cheapest->getPrice()) {
                $cheapest = $item;
            }
        }
        foreach ($collection as $item) {
            if ($item->getId() !== $cheapest->getId()) {
                $collection->removeItemByKey($item->getId());
            }
        }

        $this->logger->log('filterCheapest End');

    }
}
