<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $autores = [
            ['name' => 'Nombre del primer autor'],
            ['name' => 'Nombre del segundo autor'],
            ['name' => 'Nombre del tercer autor']
        ];
        DB::table('books')->insert([
            'title' => 'El gran Gatsby',
            'published_year'=>1925
        ]);
        DB::table('books')->insert([
            'title'=>'Cien años de Soledad',
            'published_year'=>1967
        ]);
        DB::table('books')->insert([
            'title'=>'Viven',
            'published_year'=>1975
        ]);
    }
}
