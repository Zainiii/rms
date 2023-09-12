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
            'synonyms' => 'name'],

            ['title' => 'Title',
            'synonyms' => 'title'],

            ['title' => 'Contact',
            'synonyms' => 'contact'],

            ['title' => 'Address',
            'synonyms' => 'address'],

            ['title' => 'Profile',
            'synonyms' => 'profile'],

            ['title' => 'Education',
            'synonyms' => 'education|academic'],

            ['title' => 'Experience',
            'synonyms' => 'experience'],

            ['title' => 'Skills',
            'synonyms' => 'skill'],

        ]);
    }
}
