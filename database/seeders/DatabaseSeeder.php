<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\User;
use App\Models\Reply;
use App\Models\Tweet;
use App\Models\Favorite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Tweet::factory(50)->create();
        Like::factory(100)->create();
        Reply::factory(80)->create();
        Favorite::factory(100)->create();
    }
}
