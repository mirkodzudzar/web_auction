<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_payment', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_id')->constrained();
            $table->foreignId('payment_id')->constrained();

            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_payment');

        if (Schema::hasTable('items')) {
            Schema::table('items', function (Blueprint $table) {
                $table->string('payment_method')->nullable()->after('final_price');
            });
        }
    }
}
