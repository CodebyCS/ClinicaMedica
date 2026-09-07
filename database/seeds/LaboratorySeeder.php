<?php

use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laboratories = [
            ['name' => 'Bayer', 'contact_email' => 'contato@bayer.com'],
            ['name' => 'Pfizer', 'contact_email' => 'contato@pfizer.com'],
            ['name' => 'Novartis', 'contact_email' => 'contato@novartis.com'],
            ['name' => 'Roche', 'contact_email' => 'contato@roche.com']
        ];
        foreach ($laboratories as $laboratory){
            \App\Laboratory::create($laboratory);
        }
    }
}
