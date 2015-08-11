<?php

class Acme_Training_Model_Observer
{
    use Inviqa_SymfonyContainer_Helper_ServiceProvider;

    public function onCatalogLoadBefore(Varien_Event_Observer $event)
    {
        $catalog = $event->getCollection();

        $this->getService('acme.price_checker')->filterCheapest($catalog);
    }
}
