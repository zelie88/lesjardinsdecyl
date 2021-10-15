<?php namespace Zelie\Paniers;

use Event;
use System\Classes\PluginBase;
use Zelie\Paniers\Classes\Event\Product\ExtendProductFieldsHandler;
use Zelie\Paniers\Classes\Event\Product\ExtendProductModel;

class Plugin extends PluginBase
{
    public function boot()
    {
        Event::subscribe(ExtendProductFieldsHandler::class);
        Event::subscribe(ExtendProductModel::class);
    }  

    public function registerComponents()
    {
        return [
            'Zelie\Paniers\Components\Paniers' => 'produits'
        ];
    }

    public function registerSettings()
    {
    }
}