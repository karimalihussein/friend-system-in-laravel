<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::factory(100)->create()->each(function ($user) use($faker) {
            $user->statuses()->create([
                'body' => $faker->sentence,
            ]);
            $user->statuses()->create([
                'body' => $faker->sentence,
            ]);
            $user->statuses()->create([
                'body' => $faker->sentence,
            ]);
            $user->statuses()->create([
                'body' => $faker->sentence,
            ]);
        });
    }
}
