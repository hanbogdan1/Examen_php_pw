DELETE FROM table_name [WHERE Clause]

<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "final";

	$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$nume_rezervare = $_GET['nume'];
   $descriere = $_GET['descriere'];
    $pret = $_GET['pret'];
        
	$sql = "delete FROM produse where WHERE nume ='$nume_rezervare' and descriere ='$descriere' and pret = '$pret'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

include "admin_interface.php";

?>  