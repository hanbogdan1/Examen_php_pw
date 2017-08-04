<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "final";
	    $GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);

	if (!$GLOBALS['conn']) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$return_arr = array();

	$numar = $_GET['numar'];
        
	$sql = "SELECT * FROM produse limit $numar "; 

	$result=mysqli_query($GLOBALS['conn'],$sql);


	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$row_array['nume'] = $row['nume'];
	    $row_array['descriere'] = $row['descriere'];
        $row_array['pret'] = $row['pret'];
        $row_array['posesor'] = $row['posesor'];
	    array_push($return_arr,$row_array);
	}

	echo json_encode($return_arr);
	mysqli_close($GLOBALS['conn']);
?>  