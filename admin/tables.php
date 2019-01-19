<?php
include "./include/adminindexheader.php";



?>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4> <strong> FRUIT INVENTERY </strong>
                          
                              </h4>
                       
                          <?php if(isset($_GET['msg']))
                              {
                                echo '<h4><span style="color:#24b;">'.$_GET['msg']. '</span></h4>';
                              } 
                              if(isset($_GET['msg1']))
                              {
                                echo '<h3><span style="color:red;">'.$_GET['msg1']. '</span></h3>';
                              } 
                              ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Fruit name</th>
                                        <th>Fruit-type</th>
                                        <th>Price</th>
                                        <th>Weght</th>
                                        <th>Discription</th>
                                        <th>Image</th>
                                        <th>Update</th>
                                        <th>Delete Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php
                                         
                                    $sql = "select f.id, f.fname, f.fprice,f.fweight, f.fdis, f.fimg, ft.type  from ftrial f JOIN fruit_type ft ON f.ftype = ft.id WHERE f.deletee = 0";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                            
                                     while($row = mysqli_fetch_assoc($result)) {
              
                                       echo"<tr>"; 
                                       echo " <td> " . $row["fname"]. "</td><td> " 
                                       .$row['type']."</td><td> " 
                                       .$row["fprice"]."</td><td>"
                                       .$row["fweight"]."</td><td>"
                                       .$row["fdis"]."</td><td>"
                                       .$row["fimg"]."</td><td>"
                                       ."<a href='updatefruit.php?id=".$row["id"]."'>Update</a>"."</td><td>"
                                       ."<a href='del.php?id=".$row["id"]."'>delete</a>"."</td>";
                                       echo "</tr>" ;
                                    }
                                    echo "</table>";
                                    } else {
                                    echo "0 results";
                                    }

                                ?>    
                                   
                                </tbody>
                            </table>
                        </div>
                        <div  class="btn"  >
                        <form action="<?php echo $url;?>admin/excel.php" style="float: right;"method="post">
                                  <button type="submit" id="btnExport" name='export'
                                      value="Export to Excel" class="btn btn-info">Download
                                      Excel File</button>
                              </form>
                              <div class="col-lg-4">
                               <form action="<?php echo $url;?>admin/pdf.php" method="post">
                                  <button type="submit" id="btnExport" name='export'
                                      value="Export to Excel" class="btn btn-info">Download
                                      PDF File</button>
                              </form>
                            </div>
                            </div>
                    </div>
                </div>  
            </div>      




<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<?php include "./include/adminindexfooter.php";

?>
