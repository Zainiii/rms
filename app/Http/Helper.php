<?php

namespace App\Http;

class Helper
{
    public static function str_gen($str)
    {
        $dump_str = [
            'title' => 'Lorem Ipsum',
            'short' => 'Nulla neque ipsum, porttitor id ex nec, blandit tempus felis. Donec hendrerit enim dapibus, consectetur tortor a, sagittis mauris. Integer a diam id nibh porta aliquet a id est. ',
            'long' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac vestibulum orci. In hac habitasse platea dictumst. Sed consectetur, magna non rhoncus tempor, justo arcu ornare mi, vel maximus justo magna et lectus. Nam ac dui sem. Donec commodo nec augue eu pharetra. Quisque interdum est vitae est posuere feugiat. Curabitur sed risus sed justo aliquam fringilla non id ligula. Cras porta sodales auctor. Maecenas vel dictum justo, nec gravida justo. Proin augue leo, cursus ut dictum eget, cursus eget leo. Nullam fermentum augue et tempor congue. Nullam non quam ipsum. Sed nunc metus, laoreet id mi at, varius condimentum urna.'
         ];
         return $dump_str[$str];
    }
}