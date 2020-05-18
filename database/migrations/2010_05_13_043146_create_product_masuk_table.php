<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pendonor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaLengkap');
            $table->string('kontak');
            $table->string('alamat');
            $table->date('dob');
            $table->integer('qty');
            $table->string('kontak');
            $table->timestamps();
            $table->integer('categoryId')->unsigned();

            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pendonor');
}