<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            [
                'problem_id'=>'1',
                'case_1'=>'1 5 4 -3 2',
                'sol_1'=>'9',
                'case_2'=>'1 1 1 1 1',
                'sol_2'=>'5',
                'case_3'=>'1.5',
                'sol_3'=>'1.5',
                'case_4'=>'1.2 8.1',
                'sol_4'=>'9.3',
                'case_5'=>'-3 0 0 0 0.1',
                'sol_5'=>'-2.9'
            ]
        ]);
    }
}
