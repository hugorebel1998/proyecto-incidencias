<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Mesa de ayuda'
        ]);

        Level::create([
            'name' => 'Ayuda telefónica'
        ]);

        Level::create([
            'name' => 'Técnico a solucionar problema'
        ]);
    }
}
