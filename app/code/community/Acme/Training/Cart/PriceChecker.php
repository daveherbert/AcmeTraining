<?php

class Acme_Training_Cart_PriceChecker
{
    public function filterCheapest(
        Acme_Training_Model_Resource_Product_Collection $collection
    ) {
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
    }
}
