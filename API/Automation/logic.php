<?php

function($SoilPercentage , $tempeture){

    if($SoilPercentage <= 5){

        echo"Critical low , please check irrigation system for faults";
        // send 1 to irrigation file to start irrigation

    }


    if($SoilPercentage <= 20){
        echo "Low moisture percentage";
         // send 2 to irrigation to prepare for irrigation

    }

    if($SoilPercentage <= 40){
        echo "Balanced moisture";
       
    }

    if($SoilPercentage <= 60){
        echo "High moisture";
        // do nothing
    }

    if($SoilPercentage <= 80){
        echo "very High moisture";
        //do nothing
    }



}
?>