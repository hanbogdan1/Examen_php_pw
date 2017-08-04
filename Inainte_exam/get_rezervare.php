<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "pass";    
	    $GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);
        
        $spectacol = $_GET['nume'];

	if (!$GLOBALS['conn']) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$return_arr = array();
	$sql = "SELECT * from rezervare where nume_rezervare = '$spectacol'"; 

	$result=mysqli_query($GLOBALS['conn'],$sql);


	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$row_array['nume_rezervare'] = $row['nume_rezervare'];
	    $row_array['loc'] = $row['loc'];
        $row_array['nume_persoana'] = $row['nume_persoana'];
	    array_push($return_arr,$row_array);
	}

	echo json_encode($return_arr);
	mysqli_close($GLOBALS['conn']);
?>  