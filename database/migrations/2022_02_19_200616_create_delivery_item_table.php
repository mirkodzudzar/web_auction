<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_item', function (Blueprint $table) {
            $table->id();

            $table->foreignId('delivery_id')->constrained();
            $table->foreignId('item_id')->constrained();

            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('delivery_method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_item');

        if (Schema::hasTable('items')) {
            Schema::table('items', function (Blueprint $table) {
                $table->string('delivery_method')->after('final_price');
            });
        }
    }
}
