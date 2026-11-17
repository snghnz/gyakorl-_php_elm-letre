<?php
    function getTable($array) {
        $output = "<table class='table table-striped table-dark'>";
    
        $headers = array_keys($array[0]);
        // print_r($headers);
        $output .= "<tr>";
        foreach ($headers as $header) {
            $header = str_replace("_"," ", $header);
            $output .= "<th>$header</th>";
        }
        $output .= "</tr>";
        foreach ($array as $item) {
            $output .= "<tr>";
            // $output .= "<td>$item[Name]</td>";
            // $output .= "<td>$item[Miles_per_Gallon]</td>";
            foreach ($item as $key => $value) {
                $output .= "<td>$value</td>";
            }
            $output .= "</tr>";
        }
        $output .= "</table>";
        
        return $output;   
    }

    function filterCarsByName($cars, $name) {
        // $result = [];
        $result = array();

        foreach ($cars as $car) {
            if (str_contains(strtolower($car["Name"]), strtolower($name))) {
                // $result[] = $car;
                array_push($result, $car);
            }
        }

        return $result;
    }

