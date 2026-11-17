<?php
    require_once('functions.php');
    $films = loadFromJson("oscar-best-picture-award-winners.json");
    // var_dump($films);

    
    $title = $_GET["title"] ?? "";
    $genre = $_GET["genre"] ?? "";
    $director = $_GET["director"] ?? "";
    
    $genreOptions = getGenres($films, $genre);
    $directorOptions = getDirectors($films, $director);

    if (!empty($title)) {
        $films = filterByTitle($films, $title);
    }

    if (!empty($genre)) {
        $films = filterByGenre($films, $genre);
    }

    if (!empty($director)) {
        $films = filterByDirector($films, $director);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oscar-winning Films</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container py-5">
        <!-- Fejléc -->
        <h1 class="text-center mb-4">Oscar-winning Films</h1>

        <!-- Kereső űrlap -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="" method="get" class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label small">Search by title</label>
                        <input class="form-control" type="text" name="title" placeholder="e.g. The Godfather" value="<?= $title; ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small">Genre</label>
                        <select class="form-select" name="genre">
                            <option value="">All genres</option>
                            <?= $genreOptions; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small">Director</label>
                        <select class="form-select" name="director">
                            <option value="">All directors</option>
                            <?= $directorOptions; ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <input class="btn btn-primary w-100" type="submit" value="Filter">
                    </div>
                </form>
            </div>
        </div>

        <!-- Kártyák (soronként 4) -->
        <?= getAllFilmsDiv($films); ?>


        <!-- Ha nincs találat, a kártyák helyett ez jelenik meg:
        <div class="alert alert-warning text-center">No films match the selected filters.</div>
        -->
    </div>
</body>
</html>
