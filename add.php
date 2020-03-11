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
        $sex = $_POST['sex'];

        include_once("config.php");
		if($firstname == "" || $lastname == ""){
			header("location:add.php?nama=empty");
		}else{
			$result = mysqli_query($mysqli, "INSERT INTO user_loan(first_name,last_name,id_card,loan_amount,loan_period,loan_purpose,birth,sex) VALUES('$firstname','$lastname','$idcard','$loanamount','$loanperiode','$loanpurpose','$date','$sex')");

			echo "User added successfully. <a href='index.php'>View Users</a>";
		}
    }
    ?>
</body>
</html>