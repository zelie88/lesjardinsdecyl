<?php namespace Zelie\Paniers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZeliePaniersProduits extends Migration
{
    public function up()
    {
        Schema::table('zelie_paniers_produits', function($table)
        {
            $table->integer('product_id')->nullable(false)->unsigned()->change();
            $table->integer('panier_id')->nullable(false)->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('zelie_paniers_produits', function($table)
        {
            $table->integer('product_id')->nullable()->unsigned(false)->change();
            $table->integer('panier_id')->nullable()->unsigned(false)->change();
        });
    }
}
