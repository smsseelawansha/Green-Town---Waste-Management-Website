<?php
session_start();
@include '../config.php';
$client_name = NULL;

if(isset($_SESSION['id'])){
    $select = " SELECT name FROM user WHERE id = '".$_SESSION['id']."' LIMIT 1";
   	$result = mysqli_query($conn, $select);
   	$row = mysqli_fetch_array($result);
	$client_name = $row['name'];
	$sid = $_SESSION['id'];
}
else
{
	$sid = "";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Complaints Admin Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    h1 {
      color: #333;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    form {
      margin-top: 20px;
    }
    select {
      padding: 5px;
      border-radius: 3px;
    }
    input[type="submit"] {
      margin-left: 10px;
      padding: 5px 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h3>Complaints Admin Page | <a href="../logout.php">Log out</a> | <a href="../admin_home.php">Home</a></h3>

  
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Message</th>
      <th>Action</th>
	  <th>Driver</th>
    </tr>
    <?php 
	//STATUS CHANGE
	if(isset($_GET['status']))
	{
		$postcid = $_POST['complaint_id'];
		
		$sql ="UPDATE complaint SET status = '".$_GET['status']."' WHERE id = $postcid ";
		if (mysqli_query($conn, $sql)) {
  			echo "<span style=color:#2e8b00;><b>Action updated successfully!</b></span>";
		}
	}
	//DRIVER ASSIGN
	if(isset($_GET['driver']))
	{
		$c_id = $_POST['c_id'];
		
		$sql ="UPDATE complaint SET d_assign = '".$_GET['driver']."' WHERE id = $c_id ";
		if (mysqli_query($conn, $sql)) {
  			echo "<span style=color:#06C;><b>Driver Assigned successfully!</b></span>";
		}
	}
	

	$sql = " SELECT * FROM complaint ORDER BY id DESC";
   	$result = mysqli_query($conn, $sql);
   	while($complaint = mysqli_fetch_array($result))
	
	  { ?>
    <tr>
      <td><?php echo $complaint['name']; ?></td>
      <td><?php echo $complaint['email']; ?></td>
      <td><?php echo $complaint['subject']; ?></td>
      <td><?php echo $complaint['message']; ?></td>
       
      <td>
        <form method="post" name="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <input type="hidden" name="complaint_id" value="<?php echo $complaint['id']; ?>">
          <select name="status" onchange="this.form.action += '?status='+this.value;this.form.submit()">
          
          	<option selected value="<?php if($complaint['status']=="") { echo "Pending"; } else { echo $complaint['status']; } ?>"><?php if($complaint['status']=="") { echo "Pending"; } else { echo $complaint['status']; } ?></option>
            <option value="Pending" <?php if ($complaint['status'] === 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="Approved" <?php if ($complaint['status'] === 'Approved') echo 'selected'; ?>>Approved</option>
            <option value="Rejected" <?php if ($complaint['status'] === 'Rejected') echo 'selected'; ?>>Rejected</option>
            
          </select>
			
          <!--<input type="submit" value="Update">-->
        </form>
      </td>
		
	<td>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="hidden" name="c_id" value="<?php echo $complaint['id']; ?>">
		<select name="driver" style="text-transform:capitalize"  onchange="this.form.action += '?driver='+this.value; this.form.submit()">
        	
            
			<?PHP 
				
				if($complaint['d_assign']==0) { $nd_assign = 0; } else { $nd_assign = $complaint['d_assign']; }
				
 				 echo $sql = " SELECT u.name, u.id, c.d_assign FROM user u, complaint c WHERE u.id = c.d_assign AND c.d_assign=".$nd_assign." LIMIT 1";
				$result4 = mysqli_query($conn, $sql);
				 $count_d = mysqli_num_rows($result4);
				if($count_d==0) 
				{
					echo "<option selected value=0>- Assign -</option>";
				
				}
				else
				{
					$dis = mysqli_fetch_assoc($result4);
					echo "<option selected value=".$dis['d_assign'].">".$dis['name']."</option>";
					
				}
				
				$sql = " SELECT name, id FROM user WHERE user_type = 'driver' ORDER BY id ";
				$result3 = mysqli_query($conn, $sql);
				while($display = mysqli_fetch_array($result3)) {

			?>
            	
				<option value="<?PHP echo $display['id'];?>"><?PHP echo $display['name']; ?></option>
                
			<?PHP } ?>
            <option  value=0>- Assign -</option>
          </select>
      </form> 
		</td>	
    </tr>
    <?php } ?>
  </table>
</body>
</html>

<?php
// Close the database connection
$conn = null;
?>
