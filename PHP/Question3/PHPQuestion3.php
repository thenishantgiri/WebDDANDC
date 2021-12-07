<?php
    $background_colors = array('#282E33', '#25373A', '#164852', '#495E67', '#FF3838');

    $count = count($background_colors) - 1;

    $i = rand(0, $count);

    $rand_background = $background_colors[array_rand($background_colors)];
?>

<html>
    <head>

    </head>
    <body style="background: <?php echo $rand_background; ?>;">
        <h1 style="color:white;">Hello</h1>
    </body>
</html>