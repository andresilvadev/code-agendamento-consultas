<?php

use Illuminate\Database\Seeder;
use App\Especialidade;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Especialidade::class,20)->create();
    }
}
