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
        $this->call(UsersTableSeeder::class);
        $this->call(EspecialidadesTableSeeder::class);
        $this->call(MedicosTableSeeder::class);      
        $this->call(PacientesTableSeeder::class);
        $this->call(CompromissosTableSeeder::class);
        //$this->call(ConsultasTableSeeder::class);
    }
}
