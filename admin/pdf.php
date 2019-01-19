
<?php

require('../include/fpdf/fpdf.php');

class PDF extends FPDF
{
// function Header()
// {
//   //Title
//   $this->SetFont('Arial','',18);
//   $this->Cell(0,6,'Fruit Data',0,1,'C');
//   $this->Ln(10);
//   //Ensure table header is output
//   parent::Header();

// }

function Header()
	{
	    //Logo
	$name="Testing PDF Creation";
	    //Move to the right
	  //  $this->Cell(80);
	    //Title
	$this->SetFont('Arial','B',25);
	$this->Cell(0,6,"Fruit Data",0,1,'C');
	    //Line break
	   $this->Ln(10);
	}


function LoadData($file)
	{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
	$data[]=explode(';',chop($line));
	return $data;
	}

function Table($header,$data)
	{ 
	$this->SetFont('Arial','',10); 
	$this->SetFillColor(155,150,0);
	$this->SetDrawColor(128,0,0);
	$w=array(30,20,10,11,100,10,10,15,15,15,15,15);
	 
	//Header
	for($i=0;$i<count($header);$i++){
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		//$this->Ln();
	}
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
			{ //width
				//$this->Cell(30,6,$eachResult["bookstall_id"],1);
				$this->Cell(30,6,$eachResult["fname"],1);
				$this->Cell(20,6,$eachResult["type"],1);
				$this->Cell(10,6,$eachResult["fprice"],1);
				$this->Cell(11,6,$eachResult["fweight"],1);
				$this->Cell(100,6,$eachResult["fdis"],1);
				$this->Cell(10,6,$eachResult["id"],1);
				$this->Ln();
			}
	}
}	 


$pdf=new PDF();
$header=array('Name','Type','Price','Weight','Discription','Image');
include '../include/congif.php';
$sql = 'select f.id, f.fname, ft.type, f.fprice, f.fweight, f.fdis, f.fimg  from ftrial f JOIN fruit_type ft ON f.ftype = ft.id WHERE f.deletee = 0';
$objquery = mysqli_query($conn, $sql);
$resultData = array();
for ($i=0;$i<mysqli_num_rows($objquery);$i++) {
$result = mysqli_fetch_assoc($objquery);
array_push($resultData,$result); }
$pdf->AddPage();


//First table: put all columns automatically
$pdf->Table($header,$resultData);
$pdf->Output();


?>