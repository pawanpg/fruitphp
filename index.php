<?php include 'include/indexheader.php'; ?>
 
 <div class="row">
    <div class="container-fluid">
    <div class="col-lg-12">
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="./dist/img/fruits/mango.jpg"  alt="Mango" style="width:100%; height:80vh;">
        <div class="carousel-caption">
           <h3>Yummy Mangoes</h3>
           <h4>From Ratnagiri</h4>
        </div>
      </div>

      <div class="item">
        <img src="./dist/img/fruits/custard-apple.jpg" alt="Custard" style="width:100%; height: 80vh;">
        <div class="carousel-caption">
          <h3>Creamfull Custard-Apple</h3>
          <h4>From Rajsthan</h4>
        </div>
      </div>
    
      <div class="item">
        <img src="./dist/img/fruits/grapes.jpeg" alt="Grapes" style=" width:100%; height: 80vh;">
        <div class="carousel-caption">
          <h3>Sweet and Juicy Grapes</h3>
          <h4>From Nashik</h4>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
      </div>
    </div>
     </div>   

<div class="row">
 <?php
                                         
     $sql = "SELECT * FROM fruit_type";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {

                             $id = $row['id'];
                             $ftype = $row['type'];
                             $timg = $row['timg'];

                          
       ?>       
  
    <div class="column">
     
        
        <div class="panel-body">
        <center><a href='<?php echo $url;?>fruits.php?typeid=<?php echo $ftype;?>'>
            <img id="imgpad" src="<?php echo $url.ltrim($timg,'./');?>" alt=""><br/>
          <h4 ><?php echo $ftype; ?></a></h4></center>  
        </div>
    
    </div>  
      <?php }}?>
 
</div>

<?php include 'include/indexfooter.php';?>


