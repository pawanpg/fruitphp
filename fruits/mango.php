<?php include '../include/indexheader.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mangoes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">

  </style>
</head>
<body>
 
<div class="container-fluid">
	<div class="panel-group">
	<div class="row">
<?php
                                         
     $sql = "select f.id, f.fname, f.fprice, f.fweight, f.fdis, f.fimg, ft.type  from ftrial f JOIN fruit_type ft ON f.ftype = ft.id WHERE f.deletee = 0 AND ft.type='Mango'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {

                            $id = $row['id'];
                            $fname = $row['fname'];
                            $ftype = $row['type'];
                            $fprice = $row['fprice'];
                            $fweight = $row['fweight'];
                            $fdis = $row['fdis'];
                            $fimg = $row['fimg']; 
       ?>       
  
    <div class="column">
  		<div class="panel panel-info">	
      	<div class="panel-heading"><?php echo $fname; ?></div>
      	<div class="panel-body">
      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/mango/kesar.jpg" alt="kesar"><br/>
      		<h4 ><?php echo $ftype; ?></h4></center>	
      	</div>
      	<div class="panel-footer">
         <h4 > <?php echo $fprice.'/'.$fweight; ?></h4>
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
       <center><h4> <?php echo $ftype.' :'.$fdis; ?></h4></center>
      	</div>
    	</div>
    </div>	
    	<?php }}?>
    <!-- <div class="column">
  		<div class="panel panel-info">	
      	<div class="panel-heading">Dashari</div>
      	<div class="panel-body">
      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/mango/dashari.jpg" alt="Dashari"><br/>
      		<span>Rate</span></center>
      	</div>
      	<div class="panel-footer"> 
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
      	</div>
    	</div>
    </div> -->	

	</div>
<!-- Row2 -->
	<!-- <div class="row">

  	<div class="column">
  		<div class="panel panel-info">	
      	<div class="panel-heading">Alphanso(Ratnagiri)</div>
      	<div class="panel-body">
      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/mango.jpg" alt="Alphanso"><br/>
      		<span>Rate</span></center>	
      	</div>
      	<div class="panel-footer">
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
      	</div>
    	</div>
    </div>		
    <div class="column">
  		<div class="panel panel-info">	
      	<div class="panel-heading">Kesar(Zunagad)</div>
      	<div class="panel-body">
      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/mango.jpg" alt="kesar"><br/>
      		<span>Rate</span></center>	
      	</div>
      	<div class="panel-footer">
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
      	</div>
    	</div>
    </div>	
    	
    <div class="column">
  		<div class="panel panel-info">	
      	<div class="panel-heading">Dashari</div>
      	<div class="panel-body">
      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/mango.jpg" alt="Dashari"><br/>
      		<span>Rate</span></center>
      	</div>
      	<div class="panel-footer"> 
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
      	</div>
    	</div>
    </div>	

	</div> -->



	</div>
</div>

</body>
</html>
<?php include '../include/indexfooter.php';?>