<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;


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
        Post::factory(25)->create();
        User::create([
            'name' => 'Galang DWi',
            'username' => 'Galang DWi',
            'email' => 'galang@gmail.com', 
            'password' => bcrypt('12345') 
        ]);
        User::factory(4)->create();
        
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming' 
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal' 
        ]);

        Category::create([
            'name' => 'Nature',
            'slug' => 'nature' 
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            

        // User::create([
        //     'name' => 'GaBambang Pamungkas',
        //     'email' => 'bambang@gmail.com', 
        //     'password' => bcrypt('12345') 
        // ]);
        

        // Post::create([
        //     'title' => 'Judul Ke pertama',
        //     'slug' => 'Judul-pertama',
        //     'excerpt' => 'Lorem ke pertamaaaaaaaa',
        //     'body' => '<p>Lorem,  pertamaaaaaaaaaaaaaaaaaaaaaa</p><p> ipsum40 </p>', 
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke kedua',
        //     'slug' => 'Judul-kedua',
        //     'excerpt' => 'Lorem ke keduaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
        //     'body' => '<p>Lorem,  keduaaaaaaaaaaaaaaaaaaaaaaakbgawiefbjkabwiufb.abweofn alwnelfha;ownfjehgaiuwvefkhvauwyvef.,nadpoufdb awkfnephawpeif,nmadp;lifhewifg auwb,fbou </p><p> ipsum40 </p>', 
        //     'category_id' => 1,
        //     'user_id' => 2,
        // ]);
    }
}
