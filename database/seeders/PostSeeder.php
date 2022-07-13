<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->create([
            'title' => 'Post de prueba',
            'content' => 'Cur rumor ridetis? Sea-dogs scream from beauties like small pins. The carnivorous hur
                          q finally desires the particle.',
            'user_id' => 1
        ]);
    }
}
