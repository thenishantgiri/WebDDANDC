<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border: 2px solid blueviolet;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>

<body>
    <?php
    include 'db_connections.php';
    $flag = true;
    if (empty($_POST["name"])) {
        $flag = false;
        echo "<br>Name is empty.";
    }
    if (validateRoll() == false) {
        $flag = false;
        echo "<br>Roll number should be in format AC-1234.";
    }
    if (validateEmail() == false) {
        $flag = false;
        echo "<br>Incorrect email format.";
    }
    if (validateAge() == false) {
        $flag = false;
        echo "<br>Invalid age.";
    }
    if (empty($_POST["gender"])) {
        $flag = false;
        echo "<br>Select gender.";
    }
    if (validateImage() == false) {
        $flag = false;
        echo "<BR>Incorrect image format";
    }

    function validateEmail()
    {
        $a = $_POST["email"];
        $specialChar = strrpos($a, "@");
        $dotChar = strrpos($a, ".");
        if ($specialChar < 1 || $dotChar < $specialChar + 2 || $dotChar + 2 >= strlen($a)) {
            return false;
        } else return true;
    }

    function validateRoll()
    {
        $r = $_POST["roll"];
        $pre = substr($r, 0, 3);
        $len = strlen($r);
        if ($pre != "AC-" || $len >= 8) {
            return false;
        } else return true;
    }

    function validateAge()
    {
        $a = $_POST["age"];
        if (empty($a) || $a <= 15 || $a >= 23) {
            return false;
        } else return true;
    }

    function validateImage()
    {
        $n = $_FILES["image"]["type"];
        $ex = strpos($n, '/');
        $org = substr($n, $ex + 1);
        if ($org == "jpg" || $org == "jpeg" || $org == "png") {
            return true;
        } else return false;
    }

    $target_dir = "photos/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    ?>

    <?php
    if ($flag == true) {
        $db = openCon();
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $course = $_POST["course"];
        $add = $_POST["address"];
        $soc = implode(",", $_POST["socie"]);

        $query = "insert into STUDENT_INFORMATION values('$name','$roll','$email','$age','$gender','$course','$add','$soc','$target_file')";

        $result = mysqli_query($db, $query);
        if ($result === TRUE) {
            echo "<script>alert('New record created successfully')</script><br>";
        } else {
            echo "Error: " . $result . "<br>" . $db->error;
        }

        if ($result == TRUE) {
            $query = "select * from STUDENT_INFORMATION ";
            $row = mysqli_query($db, $query);

            if (mysqli_num_rows($row) > 0) { ?>
                <CAPTION>
                    <H2>STUDENT DATABASE</H2>
                </CAPTION>
                <TABLE class="table">

                    <TR class="row">
                        <TH>Name</TH>
                        <TH>Roll Number</TH>
                        <TH>Email</TH>
                        <TH>Age</TH>
                        <TH>Gender</TH>
                        <TH>Socieity</TH>
                        <TH>Course</TH>
                        <TH>Address</TH>
                        <TH>Image</TH>
                    </TR>
                    <?php while ($i = mysqli_fetch_assoc($row)) { ?>
                        <TR class="row">
                            <TD class="td"> <?PHP echo $i["roll_no"] ?> </td>
                            <TD class="td"> <?PHP echo $i["name"] ?> </td>
                            <TD class="td"> <?PHP echo $i["email"] ?> </td>
                            <TD class="td"> <?PHP echo $i["age"] ?> </td>
                            <TD class="td"> <?PHP echo $i["gender"] ?> </td>
                            <TD class="td"> <?PHP echo $i["SOCIETIES"] ?> </td>
                            <TD class="td"> <?PHP echo $i["COURSE"] ?> </td>
                            <TD class="td"> <?PHP echo $i["Address"] ?> </td>
                            <TD class="td"> <img src="<?PHP echo $i["image"] ?>" width="50px" height="50px"> </td>
                        </TR>
                    <?php } ?>
                </TABLE>
    <?php }
        }
    } ?>
</body>

</html>