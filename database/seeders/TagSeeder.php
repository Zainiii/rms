<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['tag_name' => 'Web Developer'],
            ['tag_name' => 'Accountant'],
            ['tag_name' => 'Nursing'],
            ['tag_name' => 'Graphic Designer'],
            ['tag_name' => 'Backend Developer'],
            ['tag_name' => 'Php'],
            ['tag_name' => 'Python'],
        ]);

    }
}
