<form action="del.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<input type="radio" name="del" value="1">Yes
	<input type="radio" name="del" value="0">No
	<input type="submit" name="Submit" >
</form>

<?php 
if($_SERVER['REQUEST_METHOD'] == "POST")  
{
	
	include "connectdb.php";

	$chkVal= $_POST['id'];
	$chkDel= $_POST['del'];
	$cnt = count($chkVal); 

	if($chkDel == 1)
	{
		$sql = "DELETE From welcome where id='".$chkVal."'";
		if ($conn->query($sql) === TRUE) {
	     header('Location: sqlprint.php?msg=Record '.$chkVal.' Deleted Successfully');
		} else {
		   header('Location: sqlprint.php?msg=Error-' . $conn->error);	    
		}
	}
	else
	{
		header('Location: sqlprint.php?msg=No Record Deleted');
	}
}
?>
	