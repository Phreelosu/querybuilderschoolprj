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
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->decimal('amount', 10, 0);
            $table->foreignId('type_id');
            $table->foreignId('color_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car', function (Blueprint $table) {
            $table->dropForeign('car_type_id_foreign');
            $table->dropForeign('car_color_id_foreign');
        });

        Schema::dropIfExists('car');
    }
};