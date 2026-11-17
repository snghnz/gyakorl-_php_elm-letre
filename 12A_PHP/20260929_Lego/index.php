<?php
require_once("lego_sets.php");
require_once("functions.php");


if (isset($_POST["setName"]) and isset($_POST["minPieces"]) and isset($_POST["maxPieces"]))
{
    settype($_POST["minPieces"], "int");
    settype($_POST["maxPieces"], "int");
    $legoSets = filterSets($legoSets, $_POST["setName"], $_POST["minPieces"], $_POST["maxPieces"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>LEGO Sets</h1>

        <form class="row row-cols-lg-auto g-3 align-items-center" method="post">
            <div class="col-12">
                <label class="visually-hidden" for="setName">Set name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="setName" placeholder="Set name" name="setName">
                </div>
            </div>

            <div class="col-12">
                <label class="visually-hidden" for="minPieces">Min pieces</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="minPieces" placeholder="Minimum pieces" name="minPieces">
                </div>
            </div>

                        <div class="col-12">
                <label class="visually-hidden" for="maxPieces">Max pieces</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="maxPieces" placeholder="Maximum pieces" name="maxPieces">
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


        <?php
        echo getSetCards($legoSets);
        ?>
    </div>
</body>

</html>