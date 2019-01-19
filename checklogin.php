<?php 
	include './include/congif.php';

	$email = $_POST['email'];
	$password = $_POST['password'];
	$err="";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(empty($email))
		{
			$err= $err."<br/> Enter your Email ";
		} else {
		    $email = test_input($_POST["email"]);
		    // check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $err = $err."<br>Enter Valid Email "; 
		    }
		}  
		

		 if(empty($password))
		{	
			$err = $err."<br/> Enter your password ";
		} else {

			$password = test_input($_POST["password"]);
			if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,10}$/', $password)) {
   				$err = $err."<br/>Enter Valid password";
				}
			}


		if ($err=="") {
		
		  
			$sql = "SELECT * FROM website WHERE email = '".$email."' AND password = '".$password."' ";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($res);
				$uname= $row['name'];	
			if ($result=mysqli_query($conn,$sql))
			{

			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  if (!empty($rowcount))
				{ 
					$_SESSION['username'] = $email;
			   	 	header('location: dashboard.php?uname='.$uname.''); 			   	 	
				}
				else {
					unset($_SESSION['username']);
				header('location: login.php?email='.$email.'&msg=Email or Password is Incorrect');}

			} 
			else
			{
				 echo "<br/>Error: " . $sql . "<br>" . $conn->error;
			}
		    
		} else {
				header('location: login.php?email='.$email.'&msg='.$err.'');
	
		}
	}

	else
	{
		
		header('location: index.php');
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>