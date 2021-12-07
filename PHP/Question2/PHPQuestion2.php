<html>

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: blueviolet;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            font-size: 30px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["number"])) {
        $no = $_POST["number"];
        if ($no < 2 || $no > 100)
            echo "Digit should be in range: 2-100";
        else {
            echo "<br><br>Entered digit: ";
            echo $_POST["number"];
            for ($i = 2; $i <= $no / 2; $i++) {
                if ($no % $i == 0) {
                    $flag = 1;
                    break;
                } else
                    $flag = 0;
            }
            if ($flag == 1) {
                echo "<br><br>Its a Composite digit<br>";
                $num = 0;
                $n1 = 0;
                $n2 = 1;
                echo "<br>Fibonacci series: ";
                echo "\n";
                echo $n1 . ' ' . $n2 . ' ';
                while ($num < $no - 2) {
                    $n3 = $n2 + $n1;
                    echo $n3 . ' ';
                    $n1 = $n2;
                    $n2 = $n3;
                    $num = $num + 1;
                }
            } else {
                $fact = 1;
                echo "<br><br>Its a Prime digit<br>";
                for ($i = $no; $i > 0; $i--) {
                    $fact = $fact * $i;
                }
                echo "<br>Factorial of digit: ";
                echo $fact . '';
            }
        }
    } else
        echo "Please enter a digit";
    ?>
</body>

</html>