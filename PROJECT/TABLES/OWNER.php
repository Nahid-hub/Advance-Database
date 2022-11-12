<?php  include('OWNERDB.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$oid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM OWNER WHERE OWNER_ID=$oid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$oid = $n['OWNER_ID'];
		    $oname = $n['OWNER_NAME'];
		    $email = $n['EMAIL'];
		    $Onum1 = $n['OWNER_PHONE_NUMBER'];
		    $Onum2 = $n['OWNER_SHOP_LICENSE'];
		 
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>OWNER</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>OWNER DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $oid=$_POST['sea'];
    
	    	 $sql = "SELECT OWNER_ID, OWNER_NAME, EMAIL, OWNER_PHONE_NUMBER, OWNER_SHOP_LICENSE FROM OWNER WHERE OWNER_ID=$oid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['OWNER_ID']; ?></td>
	    		<td><?php echo $row['OWNER_NAME']; ?></td>
	    		<td><?php echo $row['EMAIL']; ?></td>
	    		<td><?php echo $row['OWNER_PHONE_NUMBER']; ?></td>
	    		<td><?php echo $row['OWNER_SHOP_LICENSE']; ?></td>
	    		<td><a href="OWNER.php?edit=<?php echo $row['OWNER_ID']; ?>" class="edit_btn" >EDIT</a></td>
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

     <?php $results = oci_parse($db, "SELECT * FROM OWNER"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>OWNER_ID</th>
			<th>OWNER_NAME</th>
			<th>EMAIL</th>
			<th>OWNER_PHONE_NUMBER</th>
			<th>OWNER_SHOP_LICENSE</th>
		    <th colspan="2">ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['OWNER_ID']; ?></td>
			<td><?php echo $row['OWNER_NAME']; ?></td>
			<td><?php echo $row['EMAIL']; ?></td>
			<td><?php echo $row['OWNER_PHONE_NUMBER']; ?></td>
			<td><?php echo $row['OWNER_SHOP_LICENSE']; ?></td>
			<td>
				<a href="OWNER.php?edit=<?php echo $row['OWNER_ID']; ?>" class="edit_btn" >EDIT</a>
			</td>
		</tr>
	<?php } ?>
	
	
</table>
<hr><hr><hr>

	<form method="post" action="OWNERDB.php" >
		<div class="input-group">
			<label>OWNER ID</label>
			<input type="NUMBER" name="cid" value="<?php echo $oid; ?>">
		</div>
		<div class="input-group">
			<label>OWNER NAME</label>
			<input type="text" name="cname" value="<?php echo $cname; ?>">
		</div>
        <div class="input-group">
			<label>EMAIL</label>
			<input type="text" name="dateE" value="<?php echo $dateE; ?>">
		</div>
        <div class="input-group">
			<label>OWNER PHONE NUMBER </label>
			<input type="NUMBER" name="Cnum1" value="<?php echo $Cnum1; ?>">
		</div>
        <div class="input-group">
			<label>OWNER SHOP LICENSE </label>
			<input type="NUMBER" name="Cnum2" value="<?php echo $Cnum2; ?>">
		</div>


		<div class="input-group">
      <?php if ($update == true): ?>
	    <button class="btn" type="submit" name="update" style="background: #556B2F;" >UPDATE</button>
      <?php else: ?>
	    <button class="btn" type="submit" name="save" >SAVE</button>
      <?php endif ?>
		</div>

	</form>
</body>
</html>