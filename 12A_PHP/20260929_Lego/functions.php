<?php
    function getSetCards($legoSets) {
        $result = "<div class='row'>";
        foreach ($legoSets as $set) {
            $result .= "<div class='col-md-3'>";
            $result .= "<div class='card my-2'>";
            $result .= "<div class='card-header fw-bold'>$set[setName]</div>";
            $result .= "<ul class='list-group list-group-flush'>";
            foreach ($set as $key => $value) {
                if ($key != "setName" and $key != "id") {
                    $result .= "<li class='list-group-item'><b>$key</b>: $value</li>";            
                }
            }
            $result .= "</ul>";
            $result .= "</div>";
            $result .= "</div>";
        }
        $result .= "</div>";
        return $result;
    }

    function filterSets($legoSets, $setName, $min, $max) {
        // $result = [];
        // foreach ($legoSets as $set) {
        //     if (str_contains($set["setName"], $setName)) {
        //         $result[] = $set;
        //     }
        // }

        $result = array_filter($legoSets, function ($set) use ($setName, $min, $max)  {
            return ($setName == "" or str_contains($set["setName"], $setName)) and
                    ($set["pieces"] > $min) and //TODO: ha üres...
                    ($set["pieces"] < $max)
            ;
        });

        return $result;
    }
?>
