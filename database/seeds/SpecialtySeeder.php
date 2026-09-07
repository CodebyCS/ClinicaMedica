<?php

use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            ['name' => 'Cardiologia'],
            ['name' => 'Pediatria'],
            ['name' => 'Clínica Geral'],
            ['name' => 'Neurologia'],
            ['name' => 'Ortopedia']
        ];

        foreach ($specialties as $specialty){
            \App\Specialty::create($specialty);
        }
    }
}
