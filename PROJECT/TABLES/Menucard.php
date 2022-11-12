<?php 

	$db = oci_connect('scott', 'tiger', 'xe');

?>
<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM Menucard WHERE ICECREAM_SERIAL	=$cid");
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
	<title>MENUCARD</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>MENUCARD DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $cid=$_POST['sea'];
    
	    	 $sql = "SELECT ICECREAM_SERIAL, PRICE_RANGE, ICECREAM_TYPE1, ICECREAM_TYPE2,ICECREAM_TYPE3 FROM Menucard WHERE ICECREAM_SERIAL=$cid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['ICECREAM_SERIAL']; ?></td>
	    		<td><?php echo $row['PRICE_RANGE']; ?></td>
	    		<td><?php echo $row['ICECREAM_TYPE1']; ?></td>
	    		<td><?php echo $row['ICECREAM_TYPE2']; ?></td>
	    		<td><?php echo $row['ICECREAM_TYPE3']; ?></td>
	    
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

     <?php $results = oci_parse($db, "SELECT * FROM Menucard"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>ICECREAM_SERIAL</th>
			<th>PRICE_RANGE</th>
			<th>ICECREAM_TYPE1</th>
			<th>ICECREAM_TYPE2</th>
			<th>ICECREAM_TYPE3</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['ICECREAM_SERIAL']; ?></td>
			<td><?php echo $row['PRICE_RANGE']; ?></td>
			<td><?php echo $row['ICECREAM_TYPE1']; ?></td>
			<td><?php echo $row['ICECREAM_TYPE2']; ?></td>
			<td><?php echo $row['ICECREAM_TYPE3']; ?></td>
			
			</td>
		</tr>
	<?php } ?>
	
	
</table>

	</form>
</body>
</html>