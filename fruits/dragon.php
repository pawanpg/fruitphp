<?php include '../include/indexheader.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dragons</title>
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

  		
	    <div class="column">
	  		<div class="panel panel-info">	
	      	<div class="panel-heading">Yellow Dragon Fruit</div>
	      	<div class="panel-body">
	      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/dragon/yellowdragon.jpeg" alt="Yellow"><br/>
	      		<span>Rate</span></center>	
	      	</div>
	      	<div class="panel-footer">
	      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
	      	</div>
	    	</div>
	    </div>	
    	
    <div class="column">
  		<div class="panel panel-info">	
      	<div class="panel-heading">Red Dragon Fruit</div>
      	<div class="panel-body">
      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/dragon/reddragon.jpg" alt="Red"><br/>
      		<span>Rate</span></center>
      	</div>
      	<div class="panel-footer"> 
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
      	</div>
    	</div>
    </div>	
    <div class="column">
  		<div class="panel panel-info">	
      	<div class="panel-heading">Dragon Fruit</div>
      	<div class="panel-body">
      		<center><img id="imgpad" src="<?php echo $url;?>/dist/img/fruits/dragon/dragon.jpg" alt="Regular"><br/>
      		<span>Rate</span></center>
      	</div>
      	<div class="panel-footer"> 
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
      	</div>
    	</div>
    </div>

	</div>

	



	</div>
</div>


 </body>
</html>
<?php include '../include/indexfooter.php';?>