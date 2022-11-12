<?php  include('ShopDb.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM Shop WHERE SHOP_ID=$cid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$cid = $n['SHOP_ID'];
		    $cname = $n['SHOP_NAME'];
		    $dateE = $n['DATE_OF_ESTABILISHED'];
		    $Cnum1 = $n['SHOP_PHONE_NUMBER_1'];
		    $Cnum2 = $n['SHOP_PHONE_NUMBER_2'];
		    $Cnum3 = $n['SHOP_LICENSE'];
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>SHOP DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $cid=$_POST['sea'];
    
	    	 $sql = "SELECT SHOP_ID, SHOP_NAME, DATE_OF_ESTABILISHED, SHOP_PHONE_NUMBER_1, SHOP_PHONE_NUMBER_2, SHOP_LICENSE FROM Shop WHERE SHOP_ID=$cid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['SHOP_ID']; ?></td>
	    		<td><?php echo $row['SHOP_NAME']; ?></td>
	    		<td><?php echo $row['DATE_OF_ESTABILISHED']; ?></td>
	    		<td><?php echo $row['SHOP_PHONE_NUMBER_1']; ?></td>
	    		<td><?php echo $row['SHOP_PHONE_NUMBER_2']; ?></td>
	    		<td><?php echo $row['SHOP_LICENSE']; ?></td>
				<td><a href="Shop.php?edit=<?php echo $row['SHOP_ID']; ?>" class="edit_btn" >EDIT</a></td>
			    <td><a href="ShopDb.php?del=<?php echo $row['SHOP_ID']; ?>" class="del_btn">DELETE</a></td>
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

     <?php $results = oci_parse($db, "SELECT * FROM Shop"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>SHOP_ID</th>
			<th>SHOP_NAME</th>
			<th>DATE_OF_ESTABILISHED</th>
			<th>SHOP_PHONE_NUMBER_1</th>
			<th>SHOP_PHONE_NUMBER_2</th>
			<th>SHOP_LICENSE_NUMBER</th>
			<th colspan="2">ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['SHOP_ID']; ?></td>
			<td><?php echo $row['SHOP_NAME']; ?></td>
			<td><?php echo $row['DATE_OF_ESTABILISHED']; ?></td>
			<td><?php echo $row['SHOP_PHONE_NUMBER_1']; ?></td>
			<td><?php echo $row['SHOP_PHONE_NUMBER_2']; ?></td>
			<td><?php echo $row['SHOP_LICENSE']; ?></td>
			<td>
				<a href="Shop.php?edit=<?php echo $row['SHOP_ID']; ?>" class="edit_btn" >EDIT</a>
			</td>
			<td>
				<a href="ShopDb.php?del=<?php echo $row['SHOP_ID']; ?>" class="del_btn">DELETE</a>
			</td>
		</tr>
	<?php } ?>
	
	
</table>
<hr><hr><hr>

	<form method="post" action="ShopDb.php" >
		<div class="input-group">
			<label>SHOP ID</label>
			<input type="NUMBER" name="cid" value="<?php echo $cid; ?>">
		</div>
		<div class="input-group">
			<label>SHOP NAME</label>
			<input type="text" name="cname" value="<?php echo $cname; ?>">
		</div>
        <div class="input-group">
			<label>DATE OF ESTABILISHED</label>
			<input type="text" name="dateE" value="<?php echo $dateE; ?>">
		</div>
        <div class="input-group">
			<label>SHOP PHONE NUMBER 1</label>
			<input type="NUMBER" name="Cnum1" value="<?php echo $Cnum1; ?>">
		</div>
        <div class="input-group">
			<label>SHOP PHONE NUMBER 2</label>
			<input type="NUMBER" name="Cnum2" value="<?php echo $Cnum2; ?>">
		</div>
        <div class="input-group">
			<label>SHOP LICENSE NUMBER</label>
			<input type="NUMBER" name="Cnum3" value="<?php echo $Cnum3; ?>">
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