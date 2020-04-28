<?php

use App\hrm\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'HRM',
            'comment' => 'HRM',
            'status' => 1,
        
        ]);
    }
}
