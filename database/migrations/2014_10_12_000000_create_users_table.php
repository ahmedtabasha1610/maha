<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->CascadeOnDelete();
            $table->foreignId('service_id')->constrained()->CascadeOnDelete();
            $table->foreignId('language_id')->constrained()->CascadeOnDelete();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('specialization')->nullable();
            $table->boolean('status')->default(0);
            $table->string('phone2')->nullable();
            $table->string('phone')->nullable();
            $table->longText('description')->nullable();
            $table->string('email')->unique();
            $table->string('avater')->nullable();
            $table->string('address')->nullable();
            $table->longText('files')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
