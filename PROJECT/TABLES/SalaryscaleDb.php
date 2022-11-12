<?php 
	session_start();
    $db = oci_connect('scott', 'tiger', 'xe');


	// initialize variables
	$cname = "";
	$dateE = "";
	$Cnum1 = "";
	$cid = "";
	$update = false;

	if (isset($_POST['save'])) {
		$cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];


		$a = oci_parse($db, "INSERT INTO Salaryscale (S_ID, EMPLOYEE_NAME, EMPLOYEE_WORKING_HOUR, EMPLOYEE_SALARY) VALUES ('$cid', '$cname', '$dateE', '$Cnum1')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		 echo "<script> window.location.href='Salaryscale.php';</script>";
		
	}
    if (isset($_POST['update'])) {
        $cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];
    
        $b=oci_parse($db, "UPDATE Salaryscale SET EMPLOYEE_NAME='$cname', EMPLOYEE_WORKING_HOUR='$dateE', EMPLOYEE_SALARY='$Cnum1' WHERE S_ID=$cid");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
		 echo "<script> window.location.href='Salaryscale.php';</script>";
    }
    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM Salaryscale WHERE S_ID=$cid");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
		 echo "<script> window.location.href='Salaryscale.php';</script>";
    }
?>