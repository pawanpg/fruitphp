<?php 
 	include "include/congif.php";

	$name=$email=$password= "";
	$err=$nameerr=$emailerr=$passerr=$cpasserr="";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["name"])) {
			$nameerr = "<br>Name is required";
		}else 
			$name = test_input($_POST["name"]);
			// check if name is proper pattern or not
		if (!preg_match("/^[a-z A-Z]*$/",$name)) {
			$nameerr = "<br>Only Letter and spaces are allowed";
		}

		if (empty($_POST["email"])) {
		    $emailerr = "<br>Email is required";
		} else {
		    $email = test_input($_POST["email"]);
		    // check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $emailerr = "<br>Invalid email format is used "; 
		    }
		  }  
		if (empty($_POST["password1"])) {
			$passerr = "<br>password is required";
		}else if (($_POST["password1"])!= $_POST["password2"]) {
			$cpasserr = "<br>Confirm Password does not match";
		} 
		else {
			$password = test_input($_POST["password2"]);
			if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,10}$/', $password)) {
   				$passerr ="<br>the password does not meet the requirements!";
				}
			}
		$err=$emailerr.$nameerr.$passerr.$cpasserr;	

	}
	else
	{
		header('location: index.php');
		exit();
	}

	//If No Errors insert into db else redirect and show error on form page
	
	if($err == "")
	{	
		
		$check = "SELECT * FROM website WHERE email='$email'";
		$result = mysqli_query($conn, $check);
		if (mysqli_num_rows($result) > 0) {

				header('location: register.php?msg= This Email is already exist');
				exit();
			}	
			
		$sql = "INSERT INTO website(name , email , password) VALUES ('".$name."', '".$email."', '".$password."')";

		if ($conn->query($sql) === TRUE) {
			 $last_id = $conn->insert_id;
		    header('location: login.php?msg1=Account created successfully');
		    // echo "New record created successfully <br/> Id Of Last Entery =".$last_id;

		} else {
		    echo "<br/>Error: " . $sql . "<br>" . $conn->error;
		}

	}
	else
	{
		header('location: register.php?name='.$name.'&email='.$email.'&password='.$password.'&nameerr='.$nameerr.'&emailerr='.$emailerr.'&passerr='.$passerr.'&cpasserr='.$cpasserr.'');
	}
	

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		
		return $data;
	}
?>