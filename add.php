<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
	
	<?php 
	if(isset($_GET['nama'])){
		if($_GET['nama'] == "empty"){
			echo "<h4 style='color:red'>Please Insert Your Name !</h4>";
		}
	}
	if(isset($_GET['ktp'])){
		if($_GET['ktp'] == "salah"){
			echo "<h4 style='color:red'>Please Check Your ID Card Number !</h4>";
		}
	}
	?>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="firstname" required="required"></td>
            </tr>
			<tr> 
                <td>Last Name</td>
                <td><input type="text" name="lastname" required="required"></td>
            </tr>
            <tr> 
                <td>ID Card</td>
                <td><input type="text" name="idcard"></td>
            </tr>
			<tr> 
                <td>Loan Amount (between 1000 and 10000)</td>
                <td><input type="number" name="loanamount" min="1000" max="10000"></td>
            </tr>
			<tr> 
                <td>Loan Periode</td>
                <td><input type="text" name="loanperiode"></td>
            </tr>
            <tr> 
                <td>Loan Purpose</td>
                <td>
				<select name="loanpurpose">
					<option value="vacation">Vacation</option>
					<option value="renovation">Renovation</option>
					<option value="electronics">Electronics</option>
					<option value="wedding">Wedding</option>
					<option value="rent">Rent</option>
					<option value="car">Car</option>
					<option value="investment">Investment</option>
				</select>
				</td>
            </tr>
			<tr> 
                <td>Birth</td>
                <td><input type="date" name="birth"></td>
            </tr>
			<tr> 
                <td>Sex</td>
                <td>
					<select name="sex">
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
				</td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
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

        include_once("config.php");
		if($firstname == "" || $lastname == ""){
			header("location:add.php?nama=empty");
		}else if(preg_match("/^[a-z0-9_-]{1,6}(0[1-9]|[1-2][0-9]|3[0-1])(0[1-9]|1[0-2])[0-9]{4}[a-z0-9_-]{1,4}$/",$idcard)){
			header("location:add.php?ktp=salah");
		}else{
			$result = mysqli_query($mysqli, "INSERT INTO user_loan(first_name,last_name,id_card,loan_amount,loan_period,loan_purpose,birth,sex) VALUES('$firstname','$lastname','$idcard','$loanamount','$loanperiode','$loanpurpose','$date','$sex')");

			//echo "User added successfully. <a href='index.php'>View Users</a>";
			
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

			$user = mysqli_query($mysqli, "select * from user_loan");
			while ($row = mysqli_fetch_array($user)){
				$pdf->Cell(20,6,$row['id_card'],1,0);
				$pdf->Cell(85,6,$row['first_name'].' '.$row['last_name'],1,0);
				$pdf->Cell(27,6,$row['loan_amount'],1,0);
				$pdf->Cell(25,6,$row['loan_period'],1,1); 
			}

			$pdf->Output();
		}
    }
    ?>
</body>
</html>