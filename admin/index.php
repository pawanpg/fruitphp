<?php 
include "./include/adminindexheader.php";

?>
<title> Admin Index</title>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome to your portal sir</h1>
                    
                </div> 
             </div>
             <h3>Last update element </h3>
              <div class="row">
                <?php
                                                     
                            $sql = "SELECT * FROM ( SELECT * FROM ftrial ORDER BY id DESC LIMIT 4 ) ftrial WHERE deletee = 0 ORDER BY id ASC  ";

                            $result = mysqli_query($conn, $sql);
                            
                            while($row = mysqli_fetch_assoc($result))
                            {
                             $sq='SELECT * FROM fruit_type WHERE id="'.$row["ftype"].'"';
                                    $resultt = mysqli_query($conn, $sq);
                                        $rw = mysqli_fetch_assoc($resultt);
                            $id = $row['id'];
                            $fname = $row['fname'];
                            $ftype = $rw['type'];
                            $fprice = $row['fprice'];
                            $fweight = $row['fweight'];
                            $fdis = $row['fdis'];
                            $fimg = $row['fimg']; 
   //                          $s=$row['fimg'];
   // echo $row['fimg'];

   // echo '<img src="'.$s.'" alt="HTML5 Icon" style="width:128px;height:128px">';
                        ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">

                                    <div class="panel-heading">
                                        <div class="row">
                                          <center><h4 style=" color:brown; "> <?php echo $ftype; ?></h4></center>
                                           <center><img src="<?php echo $url;?>/dist/img/fruits/dragon.jpg" style="width:100px; height:100px;" alt="Dragon"></center> 
                                            <h4 style=" color:black; "><?php echo $fname; ?></h4>     
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left"> <h4 style=" color:black; "><?php echo $fprice.'/'.$fweight ;?></h4></span>
                                            <a href='updatefruit.php?id=<?php echo $id; ?>'><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
            <?php } ?>


        <div class="col-lg-6">
             <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='./tables.php'" >Show The Item List</button>

         </div>
         <div class="col-lg-6 ">
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='./form.php'" >Add New Item</button>
        </div>

       </div> 
<?php 
    include "./include/adminindexfooter.php";

?>
         

