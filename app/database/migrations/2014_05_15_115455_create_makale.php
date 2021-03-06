<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakale extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('makaleler', function(Blueprint $table) {
            $table->increments('id');
            $table->string('makalebaslik');
            $table->text('makaleicerik');
            $table->integer('kategori');
            $table->string('slug');
            $table->string('resim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
       Schema::drop('makaleler');
    }

}
