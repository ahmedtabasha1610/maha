<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddC11ToPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
        $table->enum('confirm',['no','yes'])->default('no');
        $table->string('image')->nullable();
        $table->longText('note')->nullable();
        $table->datetime('historypay')->nullable();
        
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
            $table->dropColumn('confirm');
            $table->dropColumn('image');
            $table->dropColumn('note');
            $table->dropColumn('historypay');
        });
    }
}
