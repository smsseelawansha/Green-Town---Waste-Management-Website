<?php
include("templates/nav1.php");
?>

  <title>Complaints Driver Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      
    }
    h1 {
      color: #333;
    }
    table {
      width: 90%;
      border-collapse: collapse;
      margin-top: 20px;
	  
    }
    th, td {
      padding: 10px;
      text-align: left;
      border : 1px solid #ddd;
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

<body>
<div class="container-fluid">
<h1 align="center" style="text-align:center !important; margin-top:25px">Complaints  Page</h1>
<div class="row">
  
  
  <table align="center">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Message</th>
       <th>Status</th>
     
    </tr>
    <?php 
	
	$select = " SELECT * FROM complaint WHERE uid = '".$_SESSION['id']."'";
   	$result = mysqli_query($conn, $select);
   	while($complaint = mysqli_fetch_array($result)) {
	
	?>
    <tr>
      <td><?php echo $complaint['name']; ?></td>
      <td><?php echo $complaint['email']; ?></td>
      <td><?php echo $complaint['subject']; ?></td>
      <td><?php echo $complaint['message']; ?></td>
      <td><?php echo $complaint['status']; ?></td>
     
    </tr>
    <?php } ?>
  </table>
  </div>
  </div>
</body>
</html>

<?php
// Close the database connection
$conn = null;
?>
