<?php  include('ManagerDb.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM Manager WHERE MANAGER_ID=$cid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$cid = $n['MANAGER_ID'];
		    $cname = $n['MANAGER_NAME'];
		    $dateE = $n['JOIN_DATE'];
		    $Cnum1 = $n['MANAGER_PHONE_NUMBER_1'];
		    $Cnum2 = $n['MANAGER_PHONE_NUMBER_2'];
		    $Cnum3 = $n['MANAGER_SALARY'];
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>MANAGER</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>MANAGER DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $cid=$_POST['sea'];
    
	    	 $sql = "SELECT MANAGER_ID, MANAGER_NAME, JOIN_DATE, MANAGER_PHONE_NUMBER_1, MANAGER_PHONE_NUMBER_2, MANAGER_SALARY FROM Manager WHERE MANAGER_ID=$cid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['MANAGER_ID']; ?></td>
	    		<td><?php echo $row['MANAGER_NAME']; ?></td>
	    		<td><?php echo $row['JOIN_DATE']; ?></td>
	    		<td><?php echo $row['MANAGER_PHONE_NUMBER_1']; ?></td>
	    		<td><?php echo $row['MANAGER_PHONE_NUMBER_2']; ?></td>
	    		<td><?php echo $row['MANAGER_SALARY']; ?></td>
				<td><a href="Manager.php?edit=<?php echo $row['MANAGER_ID']; ?>" class="edit_btn" >EDIT</a></td>
			    <td><a href="ManagerDb.php?del=<?php echo $row['MANAGER_ID']; ?>" class="del_btn">DELETE</a></td>
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

     <?php $results = oci_parse($db, "SELECT * FROM Manager"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>MANAGER_ID</th>
			<th>MANAGER_NAME</th>
			<th>JOIN_DATE</th>
			<th>MANAGER_PHONE_NUMBER_1</th>
			<th>MANAGER_PHONE_NUMBER_2</th>
			<th>MANAGER_SALARY</th>
			<th colspan="2">ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['MANAGER_ID']; ?></td>
			<td><?php echo $row['MANAGER_NAME']; ?></td>
			<td><?php echo $row['JOIN_DATE']; ?></td>
			<td><?php echo $row['MANAGER_PHONE_NUMBER_1']; ?></td>
			<td><?php echo $row['MANAGER_PHONE_NUMBER_2']; ?></td>
			<td><?php echo $row['MANAGER_SALARY']; ?></td>
			<td>
				<a href="Manager.php?edit=<?php echo $row['MANAGER_ID']; ?>" class="edit_btn" >EDIT</a>
			</td>
			<td>
				<a href="ManagerDb.php?del=<?php echo $row['MANAGER_ID']; ?>" class="del_btn">DELETE</a>
			</td>
		</tr>
	<?php } ?>
	
	
</table>
<hr><hr><hr>

	<form method="post" action="ManagerDb.php" >
		<div class="input-group">
			<label>MANAGER ID</label>
			<input type="NUMBER" name="cid" value="<?php echo $cid; ?>">
		</div>
		<div class="input-group">
			<label>MANAGER NAME</label>
			<input type="text" name="cname" value="<?php echo $cname; ?>">
		</div>
        <div class="input-group">
			<label>JOIN DATE</label>
			<input type="text" name="dateE" value="<?php echo $dateE; ?>">
		</div>
        <div class="input-group">
			<label>MANAGER PHONE NUMBER 1</label>
			<input type="NUMBER" name="Cnum1" value="<?php echo $Cnum1; ?>">
		</div>
        <div class="input-group">
			<label>MANAGER PHONE NUMBER 2</label>
			<input type="NUMBER" name="Cnum2" value="<?php echo $Cnum2; ?>">
		</div>
        <div class="input-group">
			<label>MANAGER SALARY</label>
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