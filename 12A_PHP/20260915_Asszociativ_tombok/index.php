<?php
    //Asszociatív tömbök
    $atomb["vezeteknev"] = "Kovács";
    $atomb["keresztnev"] = "Béla";

    echo $atomb["vezeteknev"];

    $atomb2 = array(
        "alma" => "apple",
        "körte" => "pear",
        "narancs" => "orange"
    );

    echo "<ul>";
    foreach ($atomb2 as $key => $value) {
        echo "<li>$key - $value</li>";
    }
    echo "</ul>";

    echo "<ul>";
    foreach ($atomb2 as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";


    echo "<ul>";
    $tomb = array(1,200,2,34);

    // sort($tomb);
    rsort($tomb);

    foreach ($tomb as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";

    $tomb2[] = 112;
    $tomb2[3] = 34;
    $tomb2[70] = 56656;
    $tomb2[1] = 56;
    $tomb2[20] = 13431;

    krsort($tomb2);

    echo "<ul>";
    foreach ($tomb2 as $key => $value) {
        echo "<li>$key. elem értéke: $value</li>";
    }
    echo "</ul>";
    echo "<p>Összesen: ".count($tomb2)." elem</p>";

    for ($i=0; $i < 10; $i++) { 
        # code...
    }