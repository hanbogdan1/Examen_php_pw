<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "pass";
	    $GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $db_name);

	if (!$GLOBALS['conn']) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$return_arr = array();
	
        
	$sql = "SELECT * from spectacol"; 

	$result=mysqli_query($GLOBALS['conn'],$sql);


	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$row_array['nume'] = $row['nume'];
	    $row_array['time'] = $row['time'];
        $row_array['data'] = $row['data'];
	    array_push($return_arr,$row_array);
	}

	echo json_encode($return_arr);
	mysqli_close($GLOBALS['conn']);
?>  