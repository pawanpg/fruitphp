<?php
include "connectdb.php";
$chkVar = $_POST['attr'];
$cnt = count($chkVar);


//print_r($chkVar); 
$colName='';
for($i=0 ; $i<$cnt ;$i++)
{
	$colName= $colName.",".$chkVar[$i]; 
}
	$colName=ltrim($colName,",");

	
	$sql= "SELECT ".$colName." FROM welcome";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0)
	{
		echo "<table border='1', border-collapse='collapse' ";
		while( $row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			if(isset($row["name"]))
				echo "<td>".$row["name"]."</td>";

			if(isset($row["email"]))
				echo "<td>".$row["email"]."</td>";

			if(isset($row["gender"] ))
				echo "<td>".$row["gender"]."</td>";
			echo "</tr>";
			if(isset($row[" "]))
				echo "You are select nothing";
		}
		echo "</table>";
	}
	?>