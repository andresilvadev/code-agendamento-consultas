<?php

use Illuminate\Database\Seeder;
use App\Paciente;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Paciente::class,20)->create();
    }
}
