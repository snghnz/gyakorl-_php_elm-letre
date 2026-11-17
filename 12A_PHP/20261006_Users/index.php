<?php
    require_once("functions.php");
    $users = loadUsersFromJson("users.json");

    if (!empty($_GET["name"])) {
        $users = searchUserByName($users, htmlspecialchars($_GET["name"]));
    }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználók</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Felhasználók</h1>

        <form action="" method="get" class="my-3">
            <label class="form-label" for="name">Név:</label>
            <input class="form-control" type="text" name="name" id="name">
            <input class="btn btn-primary" type="submit" value="Keres">
        </form>

        <?php
            echo getUsersGrid($users);
        ?>
    </div>
</body>
</html>