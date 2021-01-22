<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departments = ['Finance','Human Resource','Marketing'];
        foreach($departments  as $department){
        Department::create([
            'name'=>$department
        ]);
    }
    }
}
