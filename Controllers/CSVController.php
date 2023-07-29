<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSVController extends Controller
{

  

    public function FilterText(){
        
        $csvData =[];
        $csvDataWithStr =[];
        $str  = ' Gardener';
        if (($open = fopen(storage_path() . "/app/public/sample-csv.csv", "r")) !== FALSE) {


            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {

                $results = array_filter($data, function($str) {
                    return strpos($str, 'Gardener') !== false;
                });
            
            
            
                //  $tmpData = array_search( '$str', $data );

                // $readdata = array_search($str, $data, false);
                
                // var_dump($data);
                // var_dump($readdata);

                // if ($readdata) { // not matching
                //     $csvData[] = $data;
                // }else{
                //     $csvDataWithStr[] = $data;
                // }

            }


            fclose($open);

        }


        echo "<pre>";

        print_r($csvData);
        echo " -------------------------";
        print_r($csvDataWithStr);

    }
}
