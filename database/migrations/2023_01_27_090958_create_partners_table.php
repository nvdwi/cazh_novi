<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->index();
            $table->string('images', 255)->nullable();
            $table->string('name', 255);
            $table->string('pic', 255);
            $table->string('pic_phone', 255);
            $table->string('address', 255);
            $table->string('longitude', 255)->nullable();
            $table->string('latitude', 255)->nullable();
            $table->bigInteger('created_by')->index();
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
        Schema::dropIfExists('partners');
    }
};
