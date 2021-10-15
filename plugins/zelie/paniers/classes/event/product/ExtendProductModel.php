<?php namespace Zelie\Paniers\Classes\Event\Product;

use Lovata\Shopaholic\Models\Product;
use Lovata\Shopaholic\Models\Offer;
use Lovata\Shopaholic\Models\Category;
use Lovata\Shopaholic\Classes\Item\ProductItem;

/**
 * Class ExtendProductModel
 * @package Lovata\BaseCode\Classes\Event\Product
 */
class ExtendProductModel
{
    public function subscribe()
    {
        Product::extend(function ($obProduct) {
            /** @var Product $obProduct */
            
            $obProduct->hasMany = [
                'offer' => [
                    Offer::class,
                ],
                'produits' => [
                    Product::class,
                    'table' => 'zelie_paniers_produits',
                    'key' => 'product_id',
                    'otherKey' => 'panier_id',
                ],
            ];
            
            $obProduct->belongsToMany = [ 
                'additional_category' => [
                    Category::class,
                    'table' => 'lovata_shopaholic_additional_categories',
                ],
                /* 'produits' => [
                    Product::class,
                    'table' => 'zelie_paniers_produits',
                    'key' => 'product_id',
                    'otherKey' => 'panier_id',
                ], */
                'panier'   => [
                    Product::class,
                    'table' => 'zelie_paniers_produits',
                    'key' => 'panier_id',
                    'otherKey' => 'product_id',
                    'conditions' => 'category_id = 1',
                    'order' => 'name',
                ],
            ];

            $obProduct->fillable = ['id'];
            $obProduct->addCachedField(['produits']);

        });
    }
}