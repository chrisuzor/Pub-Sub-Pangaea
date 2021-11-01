<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use App\Models\Topic;
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
        // \App\Models\User::factory(10)->create();
        Topic::factory(10)->create();
        Subscriber::factory(10)->create();
    }
}
