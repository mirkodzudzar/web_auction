<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->integer('price');
            $table->string('status')->default('active'); // active or canceled

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
        Schema::dropIfExists('item_user');
    }
}
