<?php
include "./include/adminindexheader.php";


    if(isset($_GET['msg']))  
        echo '<h3><span style="color:#24b;">'.$_GET['msg']. '</span></h3>'; 

        $fname=$ftype=$fprice=$fdis=$fimg=$fromtype= "";
        $nameerr=$typeerr=$priceerr=$weighterr=$diserr= "";
        if(isset($_GET['fname']))
          $fname=$_GET['fname'];
        if(isset($_GET['ftype']))
          $ftype=$_GET['ftype'];
        if(isset($_GET['fromtype'])) 
          $fromtype=$_GET['fromtype'];
        if(isset($_GET['fprice']))
          $fprice=$_GET['fprice'];
        if(isset($_GET['fdis']))
          $fdis=$_GET['fdis'];
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


?>          
<title>Entry Page</title>
<head><script>
      function showHint(str) 
      {
            var id = str.getAttribute('id');   
            var value = str.value;
                if (id == 'fname') 
                {
                   var textHint = 'fnameHint';
                   var  url = "fnamehint.php?q="+value;
                }
                else if (id == 'ftype') 
                {
                   var textHint = 'ftypeHint';
                   var  url = "ftypehint.php?q="+value;
                }
                //alert('id= ' +id+'  value='+value );
            if (str.length == 0)
            { 
                document.getElementById(textHint).innerHTML = "";
                return;
            } 
            else 
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                          document.getElementById(textHint).innerHTML = this.responseText;
                    }
                }
                    xmlhttp.open("GET", url , true);
                    xmlhttp.send();
                   
              }    
      }
</script>
</head>

			<div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Fruit Entry</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      Enter Fruit info
                  </div>
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-lg-6">
                            <form action="admindb.php" method="POST" role="form" enctype="multipart/form-data" >
                              <div class="form-group">
                                <label>Fruit Name</label>
                                <span style="color:red;"><?php echo $nameerr; ?></span>
                                <input  type="text" id="fname" name="fname" onkeyup="showHint(this)" value="<?php echo $fname; ?>"  class="form-control">
                                <span id='fnameHint'></span> 
                              </div>
                              <div class="form-group">
                                <label>Fruit Type</label>
                                <a href="#" id="btnaddtype">Click to Add New Type</a>
                                <span style="color:red;"><?php echo $typeerr; ?></span>
                                <select name="fromtype"  id="fromtype" class="form-control" >
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
                                <div class="form-group" id="ftype" style="display: none;">
                                    <input name="ftype" id="ftype" onkeyup="showHint(this)" class="form-control" value="<?php echo $ftype; ?>" placeholder="Like Mango">
                                    <span id='ftypeHint'></span>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label>Price</label>
                                  <span style="color:red;"><?php echo $priceerr.$weighterr; ?></span><br>
                                  <input name="fprice" value="<?php echo $fprice;?>" class="form-control" >
                                  <input type="radio" name="fweight" value="kg">kg&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="fweight" value="dozon">dozon&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="fweight" value="piece">piece&nbsp;&nbsp;&nbsp;
                                  <input type="radio" name="fweight" value="packet">packet
                              </div>
                              <div class="form-group">
                                  <label>Discription</label>
                                  <span style="color:red;"><?php echo $diserr; ?></span>
                                  <textarea name="fdis" class="form-control" rows="3"><?php echo $fdis;?></textarea>
                              </div>
                              <div class="form-group"  name="fimg">
                                  <label>Upload image</label>
                                  <input type="file" name="fileToUpload" id="fileToUpload">
                              </div>
                              <div class="form-group"><br/>
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
<script type="text/javascript">
  $( "#btnaddtype" ).click(function() {
     $("#fromtype").toggle();
     $("#ftype").toggle();
   
    // $('#btnaddtype').text('Select From Types');
    
    
  });
</script>