<?php

namespace Database\Seeders;

use App\Models\EmployeeRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmplyeeRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeRole::create([
            'employee_id' => 1,
            'role_id' => 2,
        ]);
    }
}
