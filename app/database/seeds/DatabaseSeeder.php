<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
                $this->call('IletisimTableSeeder');
                $this->command->info('iletisim table : OK');
	}

}
