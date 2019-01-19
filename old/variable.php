<?php
 $x = 5;
 $y = 10;

function myTest() {
	global $y;
	static $z=5;
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y']+$z;
    echo  $y."<br>"; // outputs 15
    $z++;

} 

echo (strlen("abcdefghijklmonpqrstuvwxyz"));echo "<br>";echo "<br>";
myTest();
myTest();
myTest();
myTest();
myTest();
myTest();
myTest();
myTest();
echo "<br><br><br><br>";
?>

<!DOCTYPE html>
<html>
<body>

<?php
function mywork() {
   static $x = 0;
    echo $x;
    $x++;
}

mywork();
echo "<br>";
mywork();
echo "<br>";
mywork();
echo "<br>";
myTest();
?> 

</body>
</html>