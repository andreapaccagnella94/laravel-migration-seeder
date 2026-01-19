<?php

namespace Database\Seeders;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importare i Faker
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // questo codice verrà eseguito ogni volta che lanciamo questo seeder

        // importiamo la classe Modello che mi permette di prendere i dati dal db riga per riga

        // creo una nuova istanza iterando tanto volte voglio tramite il ciclo for

        $faker->timezone = 'Europe/Rome';
        $start = Carbon::parse(today());
        dd($start);
        for ($i = 0; $i < 10; $i++) {

            $newTrain = new Train();

            // variabile per la data di partenza successiva ad oggi

            // faker ritorna un DateTime nativo: convertiamo in Carbon
            $departure = Carbon::instance($faker->dateTimeBetween($start, '+2 months'))->setTimezone('Europe/Rome');
            // durata media viaggio 1-5 ore: cloniamo la data di partenza prima di modificare
            $arrival = (clone $departure)->addHours($faker->numberBetween(1, 5));


            $newTrain->company = $faker->company();
            $newTrain->departure_station = $faker->streetName();
            $newTrain->arrival_station = $faker->city();
            $newTrain->departure_time = $departure;
            $newTrain->arrival_time = $arrival;
            $newTrain->id_train = 'T' . $faker->unique()->bothify('####');
            $newTrain->carriages = $faker->numberBetween(2, 10);
            $newTrain->on_time = $faker->boolean(80);
            $newTrain->is_cancelled = $faker->boolean(15);


            $newTrain->save();
        }
    }
}
