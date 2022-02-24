<?php

spl_autoload_register(function ($className) {

    $classActivities = "/Backend/Packages/ClassActivities/";
    $databaseConnection = "/Backend/Packages/DatabaseConnection/";
    $dim = "/Backend/Packages/DIM/";
    $offeringAndAllocations = "/Backend/Packages/OfferingAndAllocations/";

//    echo "FileName List :".__NAMESPACE__."  ".$className."<br>";

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $dim . str_replace('\\', "/", $className) . ".php")) {
        include $_SERVER['DOCUMENT_ROOT'] . $dim . str_replace('\\', "/", $className) . ".php";

    } elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . $classActivities . str_replace('\\', "/", $className) . ".php")) {
        include $_SERVER['DOCUMENT_ROOT'] . $classActivities . str_replace('\\', "/", $className) . ".php";

    } elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . $databaseConnection . str_replace('\\', "/", $className) . ".php")) {
        include $_SERVER['DOCUMENT_ROOT'] . $databaseConnection . str_replace('\\', "/", $className) . ".php";

    } elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . $offeringAndAllocations . str_replace('\\', "/", $className) . ".php")) {
        include $_SERVER['DOCUMENT_ROOT'] . $offeringAndAllocations . str_replace('\\', "/", $className) . ".php";

    }
});

?>