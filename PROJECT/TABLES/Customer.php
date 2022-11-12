<?php  include('CustomerDb.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID=$cid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$pid = $n['pid'];
		    $pname =$n['pname'];
		    $caddress = $n['address'];
		    $license =$n['license'];

		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>CUSTOMER DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $cid=$_POST['sea'];
    
	    	 $sql = "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_ADDRESS, SHOP_LICENSE FROM CUSTOMER WHERE CUSTOMER_ID=$cid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['CUSTOMER_ID']; ?></td>
	    		<td><?php echo $row['CUSTOMER_NAME']; ?></td>
	    		<td><?php echo $row['CUSTOMER_ADDRESS']; ?></td>
	    		<td><?php echo $row['SHOP_LICENSE']; ?></td>
	    
	    		</table>
	    		<?php
	        }
	    	
	    	
	    }
	
	?>
     <?php if (isset($_SESSION['message'])): ?>
     	<div class="msg">
     		<?php 
     			echo $_SESSION['message']; 
     			unset($_SESSION['message']);
     		?>
     	</div>
     <?php endif ?>

     <?php $results = oci_parse($db, "SELECT * FROM CUSTOMER"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>CUSTOMER_ID</th>
			<th>CUSTOMER_NAME</th>
			<th>CUSTOMER_ADDRESS</th>
			<th>SHOP_LICENSE</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['CUSTOMER_ID']; ?></td>
			<td><?php echo $row['CUSTOMER_NAME']; ?></td>
			<td><?php echo $row['CUSTOMER_ADDRESS']; ?></td>
			<td><?php echo $row['SHOP_LICENSE']; ?></td>
			
			</td>
		</tr>
	<?php } ?>
	
	
</table>

	</form>
</body>
</html>