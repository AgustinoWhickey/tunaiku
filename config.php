<?php
class database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "tunaiku";
	
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass,$this->db);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
	
	function tampil_data(){
		$data = mysqli_query($this->koneksi,"select * from user_loan");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
	
	function tambah_data($firstname,$lastname,$idcard,$loanamount,$loanperiode,$loanpurpose,$date,$sex){
		mysqli_query($this->koneksi,"insert into user_loan values ('$firstname','$lastname','$idcard','$loanamount','$loanperiode','$loanpurpose','$date','$sex')");
	}
 
} 

?>