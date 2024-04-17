<?php

header("Cache-Control: no-cache, must-revalidate");

require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

function ReadArr($filepath , $lastIndex){

    try{

        $sensor = IOFactory::load($filepath);
        $fakeSheet = $sensor->getActiveSheet();
        $highestRow = $fakeSheet->getHighestRow();

        $Index = $lastIndex + 1;

        if($Index <= $highestRow){

            $val = $fakeSheet->getCellByColumnAndRow(1, $Index)->getValue();

            return['value' => $val , 'index' => $Index ];

        }else{

            return ['value'=> null , 'index'=> 1 ];

        }

    }catch(Exception $e){
        return ['value' => null, 'index' => $lastIndex];
    }


}

$lastIndex = isset($_GET['lastIndex']) ? intval($_GET['lastIndex']) : 0;

$filepath = '..\..\FakeData\sensorData(stable).xlsx';

$data = ReadArr($filepath , $lastIndex);

echo json_encode($data);



?>