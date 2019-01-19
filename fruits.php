<?php include './include/indexheader.php';?>


 
<div class="container-fluid">
	<div class="panel-group">
	<div class="row">
<?php
    
    $gid=$_GET['typeid'];   
                                         
    $sql = "select f.id, f.fname, f.fprice, f.fweight, f.fdis, f.fimg, ft.type  from ftrial f JOIN fruit_type ft ON f.ftype = ft.id WHERE f.deletee = 0 AND ft.type='$gid'";

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
      		<center><img id="imgpad" src="<?php echo $url.ltrim($fimg,'./');?>" ><br/>
      		<h4 ><?php echo $ftype; ?></h4></center>	
      	</div>
      	<div class="panel-footer">
         <h4 > <?php echo $fprice.'/'.$fweight; ?></h4>
      		<center><input type="submit" class="btn btn-primary" name="submit" value="Add to cart"></center>
       <center><h4> <?php echo $fname.' are '.$fdis; ?></h4></center>
      	</div>
    	</div>
    </div>	
    	<?php }}?>
    </div>
  </div>
</div>

<?php include './include/indexfooter.php';?>