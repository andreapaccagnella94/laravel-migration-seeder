<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // codice per eseguire il nostro seeder -> devo richiamare il modello/classe del mio seeder
        $this->call(TrainsTableSeeder::class);
    }
}
