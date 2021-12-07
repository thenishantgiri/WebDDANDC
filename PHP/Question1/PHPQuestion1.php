<?php
$row_length = 5;

// upper section
for ($row = 0; $row < $row_length; $row++) {
    //left section
    for ($column = 1; $column <= $row_length - $row; $column++) {
        echo "*&nbsp;";
    }

    for ($spaces = 0; $spaces < $row; $spaces++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }

    // right section 
    for ($spaces = 0; $spaces < $row; $spaces++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }
    for ($column = $row_length - $row; $column >= 1; $column--) {
        echo "*&nbsp;";
    }
    echo '<br>';
}

// lower section
for ($row = 2; $row <= $row_length; $row++) {
    // left section
    for ($column = 1; $column <= $row; $column++) {
        echo "*&nbsp;";
    }

    for ($spaces = 0; $spaces <  $row_length - $row; $spaces++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }

    // right section
    for ($spaces = 1; $spaces <= $row_length - $row; $spaces++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }
    for ($column = 1; $column <= $row; $column++) {
        echo "*&nbsp;";
    }
    echo '<br>';
}
