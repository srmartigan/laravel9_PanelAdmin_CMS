<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create([
            'name' => 'Categoria de prueba',
            'description' => 'Cur rumor ridetis? Sea-dogs scream from beauties like small pins. The carnivorous hur
                           q finally desires the particle.',
        ]);
    }
}
