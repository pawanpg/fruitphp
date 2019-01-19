<html>
<head><title>Here we update or delete data from databse </title>></head>

<body>
<!-- Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?> -->

<?php 
 	include "connectdb.php";

	$name=$email=$gender= "";
	
	$err="";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["name"])) {
			$err = $err."<br>Name is required";
		}else 
			$name = test_input($_POST["name"]);
			// check if name is proper pattern or not
		if (!preg_match("/^[a-zA-Z]*$/",$name)) {
			$err = $err."<br>Only Letter and spaces are allowed";
		}

		if (empty($_POST["email"])) {
		    $err = $err."<br>Email is required";
		} else {
		    $email = test_input($_POST["email"]);
		    // check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $err = $err."<br>Invalid email format is used "; 
		    }
		  }
		if (empty($_POST["gender"])) {
		  	$err = $err."<br>Gender is reuired";	
		}	else {
			$gender = test_input($_POST["gender"]);
		}  	
	}
	//If No Errors insert into db else redirect and show error on form page
	if($err == "")
	{	
		$timeid =strtotime(date('m/d/Y h:i:s A'));
		
		
		$sql = "INSERT INTO welcome (name , email , gender , timeid) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', 
		'".$_POST["gender"]."', '".$timeid."')";

		if ($conn->query($sql) === TRUE) {
			 $last_id = $conn->insert_id;
		    echo "New record created successfully <br/> Id Of Last Entery =".$last_id;

		} else {
		    echo "<br/>Error: " . $sql . "<br>" . $conn->error;
		}

	}
	else
	{
		header('location: form.php?name='.$name.'&email='.$email.'&gender='.$gender.'&msg='.$err.'' );
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}







?>

<!--  next form is print the value from the database -->

<form action="sqlprint.php" method="post" target="_blank">
 <br>
<?php echo " All the value from Database<br/>"; ?>
<input type="submit" value="See the list">
</form>
</body>
</html>