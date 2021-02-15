<?php
    include 'connection.php';
    function fuelRequired($dist,$way){
        $kp = ceil($dist*60/135);
        $routeFuel=$kp*10;
        $contingency=0.1*$routeFuel;
        $startTaxcy = 100;
        $reserve = 300;
        $minimumFuel = 100;
        $rigRunning = $way*10;
        $fr = $routeFuel+$contingency+$startTaxcy+$reserve+$minimumFuel+$rigRunning;
        return $fr;
    }
    function toFuel1($fuel){
        return $fuel-100;
    }
    function toFuel2($fuel,$time){
        return $fuel - (($time*10)+150);
    }
    function routeFuel($dist){
        $kp = ceil($dist*60/135);
        $routeFuel=$kp*10;
        return $routeFuel;
    }
?>