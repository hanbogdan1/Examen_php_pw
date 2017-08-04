<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "pass";
		
		$GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);

		$nume_rezervare = $_POST['nume_rezervare'];
		$time = $_POST['time'];
        $data = $_POST['data'];
        
		if (!$GLOBALS['conn']) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM spectacol WHERE nume = '$nume_rezervare'";   
		$result = mysqli_query($GLOBALS['conn'], $sql);
        //
        //if ($result){
            echo "LOCUL A FOST DEJA ALES";
            if (mysqli_num_rows($result) > 0) {
                echo "LOCUL A FOST DEJA ELES";

            }		
            else {

              $sql = "INSERT INTO spectacol (nume, time, data ) VALUES ('$nume_rezervare', '$time', $data'";
              $result = mysqli_query($GLOBALS['conn'], $sql);
            }
       // }
  		include "afisare.php";
		mysqli_close($GLOBALS['conn']);
?>