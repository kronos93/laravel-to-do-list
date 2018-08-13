<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        Task::create([
            'user_id' => 1,
            'body' =>  $faker->text,
        ]);

        Task::create([
            'user_id' => 1,
            'body' =>  $faker->text,
        ]);
        for($i = 0; $i < 20; $i++ ) {
            Task::create([
                'user_id' => 1,
                'body' =>  $faker->text,
            ]);
        }
    }
}
