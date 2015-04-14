<?php

class IletisimTableSeeder extends Seeder {

    public function run()
    {   
        // VERİTABANINA KAYITLAR EKLEYELİM
        DB::table('iletisim')->insert(array(
            array(
            'email' => 'adem@gmail.com',
                'tel'=>'05395060184',
                'adres'=>'körfez mah'
            )
        ));
        
        // CONSOLE'A ÇIKTI VERELİM
        $this->command->info('iletisim tablosuna ornek kayitlar eklendi');
    }

}