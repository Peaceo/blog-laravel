<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Permissions
        //Find Role By Name
        //Assign permission to role

        $permissions = [
            'create-user',
            'edit-user',
            'delete-user',
            'view-users',
            'create-post',
            'edit-post',
            'delete-post',
            'view-posts',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $authorPermissions = [
            'create-post',
            'edit-post',
            'view-posts',
        ];

        $authorRole = Role::findByName('Author', null);

        foreach ($authorPermissions as $authorPermission) {
            $authorRole->givePermissionTo($authorPermission);
        }
    }
}
