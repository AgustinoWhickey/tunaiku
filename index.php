<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM user_loan ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>Name</th> 
		<th>Loan Amount</th> 
		<th>Loan Period</th> 
		<th>Loan Purpose</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['first_name']." ".$user_data['last_name']."</td>";
        echo "<td>".$user_data['loan_amount']."</td>";
        echo "<td>".$user_data['loan_period']."</td>";    
        echo "<td>".$user_data['loan_purpose']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Cetak</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>