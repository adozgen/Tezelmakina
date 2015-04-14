<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakinadetayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::create('makinadetay', function(Blueprint $table) {
            $table->increments('id');
            $table->string('makinaisim');
            $table->text('makinaozellik');
            $table->string('makfiyat');
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
	public function down()
	{
		Schema::drop('makinadetay');
	}

}
