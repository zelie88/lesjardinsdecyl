<?php namespace Zelie\Paniers\Components;

use Cms\Classes\ComponentBase;
use Lovata\Shopaholic\Models\Product;
use Db;

class Paniers extends ComponentBase
{
    public function componentDetails() {
        return [
            'name' => 'Liste des produits',
            'description' => 'Liste des produits'
        ];
    }

    public function defineProperties() {
        return [
            'panierId' => [
                'title'             => 'Id panier',
                'description'       => 'Id du produit correspondant'
            ]
        ];
    }

    public function onRun () {
        $this->produits = $this->loadProduits();
    }
    
    public function loadProduits() {
        $produits = Db::table('lovata_shopaholic_products')
            ->join('zelie_paniers_produits', 'id', '=', 'product_id')
            ->where('panier_id', '=', $this->property('panierId'))
            ->orderBy('name')
            ->get();
        return $produits;
    }

    public $produits;
}