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
        $query = "INSERT INTO event (location, times, FACILITY_ID, FACILITY_NAME) 
        VALUES ('$count', '$_POST[location]','$_POST[times]','$_POST[FACILITY_ID], '$_POST[FACILITY_NAME]'')";
        if(!mysqli_query($db, $query)) {
            die('Error: ' . mysqli_error($db));
        }
        echo "1 record added successfully";
        ?>
    </body>
</html>