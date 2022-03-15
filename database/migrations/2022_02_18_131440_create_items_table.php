<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();
            
            $table->foreignId('buyer_id')
                  ->nullable()
                  ->references('id')
                  ->on('users');

            $table->string('name');
            $table->text('description');
            $table->integer('starting_price');
            $table->integer('final_price')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('delivery_method');
            $table->string('status')->default('active'); // active, canceled, sold, expired
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
