<?php
include "./include/adminindexheader.php";



?>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4> <strong> Deleted fruit info </strong></h4>
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
                                        <th>Discription</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM ftrial WHERE deletee=1";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                
                                    while($row = mysqli_fetch_assoc($result)) {

                                      
                                      $sq='SELECT * FROM fruit_type WHERE id="'.$row["ftype"].'"';
                                        $resultt = mysqli_query($conn, $sq);
                                        $rw = mysqli_fetch_assoc($resultt);
                                         

                                       echo"<tr>";
                                       echo " <td> " . $row["fname"]. "</td><td> " 
                                       .$rw['type']. "</td><td> " 
                                       .$row["fprice"]. "</td><td>"
                                       .$row["fdis"]."</td><td>"
                                       .$row["fimg"]."</td>";
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
