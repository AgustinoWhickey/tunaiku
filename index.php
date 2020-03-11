<?php
	include 'config.php';
	$db = new database();
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>No</th> 
        <th>Name</th> 
		<th>Loan Amount</th> 
		<th>Loan Period</th> 
		<th>Loan Purpose</th>
		<th>Loan Purpose</th>
    </tr>
	<?php
		$no = 1;
		foreach($db->tampil_data() as $x){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $x['first_name'].' '.$x['last_name']; ?></td>
		<td><?php echo $x['loan_amount']; ?></td>
		<td><?php echo $x['loan_period']; ?></td>
		<td><?php echo $x['loan_purpose']; ?></td>
		<td>
			<a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit">Edit</a>		
		</td>
	</tr>
	<?php 
	}
	?>
    </table>
</body>
</html>