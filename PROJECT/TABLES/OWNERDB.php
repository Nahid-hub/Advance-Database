<?php 
	session_start();
    $db = oci_connect('scott', 'tiger', 'xe');


	// initialize variables
	$cname = "";
	$dateE = "";
	$Cnum1 = "";
	$Cnum2 = "";
	$oid = "";
	$update = false;

	if (isset($_POST['save'])) {
		$oid = $_POST['oid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];
		$Cnum2 = $_POST['Cnum2'];
		

		$a = oci_parse($db, "INSERT INTO OWNER (OWNER_ID, OWNER_NAME, EMAIL, OWNER_PHONE_NUMBER,OWNER_SHOP_LICENSE) VALUES ('$oid', '$cname', '$dateE', '$Cnum1', '$Cnum2')"); 
		oci_execute($a);
		$_SESSION['message'] = "DATA ADDED SUCCESSFULLY"; 
		 echo "<script> window.location.href='OWNER.php';</script>";
		
	}
    if (isset($_POST['update'])) {
        $oid = $_POST['oid'];
		$cname = $_POST['cname'];
		$dateE = $_POST['dateE'];
		$Cnum1 = $_POST['Cnum1'];
		$Cnum2 = $_POST['Cnum2'];

    
        $b=oci_parse($db, "UPDATE OWNER SET OWNER_NAME='$cname', EMAIL='$dateE', OWNER_PHONE_NUMBER='$Cnum1', OWNER_SHOP_LICENSE='$Cnum2' WHERE OWNER_ID=$oid");
		oci_execute($b);
        $_SESSION['message'] = "DATA UPDATED SUCCESSFULLY"; 
		 echo "<script> window.location.href='OWNER.php';</script>";
    }

?>