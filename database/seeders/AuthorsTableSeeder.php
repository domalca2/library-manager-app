<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => 'Scott Fitzgerald',
            'country'=>'USA'
        ]);
        DB::table('authors')->insert([
            'name'=>'G. García Márquez',
            'country'=>'Argentina'
        ]);
        DB::table('authors')->insert([
            'name'=>'Piers Paul Read',
            'country'=>'UK'
        ]);
    }
}
