<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('problems')->insert([
            [
                'problem'=>'Sum of array items',
                'type'=>'Easy',
                'description'=>'Find the summation of all numbers in array of numbers',
                'example'=>'Let`s say that the array was [1,5,4,-3,2] Then Your output should be the summation of 1+5+4+(-3)+2 which is 9'
            ],
            [
                'problem'=>'Sum of odd Numbers',
                'type'=>'Easy',
                'description'=>'Find summation of all odd numbers in array',
                'example'=>'Let`s say that the array was [1,5,4,-3,2] Then Your output should be the odd numbers which is 3'
            ],
            [
                'problem'=>'Even Numbers',
                'type'=>'Easy',
                'description'=>'Find all even numbers in array',
                'example'=>'Let`s say that the array was [1,5,4,-3,2] Then Your output should be the even numbers which is 6'
            ],
            // [
            //     'problem'=>'Swap String',
            //     'type'=>'Medium',
            //     'description'=>'Try swap two strings without temp',
            //     'example'=>'Let`s say that the array was [1,5,4,-3,2] Then Your output should be the summation of 1+5+4+(-3)+2 which is 9'
            // ],
        ]);
    }
}
