<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class premaionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            'add_employee','show_employee','edit_employee','delete_employee'
        ];
        foreach($permissions as $permission){
            Permission::updateOrCreate(['name'=>$permission],['name'=>$permission,'guard_name'=>'admin']);
        }
    }
}
