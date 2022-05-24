<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage; //Class "illuminate\Support\Facades\Storage" not found

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Storage::deleteDirectory('posts');  //Class "illuminate\Support\Facades\Storage" not found
       Storage::makeDirectory('public/posts');  //Class "illuminate\Support\Facades\Storage" not found

       $this->call(roleSeeder::class);

        $this->call(Userseeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(Postseeder::class);
    }
}

