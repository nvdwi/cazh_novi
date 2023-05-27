<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('manager_id')->nullable();
            $table->string('type');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('status')->default('ACTIVE');
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('email_verified_at');
            $table->timestamp('deleted_at')->nullable();
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
};
