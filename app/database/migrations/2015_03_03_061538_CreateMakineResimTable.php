<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakineResimTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('makresim', function(Blueprint $table)
		{
	    $table->increments('id');
            $table->string('resimisim');
            $table->text('resimbilgi');
            $table->integer('makina');
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
		Schema::drop('makresim');
		
	}

}
