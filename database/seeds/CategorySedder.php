<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Categoria A1',
            'description' => '',
            'id_project' => '1'
        ]);

        Category::create([
            'name' => 'Categoria A2',
            'description' => '',
            'id_project' => '1'
        ]);

        Category::create([
            'name' => 'Categoria B1',
            'description' => '',
            'id_project' => '2'
        ]);

        Category::create([
            'name' => 'Categoria B2',
            'description' => '',
            'id_project' => '2'
        ]);
    }
}
