<?php 
    $tomb = array(1,2,'3');
    var_dump($tomb);
    echo '<br>';
    print_r($tomb);
    
    array_push($tomb, 'új elem');
    echo '<br>';
    var_dump($tomb);
    
    $tomb2[] = 10;
    $tomb2[] = 20;
    echo '<br>';
    var_dump($tomb2);
    print_r($tomb2);
    
    $tomb[] = '5. elem';
    $tomb[10] = 'másik elem';
    echo '<br>';
    var_dump($tomb);

    echo $tomb[7]; //WARNING
    
    echo '<br> további kód';

    //Warning - tovább fut
    //Error
    //Fatal Error
