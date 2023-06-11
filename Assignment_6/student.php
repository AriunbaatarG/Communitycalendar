<html>
    <head>
        <title>Sign up Event</title>
    </head>

    <body>
        <?php
        //connect to database
        $db = mysqli_connect("localhost","group20", "mootbryan", "group20");
        if (mysqli_connect_error()) {
            echo "failed to connect to my sql" . mysqli_connect_error();
        }

        $count_query = "SELECT * FROM student";
        $count_result = mysqli_query($db, $count_query);
        $count = mysqli_num_rows($count_result) + 1;
        $query = "INSERT INTO event (name, matriculation_number, email, phone_number) 
        VALUES ('$count', '$_POST[name]','$_POST[matriculation_number]','$_POST[email], '$_POST[phone_number]'')";
        if(!mysqli_query($db, $query)) {
            die('Error: ' . mysqli_error($db));
        }
        echo "1 record added successfully";
        ?>
    </body>
</html>