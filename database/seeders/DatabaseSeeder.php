<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Evan',
            'username' => 'evanmy',
            'email' => 'evan@gmail.com',
            'password' => bcrypt('123')
        ]);

        \App\Models\User::factory(4)->create();

        \App\Models\Post::factory(10)->create();

        DB::table('categories')->insert([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        DB::table('categories')->insert([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        DB::table('categories')->insert([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // DB::table('users')->insert([
        //     'name' => 'Farhan',
        //     'email' => 'farhan@gmail.com',
        //     'password' => bcrypt('123')
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Andre',
        //     'email' => 'andre@gmail.com',
        //     'password' => bcrypt('123')
        // ]);

        // DB::table('posts')->insert([
        //     'title' => 'First Post',
        //     'slug' => 'first-post',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'excerpt' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit maiores neque est obcaecati magnam blanditiis necessitatibus, minima eos aut numquam.</p>',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit maiores neque est obcaecati magnam blanditiis necessitatibus, minima eos aut numquam.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt architecto odit in ab esse voluptas voluptatum recusandae unde! Tenetur saepe obcaecati eveniet dignissimos? Sint, optio reiciendis porro sapiente laudantium quaerat suscipit quo debitis est mollitia corrupti voluptatem assumenda fugit amet voluptates ullam deleniti repudiandae soluta animi officia temporibus. Minus, aspernatur. Consectetur nostrum adipisci ea dicta nisi ratione provident veritatis obcaecati, sunt molestiae sed eum necessitatibus, recusandae est quisquam deleniti mollitia!</p>'
        // ]);

        // DB::table('posts')->insert([
        //     'title' => 'Second Post',
        //     'slug' => 'second-post',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'excerpt' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit maiores neque est obcaecati magnam blanditiis necessitatibus, minima eos aut numquam.</p>',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit maiores neque est obcaecati magnam blanditiis necessitatibus, minima eos aut numquam.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt architecto odit in ab esse voluptas voluptatum recusandae unde! Tenetur saepe obcaecati eveniet dignissimos? Sint, optio reiciendis porro sapiente laudantium quaerat suscipit quo debitis est mollitia corrupti voluptatem assumenda fugit amet voluptates ullam deleniti repudiandae soluta animi officia temporibus. Minus, aspernatur. Consectetur nostrum adipisci ea dicta nisi ratione provident veritatis obcaecati, sunt molestiae sed eum necessitatibus, recusandae est quisquam deleniti mollitia!</p>'
        // ]);

        // DB::table('posts')->insert([
        //     'title' => 'Third Post',
        //     'slug' => 'third-post',
        //     'category_id' => 3,
        //     'user_id' => 1,
        //     'excerpt' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit maiores neque est obcaecati magnam blanditiis necessitatibus, minima eos aut numquam.</p>',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit maiores neque est obcaecati magnam blanditiis necessitatibus, minima eos aut numquam.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt architecto odit in ab esse voluptas voluptatum recusandae unde! Tenetur saepe obcaecati eveniet dignissimos? Sint, optio reiciendis porro sapiente laudantium quaerat suscipit quo debitis est mollitia corrupti voluptatem assumenda fugit amet voluptates ullam deleniti repudiandae soluta animi officia temporibus. Minus, aspernatur. Consectetur nostrum adipisci ea dicta nisi ratione provident veritatis obcaecati, sunt molestiae sed eum necessitatibus, recusandae est quisquam deleniti mollitia!</p>'
        // ]);
    }
}
