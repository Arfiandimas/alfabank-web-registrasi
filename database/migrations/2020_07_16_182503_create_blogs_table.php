<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('konten');
            // awalnya kek gini
            // $table->unsignedBigInteger('id_user');
            // tak rubah jadi kek gini
            // kenapa error  $table->integer('id_user');
            // karena tipe data dara id_user didefinisikan sebagai integer
            // padahal primary key dari tabel users
            // adalah unsigned big integer
            // makanya harus menggunakan ini 
            $table->unsignedBigInteger('id_user');


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
        Schema::dropIfExists('blogs');
    }
}
