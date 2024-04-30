<?php

function($SoilPercentage , $tempeture){

    if($SoilPercentage <= 5){

        echo"Critical low , please check irrigation system for faults";

    }


    if($SoilPercentage <= 20){
        echo "Low moisture percentage";
    }

    if($SoilPercentage <= 40){
        echo "Balanced moisture";
    }

    if($SoilPercentage <= 60){
        echo "High moisture";
    }

    if($SoilPercentage <= 80){
        echo "very High moisture";
    }



}
?>