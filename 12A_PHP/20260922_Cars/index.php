<?php
    // include("cars.php");
    require("cars.php");
    // var_dump($cars);
    // var_dump($cars[0]["Name"]);
    require_once("functions.php");

    if (!empty($_POST["name"])) 
    {
        $cars = filterCarsByName($cars, $_POST["name"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center bg-dark text-light p-3">Cars</h1>

        <form class="row mb-3" method="POST" action="">
            <label class="col-md-4 form-label">Name</label>
            <input  type="text" class="col-md-6 form-control" id="name" name="name">
            <button type="submit" class="col-md-2 btn btn-primary">Submit</button>
        </form>        

        <?php
            echo getTable($cars);
        ?>
    </div>
</body>
</html>