<?php

use Acme\Product;
use Acme\ShoppingCart;

class Acme_Training_Model_Cart extends Mage_Checkout_Model_Cart implements ShoppingCart
{

    public function add(Product $product)
    {
        parent::addProduct($product->getId());
    }

    public function getFirstItem()
    {
        return $this->getItems()->getFirstItem();
    }
}
