<?php
    $a = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident error mollitia pariatur veritatis ratione rerum ipsam doloribus deserunt. Illo praesentium, ad at enim quas eius cumque animi nobis ipsum error?</h1>
    <?php 
        echo '<p>Hello World!</p>';
        print $a;
        $firstname = 'Jakab';
        $lastname = 'Gipsz';
        echo "<p>Teljes név: $lastname $firstname</p>";
        echo '<p>Teljes név: '.$lastname.' '.$firstname.'</p>';
        echo gettype($a);
        $a = 'alma';
        echo gettype($a);

        $s = '1';
        echo gettype($s);
        settype($s, 'int');
        echo gettype($s);

    ?>
</body>
</html>