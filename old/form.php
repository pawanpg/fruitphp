<!DOCTYPE HTML>
<html>  
<body>
<?php 
	if(isset($_GET['msg']))
	{
		echo '<span style="color:red;">'.$_GET['msg']. '</span>';
	}

$name=$email=$gender= "";
if(isset($_GET['name']))
	$name=$_GET['name'];
if(isset($_GET['email']))
	$email=$_GET['email'];
if(isset($_GET['gender']))
	$gender=$_GET['gender'];

?>
<form action="welcome.php" method="post" >
Name: <input type="text" name="name" value="<?php echo $name;?>">
<!--<span class="error">* <?php echo $nameErr;?></span>-->*<br>

E-mail: <input type="text" name="email" value="<?php echo $email;?>">
<!--<span class="error">* <?php echo $emailErr;?><br>-->*<br>
gender :
<input type="radio" name="gender" value="male" <?php if($gender == 'male') echo "checked";?> >Male
<input type="radio" name="gender" value="female" <?php if($gender == 'female') echo "checked";?> >Female
<!-- <span class="error">* <?php echo $genderErr;?><br>-->*<br>
<br>
<input type="submit" value="Register">
</form>


<form action="select.php" method="post" target="_blank">
	<br><br>
	<p>Select the Column which you want to display</p><br>
	<input type="checkbox" name="attr[]" value="name">Name<br>
	<input type="checkbox" name="attr[]" value="email">Email<br>	
	<input type="checkbox" name="attr[]" value="gender">Gender<br>		
	<input type="submit" name="submit" value="select" >
</form>

</body>
</html>