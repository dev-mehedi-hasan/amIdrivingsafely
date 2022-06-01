<?php

use Illuminate\Database\Seeder;
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
        $permissions = [
            'user',
            'role',
            'incident_type',
            'vehicle_type',
         ];
    
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
