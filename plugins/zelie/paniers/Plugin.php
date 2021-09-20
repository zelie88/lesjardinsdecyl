<?php namespace Zelie\Paniers;

use Event;
use System\Classes\PluginBase;
use Zelie\Paniers\Classes\Event\Product\ExtendProductFieldsHandler;
use Zelie\Paniers\Classes\Event\Product\ExtendProductModel;
use Zelie\Paniers\Classes\Item\ExtendProductItem;
use Zelie\Paniers\Classes\Event\Product\ExtendProductCollection;


class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        Event::subscribe(ExtendProductFieldsHandler::class);
        Event::subscribe(ExtendProductModel::class);
        // Event::subscribe(ExtendProductItem::class);
        Event::subscribe(ExtendProductCollection::class);

    }  
}