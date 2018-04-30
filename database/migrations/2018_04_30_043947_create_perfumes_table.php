<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfumes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->text('detail');
            $table->string('original_price');
            $table->string('promotion_price');
            $table->string('dore'); // Dung tích
            $table->string('concentration'); // Nồng độ
            $table->timestamp('date_created');
            $table->timestamp('date_expiration');
            $table->string('groupofincense'); // Nhóm hương
            $table->string('style');
            $table->string('bartender'); // Nhà pha chế
            $table->string('status'); // Trạng thái
            $table->integer('count'); // số lượng
            $table->string('typeofProduct');
            $table->string('gender');
            $table->string('country');
            $table->string('path_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfumes');
    }
}
