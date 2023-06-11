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

    $query = "SELECT * FROM event WHERE Name like '%$search%'";

    $result = $db->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo  $row["EVENT_ID"] . "  " . $row["EVENT_DATE"] . "  " . $row["EVENT_TIME"] . " " . $row["EVENT_LOCATION"] . " " . $row["Name"] . "<br>";
        }
    } else {
        echo "0 records";
    }


    ?>
</body>

</html>
