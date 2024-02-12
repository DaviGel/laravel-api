<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 30; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(5);
            $newProject->description = $faker->text();
            $newProject->slug = $faker->slug();
            $newProject->save();
        }
    }
}
