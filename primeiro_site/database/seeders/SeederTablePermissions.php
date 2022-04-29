<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['role-list',
                        'role-create',
                        'role-delete',
                        'role-edit',
                        'cliente-list',
                        'cliente-edit',
                        'cliente-create',
                        'cliente-delete'];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
