<?php

function loadUsersFromJson($filename) {
    if (!file_exists($filename)){
        return [];
    }

    $jsonString = file_get_contents($filename);
    if (!$jsonString){
        return [];
    }

    $users = json_decode($jsonString, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return [];
    }

    return $users;
}

function searchUserByName($users, $name) {
    return array_filter($users, function ($user) use ($name) {
        return str_contains(strtolower($user['name']), strtolower($name));
    });
}

function getUserCard($user) {
    $result = "<div class='card h-100'><div class='card-body'>";
    $result .= "<h5 class='card-title'>$user[name]</h5>";
    $result .= "<h6 class='card-subtitle mb-2 text-body-secondary'>ID: $user[id] | Város: $user[city]</h6>";
    $result .= "<p class='card-text'><b>Kor:</b> $user[age]</p>";
    
    $interests = implode(', ', $user['interests']);
    $result .= "<p class='card-text'><b>Érdeklődési körök:</b> $interests</p>";

    if ($user['active'] === true) {
        $result .= "<div class='card-text text-center'><button class='btn btn-sm btn-success disabled'>Aktív felhasználó</button></div>";
    }
    else {
        $result .= "<div class='card-text text-center'><button class='btn btn-sm btn-secondary disabled'>Inaktív felhasználó</button></div>";
    }

    $result .= "</div></div>";

    return $result;
}

function getUsersGrid($users) {
    $result = "<div class='row'>";
    foreach ($users as $user) {
        $result .= "<div class='col-md-3 mb-3'>";
        $result .= getUserCard($user);
        $result .= "</div>";
    }
    $result .= "<div>";

    return $result;
}
  
