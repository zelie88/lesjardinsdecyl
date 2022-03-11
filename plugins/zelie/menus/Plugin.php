<?php namespace Zelie\Menus;

use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        Event::listen('backend.menu.extendItems', function($manager) {

            $manager->addMainMenuItems('Raviraj.Rjgallery', [
                'gallery' => [
                    'label' => 'Phototèque',
                    'icon' => 'icon-camera-retro'
                ]
            ]);

            $manager->addMainMenuItems('Rainlab.User', [
                'user' => [
                    'label' => 'Abonnés',
                    'icon' => 'icon-users',
                    'iconSvg' => ''

                ]
            ]);

            $manager->addMainMenuItems('Martin.Forms', [
                'forms' => [
                    'label' => 'Messages',
                    'icon' => 'icon-envelope-o',
                    'iconSvg' => ''
                ]
            ]);

            $manager->addMainMenuItems('Lovata.Ordersshopaholic', [
                'orders-shopaholic-menu' => [
                    'label' => 'Commandes'
                ]
            ]);

            $manager->addMainMenuItems('Lovata.Shopaholic', [
                'shopaholic-menu-main' => [
                    'label' => 'Catalogue',
                    'icon' => 'icon-book'
                ]
            ]);

        
        });
    }
}
