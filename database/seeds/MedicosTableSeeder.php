<?php

use Illuminate\Database\Seeder;
use App\Medico;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Medico::class,20)->create();
    }
}
