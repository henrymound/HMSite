<?php
    $xml = simple_load_file('data.xml');
    foreach ($xml->location as $location){
        echo $location->name;
    }
?>