<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


    //Below is the code to read the fake excel data that represents the sensors


function DataRead($filepath){

    try{
        $sensor = IOFactory::load($filepath);
        $FakeSheet = $sensor->getactiveSheet();
        $data = [];

        foreach($FakeSheet->getrowIterator() as $row){
            $rowData = [];

            foreach($row->getCellIterator() as $cell){
                $rowData[] = $cell->getValue();
        }
        $data[] = $rowData;
    }

    }catch(Exception $e){
        $data = null;
    }


    if($data !== null){
        return $data;
    }else{
        $data = 'N/A';
    }


}


?>