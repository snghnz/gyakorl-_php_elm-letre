<?php

function loadFromJson($filename) {
    $json = file_get_contents($filename);
    $data = json_decode($json, true);
    // $data[0]["title"]
    // $data[0]->title
    return $data;
}

function getDiv($game) {
    $output = "";

    $output .= "
            <div class='col-sm-6 col-md-4 col-lg-3 my-2'>
                <div class='card h-100 shadow-sm'>
                    <img src='$game[image]' alt='$game[title]' class='card-img-top'>
                    <div class='card-body d-flex flex-column'>
                        <h5 class='card-title mb-1'>$game[title]</h5>
                        <p class='text-success fw-semibold small mb-2'>$game[genre]</p>
                        <p class='text-body-secondary small mb-2'>$game[developer] | $game[year]</p>
                        <p class='small'>$game[description]</p>
                        <div class='mt-auto'>
                            <p class='text-body-secondary small mb-1'>Platformok:</p>
                            <div>";

                            foreach ($game["platforms"] as $platform) {
                                $output .= "<span class='badge bg-primary me-1 mb-1'>$platform</span>";
                            }


    $output .= "            </div>
                        </div>
                    </div>
                </div>
            </div>";

    return $output;
}

function getAllDiv($games) {
    $output = "<div class='row'>";

    foreach ($games as $game) {
        $output .= getDiv($game);
    }

    $output .= "</div>";
    return $output;
}

function getGenres($games){
    $allGenre = [];
    foreach ($games as $game) {
        $allGenre[] = $game["genre"];
    }
    $allGenre = array_unique($allGenre);
    sort($allGenre);

    $output = "";
    foreach ($allGenre as $genre) {
        $output .= "<option value='$genre'>$genre</option>";
    }
    return $output;
}

function filterByTitle($games, $title) {
    return array_filter($games, function ($game) use ($title) {
        return str_contains(strtolower($game["title"]), strtolower($title));
    });
}

function filterByGenre($games, $genre) {
    return array_filter($games, function ($game) use ($genre) {
        return $game["genre"] == $genre;
    });
}