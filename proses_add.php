<?php 
include('config.php');
$koneksi = new database();
 
$action = $_GET['action'];
if($action == "add"){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$idcard = $_POST['idcard'];
	$loanamount = $_POST['loanamount'];
	$loanperiode = $_POST['loanperiode'];
	$loanpurpose = $_POST['loanpurpose'];
	$birth = strtotime($_POST['birth']);
	$date = date("Y-m-d h:i:sa", $birth);
	$birthid = date("dmY", $birth);
	$sex = $_POST['sex'];
	
	if($firstname == "" || $lastname == ""){
		header("location:add.php?nama=empty");
	}else if(preg_match("/^[a-z0-9_-]{1,6}(0[1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])[0-9]{4}[a-z0-9_-]{1,4}$/",$idcard)){
		header("location:add.php?ktp=salah");
	}else{
		$koneksi->tambah_data($firstname,$lastname,$idcard,$loanamount,$loanperiode,$loanpurpose,$date,$sex);
		
		require('fpdf.php');
		ob_start();
		$pdf = new FPDF('l','mm','A5');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(190,7,'TUNAIKU INDONESIA',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'TEST TUNAIKU INDONESIA',0,1,'C');

		$pdf->Cell(10,7,'',0,1);

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'KTP',1,0);
		$pdf->Cell(85,6,'NAMA',1,0);
		$pdf->Cell(27,6,'LOAN AMOUNT',1,0);
		$pdf->Cell(25,6,'LOAN PERIOD',1,1);

		$pdf->SetFont('Arial','',10);
		
		foreach($koneksi->tampil_data() as $x){
			$pdf->Cell(20,6,$x['id_card'],1,0);
			$pdf->Cell(85,6,$x['first_name'].' '.$x['last_name'],1,0);
			$pdf->Cell(27,6,$x['loan_amount'],1,0);
			$pdf->Cell(25,6,$x['loan_period'],1,1); 
		}

		$pdf->Output();
		//header('location:tampil_data.php');
	}
}
?>