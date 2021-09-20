<?php namespace Zelie\Paniers\Classes\Event\Product;

use Lovata\Shopaholic\Models\Product;
use Lovata\Shopaholic\Classes\Collection\ProductCollection;

/**
 * Class ExtendProductCollection
 * @package Lovata\BaseCode\Classes\Event\Product
 */
class ExtendProductCollection
{
    public function subscribe()
    {
        ProductCollection::extend(function ($obProductList) {
            $this->addCustomMethod($obProductList);
        });
    }

    /**
     * Add myCustomMethod method
     * @param ProductCollection $obProductList
     */
    protected function addCustomMethod($obProductList)
    {
        $obProductList->addDynamicMethod('panier', function () use ($obProductList) {
            
            $arResultIDList = (array) Product::where('panier', true)->lists('id');

            return $obProductList->intersect($arResultIDList);
        });

    }
}