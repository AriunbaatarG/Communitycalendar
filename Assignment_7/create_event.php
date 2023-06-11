<html>

<head>
    <title>Create an event</title>
</head>

<body>
    <?php
    $db = mysqli_connect("localhost", "group20", "mootbryan", "group20");
    if (mysqli_connect_error()) {
        echo "failed to connect to my sql" . mysqli_connect_error();
    }


    $query = mysqli_query($connection, "SELECT EVENT_DATE, EVENT_TIME, EVENT_LOCATION FROM event WHERE EVENT_DATE = '$EVENT_DATE' AND EVENT_TIME = '$EVENT_TIME' EVENT_LOCATION='$EVENT_LOCATION'");
    $count = mysqli_num_rows($query); //counting the number of returns

    //if the $count = 1 or more return true else return false
    if ($count >= 1) {
        return "event exists";;
    } else {
        $count_query = "SELECT * FROM event";
        $count_result = mysqli_query($db, $count_query);
        $count = mysqli_num_rows($count_result) + 1;
        $query = "INSERT INTO event (EVENT_ID, EVENT_DATE, EVENT_TIME, EVENT_LOCATION, Name) 
        VALUES ('$count','$_POST[EVENT_DATE]','$_POST[EVENT_TIME]', '$_POST[EVENT_LOCATION]', '$_POST[EVENT_NAME]')";
        if (!mysqli_query($db, $query)) {
            die('Error: ' . mysqli_error($db));
        }
        echo "1 record added successfully";
    }

    //connect to database


    ?>
</body>

</html>
