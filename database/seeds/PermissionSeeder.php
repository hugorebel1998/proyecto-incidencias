<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'admin usuarios']);
        Permission::create(['name' => 'admin proyectos']);
        Permission::create(['name' => 'reportes']);
        Permission::create(['name' => 'reportes listas']);
        Permission::create(['name' => 'reportes crear']);


         // create roles and assign existing permissions
         $role= Role::create(['name' => 'admin']);
         $role->givePermissionTo('admin usuarios');
         $role->givePermissionTo('admin proyectos');
         $role->givePermissionTo('reportes');
         $role->givePermissionTo('reportes listas');
         $role->givePermissionTo('reportes crear');

         $role= Role::create(['name' => 'cliente']);
         $role->givePermissionTo('reportes');
         $role->givePermissionTo('reportes listas');
         $role->givePermissionTo('reportes crear');


         $role= Role::create(['name' => 'soporte']);
         $role->givePermissionTo('reportes');
         $role->givePermissionTo('reportes listas');
         $role->givePermissionTo('reportes crear');
        
    }
}
