<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "final";
		
		$GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);

		$nume_rezervare = $_POST['nume'];
		$descriere = $_POST['descriere'];
        $pret = $_POST['pret'];
//        $user = $_SESSION['username'];
        $user = "user";
		if (!$GLOBALS['conn']) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM produse WHERE nume =     '$nume_rezervare' and descriere ='$descriere'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
        
		if (mysqli_num_rows($result) > 0) {
			echo "Produs deja exista";
		
		}		
        else {

		  $sql = "INSERT INTO produse (nume, descriere, pret, posesor ) VALUES ('$nume_rezervare', '$descriere', '$pret', '$user' )";
		  $result = mysqli_query($GLOBALS['conn'], $sql);
        }
  		include "admin_interface.php";
		mysqli_close($GLOBALS['conn']);
?>