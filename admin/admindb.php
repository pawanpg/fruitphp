<?php 
 	include "../include/congif.php";

	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$fname=$ftype=$fprice=$fweight=$fdis=$fimg="";
		$fromtype=$_POST["fromtype"];
		$nameerr=$err=$typeerr=$priceerr=$weighterr=$diserr="";
		
		if (empty($_POST["fname"]))
			{
				$nameerr ="<br> Enter Name";
		}else {
				$fname = test_input($_POST["fname"]);
				// check if name is proper pattern or not
				if (!preg_match("/^[a-z A-Z]*$/",$fname)) {
					$nameerr = "<br>Please give proper name";
				}
		}

 		

		if (empty($_POST["fprice"]))
		{
			$priceerr = "<br>Enter Price";
		}else {
			$fprice = test_input($_POST["fprice"]);
			// check if name is proper pattern or not
			if (!preg_match("/^[0-9]*$/",$fprice)) {
			$priceerr = "<br>Enter value in digits";
			}
		}

		if (empty($_POST["fweight"]))
		{
			$weighterr = "<br>Select Weight type";
		}else {
			$fweight = test_input($_POST["fweight"]);
			// check if name is proper pattern or not
			if (!preg_match("/^[a-zA-Z]*$/",$fweight)) {
			$weighterr = "<br>Access denied";
			}
		}


		if (empty($_POST["fdis"]))
			$diserr = "<br>Please add some discription";
		else {
			$fdis = test_input($_POST["fdis"]);
			// check if name is proper pattern or not
			if (!preg_match("/^[0-9a-z ,. A-Z]*$/",$fdis)) {
			$diserr ="<br>Type correctly";
			}
		}

		$err=$nameerr.$priceerr.$typeerr.$weighterr.$diserr;

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
			       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}


 

		//---------------------IMAGE CODE ENDS----------------------

		if (!preg_match("/^[0-9]*$/",$fromtype)) 
				{
					if (empty($_POST["ftype"])) 
					{
						$typeerr = "<br> Please Select type";
				 	}else {
				 		$ftype = test_input($_POST["ftype"]);
				 		// check if name is proper pattern or not
						if (!preg_match("/^[a-z A-Z]*$/",$ftype)) {
							$typeerr = "<br>Please give valid type";
						}
						$sq = "INSERT INTO fruit_type(type,timg) VALUES ('".$ftype."', '".$target_file."')";
						if ($conn->query($sq) === TRUE) {
							$getid ="SELECT * FROM fruit_type WHERE type='".$ftype."' "; 
							$result = mysqli_query($conn, $getid);
							$row = mysqli_fetch_assoc($result);
							$fromtype = $row['id'];
							$utype= $row['type'];	
						}	 
					}
					$typeerr = "<br>Please Select type";
				}


	}	
	else
	{
 		header('location: adminlogin.php?msg= Access denied');
	 	exit();
	}
	

	//If No Errors insert into db else redirect and show error on form page
	
	if($err == "")
	{	
		
		$check = "SELECT * FROM ftrial WHERE fname='$fname' AND ftype='$fromtype' AND deletee=0 ";
		$result = mysqli_query($conn, $check);
		if (mysqli_num_rows($result) > 0) {

				header('location: form.php?msg= This Fruit name is already exist');
				exit();
		}
		$sql = "INSERT INTO ftrial(fname,ftype,fprice,fweight,fdis,fimg) VALUES ('".$fname."', '".$fromtype."', '".$fprice."','".$fweight."', '".$fdis."', '".$target_file."')";

		if ($conn->query($sql) === TRUE) {
			 $last_id = $conn->insert_id;
		    header('location: form.php?msg=Information Updated Successfully ');
		    // echo "New record created successfully <br/> Id Of Last Entery =".$last_id;

		} else {
		    echo "<br/>Error: " . $sql . "<br>" . $conn->error;
		}

	}else
	{
		header('location: form.php?fname='.$fname.'&ftype='.$ftype.'&fromtype='.$fromtype.'&fprice='.$fprice.'&fweight='.$fweight.'&fdis='.$fdis.'&fimg='.$fimg.'&nameerr='.$nameerr.'&priceerr='.$priceerr.'&weighterr='.$weighterr.'&typeerr='.$typeerr.'&diserr='.$diserr.'');
	}

	function test_input($data)
	{
		global $conn;
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = mysqli_real_escape_string($conn,$data);

		return $data;
	}
?>