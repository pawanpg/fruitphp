<?php 
ob_start();
 	include "../include/congif.php";


$fname=$fprice=$fweight=$fdis=$fimg= "";
$fromtype=$_POST["fromtype"];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	
		$nameerr=$err=$typeerr=$priceerr=$weighterr=$diserr="";

		if (empty($_POST["fname"]))
			{
				$nameerr ="<br> Enter Name";
		}else {
				$fname = test_input($conn,$_POST["fname"]);
				// check if name is proper pattern or not
				if (!preg_match("/^[a-z A-Z]*$/",$fname)) {
					$nameerr = "<br>Please give proper name";
				}
		}
		if (!preg_match("/^[0-9]*$/",$fromtype)) {
					$typeerr = "<br>Please select type";
		}
		   
		if (empty($_POST["fprice"]))
		{
			$priceerr = "<br>Enter Price";
		}else {
			$fprice = test_input($conn,$_POST["fprice"]);
			// check if name is proper pattern or not
			if (!preg_match("/^[0-9]*$/",$fprice)) {
			$priceerr = "<br>Enter value in digits";
			}
		}

		if (empty($_POST["fweight"]))
		{
			$weighterr = "<br>Select Weight type";
		}else {
			$fweight = test_input($conn,$_POST["fweight"]);
			// check if name is proper pattern or not
			if (!preg_match("/^[a-zA-Z]*$/",$fweight)) {
			$weighterr = "<br>Access denied";
			}
		}


		if (empty($_POST["fdis"]))
		{
			$diserr = "<br>Please add some discription";
		}else {
			$fdis = test_input($conn,$_POST["fdis"]);
			// check if name is proper pattern or not
			if (!preg_match("/^[0-9a-z ,. A-Z]*$/",$fdis)) {
			$diserr ="<br>Type correctly";
			}
		}

		$err=$nameerr.$priceerr.$weighterr.$typeerr.$diserr;

		//---------------------IMAGE CODE -----------------------
			$getid ="SELECT * FROM fruit_type WHERE id='".$fromtype."' "; 
					$result = mysqli_query($conn, $getid);
					$row = mysqli_fetch_assoc($result);
					$utype= $row['type'];	
			$target_dir = "../images/".$utype."/";
			if (!file_exists($target_dir)) {
			    mkdir($target_dir, 0777, true);
			}
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			//echo '<br>IMAGE: '.$target_file.'<br>';
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			      //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}




		//---------------------IMAGE CODE ENDS----------------------


	}	
	 else
	 {
 		header('location: adminlogin.php?msg= Access denied');
	  	exit();
	 }
	

	//If No Errors insert into db else redirect and show error on form page
	
	if($err == "")
	{	
		$chkVal= $_POST['id'];
		 $check = "SELECT * FROM ftrial WHERE fname='$fname' AND ftype='$fromtype' AND id != '$chkVal'  ";
		 $result = mysqli_query($conn, $check);
		 if (mysqli_num_rows($result) > 0) {

				header('location: updatefruit.php?msg= This Fruit name is already exist &id='.$chkVal.' ');
		 		exit();
		}


		
		$sql= "UPDATE ftrial SET fname='".$fname."', ftype='".$fromtype."',  fprice='".$fprice."',fweight='".$fweight."', fdis='".$fdis."' , fimg='".$target_file."' WHERE id='".$chkVal."' ";
		echo $sql;
      		if ($conn->query($sql)) {
		    header('Location: tables.php?msg='.$fname.' Information Updated ');
			 } else {
			   header('Location: tables.php?msg=No Record Updated' . $conn->error);	    
			 }
			

	}else
	{
		header('location: updatefruit.php?id='.$_POST['id'].'&nameerr='.$nameerr.'&priceerr='.$priceerr.'&weighterr='.$weighterr.'&typeerr='.$typeerr.'&diserr='.$diserr.'');
	}

	function test_input($conn, $data)
	{

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = mysqli_real_escape_string($conn,$data);

		return $data;
	}



?>