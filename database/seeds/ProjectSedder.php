<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Proyecto A',
            'description' => 'El proyecto A consiste en desarrollar un Sitio Web moderno'
        ]);

        Project::create([
            'name' => 'Proyecto B',
            'description' => 'El proyecto B consiste en desarrollar una Aplicación Android'
        ]);
    }
}
