<?php

   $db = mysqli_connect("localhost", "group20admin", "ScienceThought", "group20");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM user_m WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $myusername;
         header("Location: maintanace.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      <?php	
	# Open the database
	$handle = mysqli_connect( $_SERVER['DOCUMENT_ROOT'].'stats.db', 0666, $sqliteError ) or die(  $sqliteError  );

	# Set the command to create a table
	$sqlCreateTable = "CREATE TABLE stats(page text UNIQUE, ip text, views UNSIGNED int DEFAULT 0, referrer text DEFAULT '')";

	# Execute it
	mysqli_kill( $handle, $sqlCreateTable );
	
	# Print that we are done
	echo 'Finished!';
?>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "text" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
   </body>
</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type='text/javascript'> 
$(function() {
	// Set the data text
	var dataText = 'page=<?php echo $_SERVER['REQUEST_URI']; ?>&referrer=<?php echo $_SERVER['HTTP_REFERER']; ?>';

	// Create the AJAX request
	$.ajax({
		type: "POST",                    // Using the POST method
		url: "/process.php",             // The file to call
		data: dataText,                  // Our data to pass
		success: function() {            // What to do on success
			$('#complete').html( 'Your page view has been added to the statistics!' );
		}
	});
});
</script>