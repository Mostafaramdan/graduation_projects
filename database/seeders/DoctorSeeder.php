<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'name'=>'ayousria',
            'email'=>'ayousria@hti.edu.eg',
            'password' => bcrypt('123456'),
            'is_active'=>1
        ]);
    }
}
