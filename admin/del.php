<?php 
 	include "../include/congif.php";
 	$id = $_GET['id'];
	$sql= "UPDATE ftrial SET deletee=1 WHERE id='".$id."' ";
	 $sq = "SELECT * FROM ftrial WHERE id='".$id."'";
    $result = mysqli_query($conn, $sq);
    $row = mysqli_fetch_assoc($result);

    $fname = $row['fname'];

 	
 	if ($conn->query($sql) === TRUE) {
	     header('Location: tables.php?msg1=Record '.$fname.' deleted Successfully');
	} else {
		  header('Location: tables.php?msg1=No Record deleted' . $conn->error);	    
		}


?>
	