<?php namespace Zelie\Paniers\Classes\Item;

use Cms\Classes\Page as CmsPage;

use Lovata\Shopaholic\Classes\Item\ProductItem;

use Lovata\Toolbox\Classes\Item\ElementItem;
use Lovata\Toolbox\Classes\Helper\PageHelper;

use Lovata\Shopaholic\Models\Settings;
use Lovata\Shopaholic\Models\Product;
use Lovata\Shopaholic\Classes\Collection\CategoryCollection;
use Lovata\Shopaholic\Classes\Collection\OfferCollection;

class ExtendProductItem
{
    public function subscribe()
    {
        ProductItem::extend(function ($obProductItem) {
            /** @var ProductItem $obProductItem */    
            $obProductItem->arRelationList = [
                'offer'               => [
                    'class' => OfferCollection::class,
                    'field' => 'offer_id_list',
                ],
                'category'            => [
                    'class' => CategoryItem::class,
                    'field' => 'category_id',
                ],
                'additional_category' => [
                    'class' => CategoryCollection::class,
                    'field' => 'additional_category_id',
                ],
                'brand'               => [
                    'class' => BrandItem::class,
                    'field' => 'brand_id',
                ],
                'panier'               => [
                    'class' => ProductItem::class,
                    'field' => 'id',
                ]
            ];
                        
            $obProductItem->arExtendResult[] = 'panier';

            $obProductItem->addDynamicMethod('panier', function() use ($obProductItem) {
                /** @var Product $obProduct */
                $obProduct = $obProductItem->getObject();
                $obProductItem->setAttribute('panier', $obProduct->panier);
            });

            
        });
        $obProductItem = ProductItem::make(1);
        $obProductItem->panier;
    }
}