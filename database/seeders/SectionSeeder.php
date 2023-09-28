<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            ['title' => 'Name',
            'input_type' => 'text',
            'synonyms' => 'name'],

            ['title' => 'Title',
            'input_type' => 'text',
            'synonyms' => 'title'],

            ['title' => 'Email',
            'input_type' => 'text',
            'synonyms' => 'email'],

            ['title' => 'Phone',
            'input_type' => 'text',
            'synonyms' => 'phone'],

            ['title' => 'Address',
            'input_type' => 'longtext',
            'synonyms' => 'address'],

            ['title' => 'Profile',
            'input_type' => 'para',
            'synonyms' => 'profile'],

            ['title' => 'Education',
            'input_type' => 'multi',
            'synonyms' => 'education|academic'],

            ['title' => 'Experience',
            'input_type' => 'multi',
            'synonyms' => 'experience'],

            ['title' => 'Skills',
            'input_type' => 'multi',
            'synonyms' => 'skill'],

        ]);
    }
}
