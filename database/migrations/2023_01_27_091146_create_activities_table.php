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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('partner_id')->index();
            $table->bigInteger('status_id')->index();
            $table->string('notes', 255)->nullable();
            $table->decimal('nominal', 20, 2)->nullable()->default(0);
            $table->string('images')->nullable();
            $table->dateTime('activity_date');
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
        Schema::dropIfExists('activities');
    }
};
