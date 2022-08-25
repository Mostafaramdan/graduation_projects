<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::insert([
            [
                'name'=>'First Semester',
                'from'=>'09-25',
                'to'=>'01-07',
                'number'=>1
            ],
            [
                'name'=>'Second Semester',
                'from'=>'01-22',
                'to'=>'05-04',
                'number'=>2
            ],
            [
                'name'=>'Third Semester',
                'from'=>'05-25',
                'to'=>'09-03',
                'number'=>3
            ],
        ]);
    }
}
