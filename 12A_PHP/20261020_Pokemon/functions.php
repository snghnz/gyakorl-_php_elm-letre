<?php

function loadFromJson($filename) {
    $json = file_get_contents($filename);
    
    if ($json === false) {
        die("File load failure.");
    }

    return json_decode($json, true);
}

function getBadges($items) {
    $result = "";
    foreach ($items as $item) {
        $result .= "<span class='badge bg-success mx-1'>$item</span>";
    }
    return $result;
}

function getPokemonDiv($pokemon) {
    $result = "<div class='card text-center'>";
    $result .= "<img class='card-img-top' src='$pokemon[img]'>";
    
    $result .= "<div class='card-body'>";

    $result .= "<h5 class='card-title'>$pokemon[name]</h5>";
    $result .= "<p>#$pokemon[num]</p>";
    $result .= "<p>" . getBadges($pokemon["type"]) . "</p>";

    $result .= "<p>Gyengeségek</p>";
    $result .= "<p>" . getBadges($pokemon["weaknesses"]) . "</p>";

    $result .= "</div>";
    $result .= "</div>";
    return $result;
}

function getAllPokemonsDiv($pokemons){
    $result = "<div class='row'>";
    
    foreach ($pokemons as $pokemon) {
        $result .= "<div class='col-md-4 col-lg-3 col-sm-6'>";
        $result .= getPokemonDiv($pokemon);
        $result .= "</div>";
    }

    $result .= "</div>";
    return $result;
}

function getSelectOptions($pokemons) {
     $result = "";

     $types = [];
     foreach ($pokemons as $pokemon) {
        foreach ($pokemon["type"] as $type) {
            $types[] = $type;
        }
    }
            
    $types = array_unique($types);
    sort($types);

    $result .= "<option value=''>Minden típus</option>";
    foreach ($types as $type) {
        $result .= "<option value='$type'>$type</option>";
    }

     return $result;
}

function filterByName($pokemons, $name) {
    return array_filter($pokemons, function ($pokemon) use ($name) {
        return str_contains(strtolower($pokemon["name"]), strtolower($name));
    });
}

function filterByType($pokemons, $type) {
    return array_filter($pokemons, function ($pokemon) use ($type) {
        return in_array($type, $pokemon["type"]);
    });
}