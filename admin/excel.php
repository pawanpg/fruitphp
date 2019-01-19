  <?php 
  include '../include/congif.php';
   $query="select f.fname, ft.type, f.fprice, f.fweight, f.fdis, f.fimg  from ftrial f JOIN fruit_type ft ON f.ftype = ft.id WHERE f.deletee = 0";
                $exl = mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($exl)){ 
                $resultset[] = $row;
            	}


 if (isset($_POST["export"])) {
    $filename = "fruit.xls";
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($resultset)) {
      foreach ($resultset as $row) {
             if (! $isPrintHeader) {
                 echo implode("\t\t\t", array_keys($row)) . "\n\n";
                 $isPrintHeader = true;
            }
             echo implode("\t\t\t", array_values($row)) . "\n";
         }
     }
     exit();
 }

 ?>