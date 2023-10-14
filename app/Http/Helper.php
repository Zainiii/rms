<?php

namespace App\Http;

class Helper
{
    public static function str_gen($str)
    {
        $dump_str = [
            'text' => 'Lorem Ipsum',
            'longtext' => 'Nulla neque ipsum, porttitor id ex nec, blandit tempus felis.',
            'para' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac vestibulum orci. In hac habitasse platea dictumst. Sed consectetur, magna non rhoncus tempor, justo arcu ornare mi, vel maximus justo magna et lectus. Nam ac dui sem. Donec commodo nec augue eu pharetra. Quisque interdum est vitae est posuere feugiat. Curabitur sed risus sed justo aliquam fringilla non id ligula. Cras porta sodales auctor. Maecenas vel dictum justo, nec gravida justo. Proin augue leo, cursus ut dictum eget, cursus eget leo. Nullam fermentum augue et tempor congue. Nullam non quam ipsum. Sed nunc metus, laoreet id mi at, varius condimentum urna.'
         ];
         return $dump_str[$str];
    }

    public static function css_props()
    {
        $props = [
            'font' => 'font-family',
            'size' => 'font-size',
            'color' => 'color',
            'bold' => 'font-weight',
            'italic' => 'font-style',
            'underline' => 'text-decoration',
            'align' => 'text-align',
         ];
         return $props;
    }

    public static function css_default($type)
    {

        $props['header'] = [
            'font' => 'Arial',
            'size' => '18',
            'color' => '#000000',
            'bold' => 'bold',
            'italic' => 'normal',
            'underline' => 'none',
            'align' => 'left',
         ];

        $props['subheader'] = [
            'font' => 'Arial',
            'size' => '16',
            'color' => '#818182',
            'bold' => 'bold',
            'italic' => 'normal',
            'underline' => 'none',
            'align' => 'left',
         ];

        $props['body'] = [
            'font' => 'Arial',
            'size' => '14',
            'color' => '#000000',
            'bold' => 'normal',
            'italic' => 'normal',
            'underline' => 'none',
            'align' => 'left',
         ];

        $props['postfix'] = [
            'font' => '',
            'size' => 'px',
            'color' => '',
            'bold' => '',
            'italic' => '',
            'underline' => '',
            'align' => '',
         ];
         return $props[$type];
    }


}
