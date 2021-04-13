<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getDataFromUrlController extends Controller
{
    public function test(){
        $data = file_get_contents('https://healthcareandprotection.com/news/feed/.');
        $xml = simplexml_load_string($data, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $feeds=$array['channel']['item'];

        function get_string_between($string, $start, $end){
            $string = $string;
            $ini = strpos($string, $start);
            // if ($ini == 0) return '';
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }

        foreach($feeds as $feed){
            // dd($feed['description']);
            $btw = get_string_between($feed['description'],'src="','"');
            dd($btw);
        }
       
    }
}
