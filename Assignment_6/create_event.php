<html>
    <head>
        <title>Create an event</title>
    </head>

    <body>
        <?php
        //connect to database
        $db = mysqli_connect("localhost","group20", "mootbryan", "group20");
        if (mysqli_connect_error()) {
            echo "failed to connect to my sql" . mysqli_connect_error();
        }

        $count_query = "SELECT * FROM event";
        $count_result = mysqli_query($db, $count_query);
        $count = mysqli_num_rows($count_result) + 1;
        $query = "INSERT INTO event (EVENT_ID, EVENT_NAME, EVENT_TIME, EVENT_LOCATION) 
        VALUES ('$count', '$_POST[EVENT_ID]','$_POST[EVENT_NAME]','$_POST[EVENT_TIME], '$_POST[EVENT_LOCATION]'')";
        if(!mysqli_query($db, $query)) {
            die('Error: ' . mysqli_error($db));
        }
        echo "1 record added successfully";
        ?>
    </body>
</html>