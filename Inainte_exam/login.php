<?php
	session_start();
		    
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "pass";

		$GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);


		$username = $_POST['username'];
		$password = $_POST['password'];


		if (!$GLOBALS['conn']) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM user WHERE username='$username' AND password = '$password'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		if (mysqli_num_rows($result) > 0) {
			$_SESSION['loggedin'] = true;
  			$_SESSION['username'] = $username;
  			mysqli_close($GLOBALS['conn']);
  			header("Location: afisare.php");
		}

		else{
			echo "INVALID     USER !!!";
            include 'index.php';
			mysqli_close($GLOBALS['conn']);
		}		
    
?>