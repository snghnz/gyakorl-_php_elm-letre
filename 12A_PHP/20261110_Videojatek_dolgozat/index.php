<?php
    require_once("functions.php");
    $games = loadFromJson("games.json");

    $genres = getGenres($games);

    $title = $_GET["title"] ?? "";
    $genre = $_GET["genre"] ?? "";

    if ($title != "") {
        $games = filterByTitle($games, $title);
    }

    if ($genre != "") {
        $games = filterByGenre($games, $genre);
    }

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videójáték-katalógus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container py-5">
        <!-- Fejléc -->
        <h1 class="text-center mb-4">Videójáték-katalógus</h1>

        <!-- Kereső űrlap -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="" method="get" class="row g-3 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label small">Keresés címre</label>
                        <input class="form-control" type="text" name="title" placeholder="pl. Portal">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small">Műfaj</label>
                        <select class="form-select" name="genre">
                            <option value="">Minden műfaj</option>
                            <?= $genres ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input class="btn btn-primary w-100" type="submit" value="Szűrés">
                    </div>
                </form>
            </div>
        </div>

        <?php
            if (count($games) == 0) {
                echo '<div class="alert alert-warning text-center">Nincs a feltételeknek megfelelő játék.</div>';
            }
            else {
                echo getAllDiv($games);
            }
         ?>
</body>
</html>
