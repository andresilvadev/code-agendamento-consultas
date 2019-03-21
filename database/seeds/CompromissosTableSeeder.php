<?php

use Illuminate\Database\Seeder;
use App\Compromisso;

class CompromissosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Compromisso::class,10)->create();
    }
}
