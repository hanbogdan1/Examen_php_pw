<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "pass";
		
		$GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);

		$nume_rezervare = $_POST['nume_rezervare'];
		$loc = $_POST['loc'];
        $nume_persoana = $_POST['nume_persoana'];
        
		if (!$GLOBALS['conn']) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM rezervare WHERE nume_rezervare like '$nume_rezervare' and loc ='$loc'";
		$result = mysqli_query($GLOBALS['conn'], $sql);
        
        echo "LOCUL A FOST DEJA ALES";
		if (mysqli_num_rows($result) > 0) {
			echo "LOCUL A FOST DEJA ELES";
		
		}		
        else {

		  $sql = "INSERT INTO rezervare (nume_rezervare, nume_persoana, loc ) VALUES ('$nume_rezervare', '$nume_persoana', '$loc')";
		  $result = mysqli_query($GLOBALS['conn'], $sql);
        }
  		include "formular.php";
		mysqli_close($GLOBALS['conn']);
?>