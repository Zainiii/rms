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
            [
                'section_id' => 1,
                'template_id' => 1,
                'order_no' => 1,
                'show_title' => false,
                'header_style' => '"font-size: 32px;font-weight: bold;font-family: math;"',
                'body_style' => '"font-size: 32px;font-weight: bold;font-family: math;text-align: center;"',
                'sub_header_style' => '"font-size: 20px;font-weight: bold;font-family: math;"',
                'sub_body_style' => '"font-family: math;padding-left: 30px;padding-right: 30px;"'
            ],

            [
                'section_id' => 2,
                'template_id' => 1,
                'order_no' => 2,
                'show_title' => false,
                'header_style' => '"font-size: 32px;font-weight: bold;font-family: math;"',
                'body_style' => '"font-family: math;font-weight: bold;text-align: center;margin-top: -31px;"',
                'sub_header_style' => '"font-size: 20px;font-weight: bold;font-family: math;"',
                'sub_body_style' => '"font-family: math;padding-left: 30px;padding-right: 30px;"'
            ],

            [
                'section_id' => 3,
                'template_id' => 1,
                'order_no' => 3,
                'show_title' => false,
                'header_style' => '"font-size: 32px;font-weight: bold;font-family: math;"',
                'body_style' => '"font-family: math;text-align: center;"',
                'sub_header_style' => '"font-size: 20px;font-weight: bold;font-family: math;"',
                'sub_body_style' => '"font-family: math;padding-left: 30px;padding-right: 30px;"'
            ],


            [
                'section_id' => 4,
                'template_id' => 1,
                'order_no' => 4,
                'show_title' => false,
                'header_style' => '"font-size: 32px;font-weight: bold;font-family: math;padding-left: 30px;"',
                'body_style' => '"font-family: math;text-align: center;"',
                'sub_header_style' => '"font-size: 20px;font-weight: bold;font-family: math;"',
                'sub_body_style' => '"font-family: math;padding-left: 30px;padding-right: 30px;"'
            ],

            [
                'section_id' => 5,
                'template_id' => 1,
                'order_no' => 5,
                'show_title' => true,
                'header_style' => '"font-size: 32px;font-weight: bold;font-family: math;padding-left: 30px;"',
                'body_style' => '"font-family: math;font-family: math;padding-left: 30px;padding-right: 36px;"',
                'sub_header_style' => '"font-size: 20px;font-weight: bold;font-family: math;"',
                'sub_body_style' => '"font-family: math;padding-left: 30px;padding-right: 30px;"'
            ],

            [
                'section_id' => 6,
                'template_id' => 1,
                'order_no' => 6,
                'show_title' => true,
                'header_style' => '"font-size: 32px;font-weight: bold;font-family: math;padding-left: 30px;"',
                'body_style' => '"color: #c49a69;font-family: math;padding-left: 30px;padding-right: 30px;"',
                'sub_header_style' => '"font-size: 20px;font-weight: bold;font-family: math;padding-left: 30px;padding-right: 30px;"',
                'sub_body_style' => '"font-family: math;padding-left: 30px;padding-right: 30px;"'
            ],

            [
                'section_id' => 7,
                'template_id' => 1,
                'order_no' => 7,
                'show_title' => true,
                'header_style' => '"font-size: 32px;font-weight: bold;font-family: math;padding-left: 30px;"',
                'body_style' => '"color: #c49a69;font-family: math;padding-left: 30px;padding-right: 30px;"',
                'sub_header_style' => '"font-size: 20px;font-weight: bold;font-family: math;padding-left: 30px;padding-right: 30px;"',
                'sub_body_style' => '"font-family: math;padding-left: 30px;padding-right: 30px;"'
            ],

        ]);
    }
}
