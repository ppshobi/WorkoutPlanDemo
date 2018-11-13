<?php

use Illuminate\Database\Seeder;
use App\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exercise::insert([
            ['id' => 1, 'name' => 'Crunch'],
            ['id' => 2, 'name' => 'Air squat'],
            ['id' => 3, 'name' => 'Windmill'],
            ['id' => 4, 'name' => 'Push-up'],
            ['id' => 5, 'name' => 'Rowing Machine'],
            ['id' => 6, 'name' => 'Walking'],
            ['id' => 7, 'name' => 'Running'],
        ]);
    }
}
