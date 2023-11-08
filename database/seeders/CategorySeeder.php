<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electrónica'
        ]);
            Category::create([
                'name' => 'Fotografía & Video',
                'parent_id' => '1'
            ]);
            Category::create([
                'name' => 'Computación',
                'parent_id' => '1'
            ]);
                Category::create([
                    'name' => 'PCs de Escritorio',
                    'parent_id' => '3'
                ]);
                Category::create([
                    'name' => 'Laptops',
                    'parent_id' => '3'
                ]);
                Category::create([
                    'name' => 'Combos de componentes',
                    'parent_id' => '3'
                ]);
                Category::create([
                    'name' => 'Componentes',
                    'parent_id' => '3'
                ]);
                    Category::create([
                        'name' => 'Procesadores',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Memoria RAM',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Placas Madre',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Almacenamiento',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Gabinetes',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Fuentes',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Coolers de CPU',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Ventiladores',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Placas de Video',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Placas de Red',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Placas RAID',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Placas de Sonido',
                        'parent_id' => '7'
                    ]);
                    Category::create([
                        'name' => 'Otras placas de expansión',
                        'parent_id' => '7'
                    ]);
            Category::create([
                'name' => 'Telefonia Móvil',
                'parent_id' => '1'
            ]);
            Category::create([
                'name' => 'Consolas de videojuego',
                'parent_id' => '1'
            ]);
            Category::create([
                'name' => 'Pantallas',
                'parent_id' => '1'
            ]);
            Category::create([
                'name' => 'Audio',
                'parent_id' => '1'
            ]);
    }
}
