<?php  include('ManagerDb.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record = oci_parse($db, "SELECT * FROM salaryscale WHERE S_ID=$cid");
		oci_execute($record);

		if($record){

			$n = oci_fetch_array($record);
			$cid = $n['S_ID'];
		    $cname = $n['EMPLOYEE_NAME'];
		    $dateE = $n['EMPLOYEE_WORKING_HOUR'];
		    $Cnum1 = $n['EMPLOYEE_SALARY'];

		}
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>SALARYSCALE</title>
    <link rel = "stylesheet" type = "text/css" href = "ALL ALL.css">
</head>
<body>
	<h1>SALARYSCALE DATA</h1>
	<form  method="POST" action="#">
		<input type="search" id="search" class="search_box" name="sea" placeholder="SEARCH BY ID...">
		<button name="search">SEARCH</button>
    </form>
	<?php

         if (isset($_POST['search'])) {
	    	 $cid=$_POST['sea'];
    
	    	 $sql = "SELECT S_ID, EMPLOYEE_NAME, EMPLOYEE_WORKING_HOUR, EMPLOYEE_SALARY FROM salaryscale WHERE S_ID=$cid";
	    	 $stid = oci_parse($db, $sql);
	    	 oci_execute($stid);
	    	
	    	while ($row=oci_fetch_array($stid)) {
	    		?>
	    		<table>
	    		<td><?php echo $row['S_ID']; ?></td>
	    		<td><?php echo $row['EMPLOYEE_NAME']; ?></td>
	    		<td><?php echo $row['EMPLOYEE_WORKING_HOUR']; ?></td>
	    		<td><?php echo $row['EMPLOYEE_SALARY']; ?></td>
	    		
				<td><a href="Salaryscale.php?edit=<?php echo $row['S_ID']; ?>" class="edit_btn" >EDIT</a></td>
			    <td><a href="SalaryscaleDb.php?del=<?php echo $row['S_ID']; ?>" class="del_btn">DELETE</a></td>
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

     <?php $results = oci_parse($db, "SELECT * FROM SALARYSCALE_VIEW"); 
         oci_execute($results);  
     ?>
<table>
	<thead>
		<tr>
			<th>S_ID</th>
			<th>EMPLOYEE_NAME</th>
			<th>EMPLOYEE_WORKING_HOUR</th>
			<th>EMPLOYEE_SALARY</th>

			<th colspan="2">ACTION</th>
		</tr>
	</thead>
    <?php while ($row = oci_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['S_ID']; ?></td>
			<td><?php echo $row['EMPLOYEE_NAME']; ?></td>
			<td><?php echo $row['EMPLOYEE_WORKING_HOUR']; ?></td>
			<td><?php echo $row['EMPLOYEE_SALARY']; ?></td>
			<td>
				<a href="Salaryscale.php?edit=<?php echo $row['S_ID']; ?>" class="edit_btn" >EDIT</a>
			</td>
			<td>
				<a href="SalaryscaleDb.php?del=<?php echo $row['S_ID']; ?>" class="del_btn">DELETE</a>
			</td>
		</tr>
	<?php } ?>
	
	
</table>
<hr><hr><hr>

	<form method="post" action="SalaryscaleDb.php" >
		<div class="input-group">
			<label>S ID</label>
			<input type="NUMBER" name="cid" value="<?php echo $cid; ?>">
		</div>
		<div class="input-group">
			<label>EMPLOYEE NAME</label>
			<input type="text" name="cname" value="<?php echo $cname; ?>">
		</div>
        <div class="input-group">
			<label>EMPLOYEE WORKING HOUR</label>
			<input type="text" name="dateE" value="<?php echo $dateE; ?>">
		</div>
        <div class="input-group">
			<label>EMPLOYEE SALARY</label>
			<input type="NUMBER" name="Cnum1" value="<?php echo $Cnum1; ?>">
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