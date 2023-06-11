<html>
    <head>
        <title>Create an Facility</title>
    </head>

    <body>
        <?php
        //connect to database
        $db = mysqli_connect("localhost","group20", "mootbryan", "group20");
        if (mysqli_connect_error()) {
            echo "failed to connect to my sql" . mysqli_connect_error();
        }
        $count_query = "SELECT * FROM FacilityOrganizer";
        $count_result = mysqli_query($db, $count_query);
        $count = mysqli_num_rows($count_result) + 1;
        
        $query = "INSERT INTO FacilityOrganizer (Times, EVENT_ID, EVENT_DATE,EVENT_LOCATION) VALUES ('$_POST[times]', '$count', '$_POST[EVENT_DATE]','$_POST[location]')";
        if(!mysqli_query($db, $query)) {
            die('Error: ' . mysqli_error($db));
        }
        echo "1 record added successfully";
        ?>
    </body>
</html>
