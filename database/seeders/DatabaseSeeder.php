<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Domain\Blog\Models\Category;
use Domain\Blog\Models\Post;
use Domain\Blog\Models\Tag;
use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    

    public function run(): void
    {
     User::factory()->create([
        'name'=>'Test User',
        'email'=>'test@example.com',
     ]);

     //Generamos usuarios aleatorios
     User::factory()->count(10)->create();
     //generamos categorias
     Category ::factory()->count(5)->create();
     //generamos etiquetas
     Tag::factory()->count(20)->create();
     //generamos post 200 posts
     $posts = Post::factory()->count(200)->create();
     $posts->each(function($post){
         $post->tags()->saveMany(Tag::all()->random(3));
     });


    }
}
