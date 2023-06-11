<html>

<head>
    <title>Student</title>
</head>

<body>

    <?php

    $search = $_POST['search'];


    $db = mysqli_connect("localhost", "group20", "mootbryan", "group20");
    if (mysqli_connect_error()) {
        echo "failed to connect to my sql" . mysqli_connect_error();
    }

    $query = "SELECT * FROM student WHERE name like '%$search%'";

    $result = $db->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo  $row["matriculation_number"] . "  " . $row["name"] . "  " . $row["email"] . " " . $row["phone_number"] . "<br>";
        }
    } else {
        echo "0 records";
    }


    ?>
</body>

</html>
