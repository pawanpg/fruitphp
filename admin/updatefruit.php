<?php 
ob_start();
include "./include/adminindexheader.php";

	if(isset($_GET['msg']))
          {
            echo '<h3><span style="color:#24b;">'.$_GET['msg']. '</span></h3>';
          } 

        $nameerr=$typeerr=$priceerr=$weighterr=$diserr= "";
        
      
      if(isset($_GET['nameerr']))
          $nameerr=$_GET['nameerr'];
      if(isset($_GET['typeerr']))
          $typeerr=$_GET['typeerr'];
      if(isset($_GET['priceerr']))
          $priceerr=$_GET['priceerr'];
      if(isset($_GET['weighterr']))
          $priceerr=$_GET['weighterr'];  
      if(isset($_GET['diserr']))
          $diserr=$_GET['diserr'];


	$id = $_GET['id'];
    $sql = "SELECT * FROM ftrial WHERE id='".$id."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $fname = $row['fname'];
    $fromtype = $row['ftype'];
    $fprice = $row['fprice'];
    $fdis = $row['fdis'];
    $fimg = $row['fimg']; 

 	


?>
	
<title>Update info page</title>

				<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Fruit Entry</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>



             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Fruit Info
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="updateresult.php" method="POST" role="form" enctype="multipart/form-data">
                                    	<input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label>Fruit Name</label><span style="color:red;"><?php echo $nameerr; ?></span>
                                            <input name="fname" value="<?php echo $fname; ?>"  class="form-control" >
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                         <div class="form-group">
                                            <label>Fruit Type</label>
                                            <span style="color:red;"><?php echo $typeerr; ?></span>
                                            <select name="fromtype" id="fromtype" class="form-control" >
                                              <option >Select Type</option>
                                            
                                            <?php 

                                                $sql='SELECT * FROM fruit_type';
                                                $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $sel = "";
                                                    if($fromtype == $row['id']) 
                                                        $sel = "selected";
                                                    echo '<option value="'.$row['id'].'"'.$sel.'>'.$row['type'].'</option>';
                                                }
                                            ?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label><span style="color:red;"><?php echo $priceerr.$weighterr; ?></span>
                                            <input  name="fprice" value="<?php echo $fprice; ?>" class="form-control">
                                          <input type="radio" name="fweight" value="kg">kg&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="fweight" value="dozon">dozon&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="fweight" value="piece">piece&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="fweight" value="packet">packet&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label>Discription</label><span style="color:red;"><?php echo $diserr; ?></span>
                                            <textarea name="fdis" class="form-control" rows="3" ><?php echo $fdis; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload image</label>

                                            <input type="file" value="<?php echo $fimg; ?>" name="fileToUpload" id="fileToUpload">
                                        </div>
                                        <div class="form-group">
                                            <br/>
                                            <input name="submit" type="submit">
                                        </div>
                                        

                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>    


<?php
include "./include/adminindexfooter.php";
?>

