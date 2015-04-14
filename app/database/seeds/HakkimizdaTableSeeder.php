<?php

class HakkimizdaTableSeeder extends Seeder {

    public function run()
    {   
        // VERİTABANINA KAYITLAR EKLEYELİM
        DB::table('Hakkimizda')->insert(array(
            array(
            'hakkimizda' => 'Üst menüden bizimle ilgili bilgi alabilir, iletişime geçebilirsiniz.'
            )
        ));
        
        // CONSOLE'A ÇIKTI VERELİM
        $this->command->info('hakkimizda tablosuna ornek kayitlar eklendi');
    }

}