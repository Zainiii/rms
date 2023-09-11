<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('template_sections')->insert([
            ['section_id' => 1,
            'template_id' => 1,
            'order_no' => 1],

            ['section_id' => 2,
            'template_id' => 1,
            'order_no' => 2],

            ['section_id' => 3,
            'template_id' => 1,
            'order_no' => 3],


            ['section_id' => 1,
            'template_id' => 2,
            'order_no' => 1],

            ['section_id' => 2,
            'template_id' => 2,
            'order_no' => 2],

            ['section_id' => 3,
            'template_id' => 2,
            'order_no' => 3],


        ]);
    }
}
