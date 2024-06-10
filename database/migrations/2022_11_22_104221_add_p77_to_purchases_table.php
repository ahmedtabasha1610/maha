<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddP77ToPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->float('disacount')->nullable();
            $table->float('residual')->nullable();
            $table->integer('day')->default(30);
            $table->timestamp('register_status_day')->nullable();
            $table->timestamp('delivery_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('disacount');
            $table->dropColumn('residual');
            $table->dropColumn('day');
            $table->dropColumn('register_status_day');
            $table->dropColumn('delivery_time');
        });
    }
}
