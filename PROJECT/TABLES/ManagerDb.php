<?php 
	session_start();
    $db = oci_connect('scott', 'tiger', 'xe');


	// initialize variables
	$cname = "";
	$dateE = "";
	$Cnum1 = "";
	$Cnum2 = "";
	$Cnum3 = "";
	$cid = "";
	$update = false;

	if (isset($_POST['save'])) {
		$cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];
		$Cnum2 = $_POST['Cnum2'];
		$Cnum = $_POST['Cnum'];

		$a = oci_parse($db, "INSERT INTO Manager (MANAGER_ID, MANAGER_NAME, JOIN_DATE, MANAGER_PHONE_NUMBER_1, MANAGER_PHONE_NUMBER_2, MANAGER_SALARY) VALUES ('$cid', '$cname', '$dateE', '$Cnum1', '$Cnum2', '$Cnum3')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		 echo "<script> window.location.href='Manager.php';</script>";
		
	}
    if (isset($_POST['update'])) {
        $cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];
		$Cnum2 = $_POST['Cnum2'];
		$Cnum3 = $_POST['Cnum3'];
    
        $b=oci_parse($db, "UPDATE MANAGER SET MANAGER_NAME='$cname', JOIN_DATE='$dateE', MANAGER_PHONE_NUMBER_1='$Cnum1', MANAGER_PHONE_NUMBER_2='$Cnum2', MANAGER_SALARY='$Cnum3' WHERE MANAGER_ID=$cid");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
		 echo "<script> window.location.href='Manager.php';</script>";
    }
    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $c = oci_parse($db, "DELETE FROM MANAGER WHERE MANAGER_ID=$cid");
		oci_execute($c);
        $_SESSION['message'] = "DATA DELETED SUCCESSFULLY"; 
		 echo "<script> window.location.href='Manager.php';</script>";
    }
?>