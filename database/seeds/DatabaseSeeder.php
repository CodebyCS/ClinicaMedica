<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SpecialtySeeder::class,
            LaboratorySeeder::class,
            DoctorSeeder::class,      // cria 10 médicos
            PatientSeeder::class,     // cria 20 pacientes
            MedicationSeeder::class,
            AppointmentSeeder::class, // cria consultas por último
            ]);
    }
}
