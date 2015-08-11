<?php

use Acme\Product;
use Acme\ProductCatalog;

class Acme_Training_Model_Resource_Product_Collection extends Mage_Catalog_Model_Resource_Product_Collection implements ProductCatalog
{

    public function findFirstItemCostingLessThan(Product $product)
    {
        $catalog = $this
            ->addFieldToFilter(
                'price', ['lt' => $product->getPrice()])
            ->addFieldToFilter(
                'sku', ['neq' => $product->getSku()]
            );

        return $catalog->getFirstItem();
    }
}
