
<!DOCTYPE html>
<html>
<head>
	<title>The value retrive from databse</title>
  <style type="text/css">
    a {
    text-decoration: none;
}
a:link, a:visited {
    color: blue;
}
a:hover {
    color: red;
}

  </style>
</head>
<body>

</body>
</html>


<!-- $servername = "localhost";
$username = "root";
$password = "";
$dbname = "pawandb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
-->
<?php
include "connectdb.php";
$sql = "SELECT id, name, email, gender FROM welcome";
$result = mysqli_query($conn, $sql);

if(isset($_GET['msg']))
  {
    echo '<br/>'.$_GET['msg'].'<br/>';
  }

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table border='1', border-collapse='collapse' >";
    while($row = mysqli_fetch_assoc($result)) {
    	echo"<tr>";
       /* echo " Id Number : " . $row["id"]. "<br> Your Name: " . $row["name"]. "<br> Email-id : " . $row["email"]. "<br> Gender :".$row["gender"]."<br><br>"; */
       echo " <td> " . $row["id"]. "</td><td> " 
       .$row["name"]. "</td><td> " 
       .$row["email"]. "</td><td>"
       .$row["gender"]."</td><td>"
       ."<a href='del.php?id=".$row["id"]."'>delete</a>"."</td><td>"
       ."<a href='update.php?id=".$row["id"]."'>Update</a>"."</td>";
       echo "</tr>" ;
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>