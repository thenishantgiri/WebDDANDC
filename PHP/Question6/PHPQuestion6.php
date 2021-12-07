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
    $db = openCon();
    $query = "select * from STUDENT_INFORMATION ";
    $row = mysqli_query($db, $query);
    if (mysqli_num_rows($row) > 0) { ?>
        <CAPTION>
            <H2>Student Database</H2>
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
    <?php } ?>
</body>

</html>