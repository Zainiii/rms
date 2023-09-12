<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResSubSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('res_sub_sections')->insert([
            [
                'resume_id' => 6,
                'title' => 'Job Position Here',
                'data' => '2010-2015<br>Comapany Name | Company Address<br>Nulla neque ipsum, porttitor id ex nec, blandit tempus felis. Donec hendrerit enim dapibus, consectetur tortor a, sagittis mauris. Integer a diam id nibh porta aliquet a id est.'
            ],
            [
                'resume_id' => 6,
                'title' => 'Job Position Here',
                'data' => '2010-2015<br>Comapany Name | Company Address<br>Nulla neque ipsum, porttitor id ex nec, blandit tempus felis. Donec hendrerit enim dapibus, consectetur tortor a, sagittis mauris. Integer a diam id nibh porta aliquet a id est.'
            ],
            [
                'resume_id' => 6,
                'title' => 'Job Position Here',
                'data' => '2010-2015<br>Comapany Name | Company Address<br>Nulla neque ipsum, porttitor id ex nec, blandit tempus felis. Donec hendrerit enim dapibus, consectetur tortor a, sagittis mauris. Integer a diam id nibh porta aliquet a id est.'
            ],
            [
                'resume_id' => 6,
                'title' => 'Job Position Here',
                'data' => '2010-2015<br>Comapany Name | Company Address<br>Nulla neque ipsum, porttitor id ex nec, blandit tempus felis. Donec hendrerit enim dapibus, consectetur tortor a, sagittis mauris. Integer a diam id nibh porta aliquet a id est.'
            ],
            [
                'resume_id' => 6,
                'title' => 'Job Position Here',
                'data' => '2010-2015<br>Comapany Name | Company Address<br>Nulla neque ipsum, porttitor id ex nec, blandit tempus felis. Donec hendrerit enim dapibus, consectetur tortor a, sagittis mauris. Integer a diam id nibh porta aliquet a id est.'
            ],

        ]);
    }
}
