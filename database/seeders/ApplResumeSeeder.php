<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('apl_resumes')->insert([
            [
                'section_id' => 1,
                'applicant_id' => 1,
                'data' => 'Lorem Ipsum',
                'is_group' => 0
            ],

            [
                'section_id' => 2,
                'applicant_id' => 1,
                'data' => 'Software Engineer',
                'is_group' => 0
            ],

            [
                'section_id' => 3,
                'applicant_id' => 1,
                'data' => 'loremipsum@gmail.com',
                'is_group' => 0
            ],

            [
                'section_id' => 4,
                'applicant_id' => 1,
                'data' => '+614234567',
                'is_group' => 0
            ],

            [
                'section_id' => 5,
                'applicant_id' => 1,
                'data' => 'Melbourne, Victoria',
                'is_group' => 0
            ],

            [
                'section_id' => 6,
                'applicant_id' => 1,
                'data' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac vestibulum orci. In hac habitasse platea dictumst. Sed consectetur, magna non rhoncus tempor, justo arcu ornare mi, vel maximus justo magna et lectus. Nam ac dui sem. Donec commodo nec augue eu pharetra. Quisque interdum est vitae est posuere feugiat. Curabitur sed risus sed justo aliquam fringilla non id ligula. Cras porta sodales auctor. Maecenas vel dictum justo, nec gravida justo. Proin augue leo, cursus ut dictum eget, cursus eget leo. Nullam fermentum augue et tempor congue. Nullam non quam ipsum. Sed nunc metus, laoreet id mi at, varius condimentum urna.',
                'is_group' => 0
            ],

            [
                'section_id' => 7,
                'applicant_id' => 1,
                'data' => '',
                'is_group' => 1
            ],

        ]);
    }
}
