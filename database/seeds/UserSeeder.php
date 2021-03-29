<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => '0'
        ]);

        $admin->assignRole('admin');
        
        $soporte = User::create([
            'name' => 'Soporte',
            'email' => 'soporte@soporte.com',
            'password' => bcrypt('12345678'),
            'role' => '1'

        ]);

        $soporte->assignRole('soporte');
        
        $cliente = User::create([
            'name' => 'Hugo Guillermo',
            'email' => 'hugorebel1998@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '2'
        ]);
        $cliente->assignRole('cliente');
    }
}
