<?php 
include "connectdb.php";

$id = $_GET['id'];

$sql = "SELECT * FROM welcome WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$gender = $row['gender'];
?>
	<form action="update.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<p>Enter Value for update</p>
	
	Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
	E-mail: <input type="text" name="email" value="<?php echo $email; ?>"><br>
	Gender :
	<input type="radio" name="upt" value="male" <?php if($gender == 'male') echo "checked";?> >Male<br>
	<input type="radio" name="upt" value="female"  <?php if($gender == 'female') echo "checked";?> >Female<br>
	<br>
	<input type="submit" value="Enter">
	</form>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")  
{
	$chkVal= $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$upt = $_POST['upt']; 
	print_r($chkVar);

	$sql= "UPDATE welcome SET name='".$name."', email='".$email."',  gender='".$upt."' WHERE id='".$chkVal."' ";
	
		if ($conn->query($sql) === TRUE) {
	     header('Location: sqlprint.php?msg=Record '.$chkVal.' Updated Successfully');
		} else {
		   header('Location: sqlprint.php?msg=No Record Updated' . $conn->error);	    
		}
	}
?>