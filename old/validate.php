<!DOCTYPE HTML>
<html>  
<body>

<form action="welcome.php" method="post" >
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
gender :
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female<br>
<br>
<input type="submit" value="Register">
</form>
</body>
</html>
<?php 
 	$name=$email=$gender= "";
	$nameErr=$emailErr=$genderErr= "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["name"])) {
			$nameErr = "Name is reuired";
		}else 
			$name = test_input($_POST("name"));
			// check if name is proper pattern or not
		if (!preg_match("/^[a-zA-Z]*$/",$name)) {
			$nameErr="Only Letter & spaces are allowed";
		}

		if (empty($_POST["email"])) {
		    $emailErr = "Email is required";
		} else {
		    $email = test_input($_POST["email"]);
		    // check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $emailErr = "Invalid email format"; 
		    }
		  }
		if (empty($_POST["gender"])) {
		  		$genderErr= "Gender is reuired";	
		}	else {
			$gender = test_input($_POST["gender"]);
		}  	
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>