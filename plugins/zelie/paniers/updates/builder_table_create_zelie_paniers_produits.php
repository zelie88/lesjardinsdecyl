<?php namespace Zelie\Paniers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZeliePaniersProduits extends Migration
{
    public function up()
    {
        Schema::create('zelie_paniers_produits', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('product_id');
            $table->integer('panier_id');
            $table->primary(['product_id','panier_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zelie_paniers_produits');
    }
}
