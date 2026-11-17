<?php
    var_dump($_SERVER['REQUEST_METHOD']);
    var_dump($_POST);
    var_dump($_GET);

    $MERET = 10;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['meret'])){
        if (settype($_POST['meret'], 'int') and $_POST['meret'] > 0)
        {
            $MERET = $_POST['meret'];
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szorzótábla</title>
</head>
<body>
    <h1>Szorzótábla</h1>
    <form action="" method="post">
        <label for="">Méret:</label>
        <input type="number" name="meret">
        <input type="submit" value="Rajzol" />
    </form>
    <table>
    <?php
        echo "<tr><td></td>";
        for ($i=1; $i <= $MERET; $i++) { 
            echo "<th>$i</th>";
        }
        echo "</tr>\n";


        $bgcolor = 255;
        for ($i=1; $i <= $MERET; $i++) {
            $color = $i <= $MERET / 2 ? "black" : "white";
            echo "<tr style='background-color: RGB(0,$bgcolor,0); color: $color;'>\n";
            echo "\t<th>$i</th>\n";
            for ($j=1; $j <= $MERET; $j++) { 
                echo "\t<td>" . $i*$j . "</td>\n";
            }
            echo "</tr>\n";
            $bgcolor -= 255 / $MERET;
        }
    ?>
    </table>
</body>
</html>