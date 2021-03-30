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
        Permission::create(['name' => 'create report']);
        Permission::create(['name' => 'read reports']);
        Permission::create(['name' => 'edit report']);
        Permission::create(['name' => 'update report']);
        Permission::create(['name' => 'delete report']);


         // create roles and assign existing permissions
         $role= Role::create(['name' => 'admin']);
         $role->givePermissionTo(Permission::all());
         

         $role= Role::create(['name' => 'cliente']);
         $role->givePermissionTo('create report');
         $role->givePermissionTo('read reports');
         


         $role= Role::create(['name' => 'soporte']);
         $role->givePermissionTo('create report');
         $role->givePermissionTo('read reports');
         $role->givePermissionTo('edit report');
         $role->givePermissionTo('update report');
        
    }
}
