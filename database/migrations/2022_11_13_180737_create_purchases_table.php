<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete("cascade");

            $table->foreignId('advisor_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
                
            $table->foreignId('booking_id')
                ->nullable()
                ->constrained('bookings')
                ->nullOnDelete();



            $table->string('order_id', 191)->nullable()->default('NULL'); //1122-1
            $table->text('transaction_id')->nullable();
            $table->string('payment_method', 191);
            $table->string('total_amount', 191);
            $table->string('currency', 191);
            $table->enum('status', ['pedding', 'waiting', 'completed', 'refunded','ok' ,'canceled'])->default('pedding');

            $table->softDeletes();
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
        Schema::dropIfExists('purchases');
    }
}
