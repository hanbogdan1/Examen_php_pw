<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "final";
		
		$GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);

		$username = $_POST['username'];
		$password = $_POST['password'];
        $username2 = $_POST['password2'];
        
		if (!$GLOBALS['conn']) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM user WHERE username like '$username'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
        
		if (mysqli_num_rows($result) > 0 or $username2 != $password) {
			echo "LOCUL A FOST DEJA ELES";
		
		}		
        else {

		  $sql = "INSERT INTO user (username, password ) VALUES ('$username', '$password')";
		  $result = mysqli_query($GLOBALS['conn'], $sql);
        }
  		include "index.php";
		mysqli_close($GLOBALS['conn']);
?>