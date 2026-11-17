<?php

function loadFromJson($filename) {
    $json = file_get_contents($filename);
    $data = json_decode($json, true);
    return $data;
}

function getFilmDiv($film) {
    $output = "";
    $output .= "<div class='col-sm-6 col-md-4 col-lg-3 my-2'>";
    $output .= "   <div class='card h-100 shadow-sm'>";
    $output .= "      <img src='$film[poster]' alt='$film[name]' class='card-img-top' style='height: 300px; object-fit: cover;'>";
    $output .= "        <div class='card-body d-flex flex-column'>";
    $output .= "            <h5 class='card-title mb-1'>$film[name]</h5>";
    $output .= "            <p class='text-success fw-semibold small mb-2'>Oscars: $film[oscar]</p>";
    $output .= "            <p class='text-body-secondary small mb-2'>Released: $film[released_year] | $film[duration]</p>";
    $output .= "            <p class='small'>$film[summary]</p>";
    $output .= "            <div class='mt-auto'>";
    $output .= "                <p class='text-body-secondary small mb-1'>Genre:</p>";
    $output .= "                <div class='mb-2'>";

    $genres = explode(",", $film["genre"]);
    foreach ($genres as $genre) {
        $output .= "                    <span class='badge bg-primary me-1 mb-1'>$genre</span>";
    }

    $output .= "                </div>";
    $output .= "                <p class='text-body-secondary small mb-1'>Director(s):</p>";
    $output .= "                <div class='mb-2'>";
    
    foreach ($film["directors"] as $director) {
        $output .= "                    <span class='badge bg-secondary me-1 mb-1'>$director</span>";
    }

    $output .= "                </div>";
    $output .= "                <p class='text-body-secondary small mb-1'>Stars:</p>";
    $output .= "                <div>";
    
    foreach ($film["stars"] as $star) {
        $output .= "                    <span class='badge bg-success me-1 mb-1'>$star</span>";
    }

    $output .= "                </div>";
    $output .= "            </div>";
    $output .= "        </div>";
    $output .= "    </div>";
    $output .= "</div>    ";

    return $output;
}

function getAllFilmsDiv($films) {
        
    $output = "<div class='row'>";

    foreach ($films as $film) {
        $output .= getFilmDiv($film);
    }

    $output .= "</div>";

    return $output;
}

function getGenres($films, $selected = ""){
    $allGenre = [];
    foreach ($films as $film) {
        $genres = explode(", ", $film["genre"]);
        $allGenre = array_merge($allGenre, $genres);
    }
    $allGenre = array_unique($allGenre);
    sort($allGenre);

    $output = "";
    foreach ($allGenre as $genre) {
        if ($genre == $selected)
            $output .= "<option selected value='$genre'>$genre</option>";
        else
            $output .= "<option value='$genre'>$genre</option>";
    }
    return $output;
}

function getDirectors($films, $selected = ""){
    $allDirectors = [];
    foreach ($films as $film) {
        $allDirectors = array_merge($allDirectors, $film["directors"]);
    }
    $allDirectors = array_unique($allDirectors);
    sort($allDirectors);

    $output = "";
    foreach ($allDirectors as $director) {
        if ($director == $selected)
            $output .= "<option selected value='$director'>$director</option>";
        else
            $output .= "<option value='$director'>$director</option>";
    }
    return $output;
}

function filterByTitle($films, $title) {
    return array_filter($films, function ($film) use ($title) {
        return str_contains(strtolower($film["name"]), strtolower($title));
    });
}

function filterByGenre($films, $genre){
    return array_filter($films, function ($film) use ($genre) {
        return str_contains(strtolower($film["genre"]), strtolower($genre));
    });
}

function filterByDirector($films, $director) {
    return array_filter($films, function ($film) use ($director) {
        return in_array($director, $film["directors"]);
    });
}