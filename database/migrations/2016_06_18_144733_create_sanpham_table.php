<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('ma_san_pham', 10)->unique();
            $table->string('ten_san_pham')->nullable();
            $table->bigInteger('gia_tien')->default(0);
            $table->string('don_vi_tinh', 10)->nullable();
            $table->integer('so_luong_ton')->default(0);
            $table->string('ma_loai', 10);
            $table->timestamps();

            /**
             * Foreign key
             */
            //$table->foreign('ma_loai')->references('ma_loai')->on('loaisanpham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sanpham');
    }

}