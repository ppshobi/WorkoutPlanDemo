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

        Exercise::truncate();

        Exercise::insert([
            ['id' => 1, 'name' => 'Crunch', 'duration' => 150],
            ['id' => 2, 'name' => 'Air squat', 'duration' => 150],
            ['id' => 3, 'name' => 'Windmill', 'duration' => 150],
            ['id' => 4, 'name' => 'Push-up', 'duration' => 150],
            ['id' => 5, 'name' => 'Rowing Machine', 'duration' => 150],
            ['id' => 6, 'name' => 'Walking', 'duration' => 150],
            ['id' => 7, 'name' => 'Running', 'duration' => 150],
        ]);
    }
}
