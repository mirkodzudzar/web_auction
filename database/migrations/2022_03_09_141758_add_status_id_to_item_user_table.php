<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusIdToItemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_user', function (Blueprint $table) {
            $table->dropColumn('status');

            $table->foreignId('status_id')->constrained()->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_user', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');

            $table->string('status')->default('active'); // active, canceled
        });
    }
}
