<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {   
        // VERİTABANINA KAYITLAR EKLEYELİM
        DB::table('users')->insert(array(
            array(
            'email' => 'test1@gmail.com',
            'password' => Hash::make('123'),
            'namesurname' => 'ozgen',
            'is_active' => '1'
            )
        ));
        
        // CONSOLE'A ÇIKTI VERELİM
        $this->command->info('users tablosuna ornek kayitlar eklendi');
    }

}