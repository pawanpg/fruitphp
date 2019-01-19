<?php 
	include "../include/congif.php";
 

	$err="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
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
			$err = $err."<br/> Please enter password ";
		} else {

			$password = test_input($_POST["password"]);
			if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,10}$/', $password)) {
   				$err = $err."<br/>>Enter Valids password";
				}
			}


		if ($err=="") {
		
		  
			$sql = "SELECT * FROM admindb WHERE email = '".$email."' AND password = '".$password."' ";
			if ($result=mysqli_query($conn,$sql))
			{
			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  if (!empty($rowcount))
				{ 
					$_SESSION['username'] = $email;
			   	 	header('location: index.php'); 			   	 	
				}
				else {
					unset($_SESSION['username']);
				header('location: adminlogin.php?email='.$email.'&msg=Email or Password is Incorrect');}

			} 
			else
			{
				 echo "<br/>Error: " . $sql . "<br>" . $conn->error;
			}
		    
		} else {
				header('location: adminlogin.php?email='.$email.'&msg='.$err.'');
	
		}
	}
	else
	{
		header('location: adminlogin.php?msgadmincheck=Access ggg Denied !!');
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	



	//set session variables for login
	// $_SESSION['login'] = true , $_SESSION['email'] = 'pawan@gmail.com'
?>