<?php

@include 'config.php';

session_start();
   
if(isset($_POST['submit'])){
	
   $email =$_POST['email'];
   $pass = $_POST['password'];

   $select = " SELECT * FROM user WHERE email = '".$email."' && password = '".$pass."' ";
   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);

   if(mysqli_num_rows($result) > 0){

		if($row['user_type'] == 'admin')
		{
			$_SESSION['id'] = $row['id'];
			header('location:admin_home.php');
		}
		elseif($row['user_type'] == 'driver')
		{
			$_SESSION['id'] = $row['id'];
        	header('location:driver_home.php');

      	}
	  	elseif($row['user_type'] == 'user'){
			$_SESSION['id'] = $row['id'];         
	 		header('location:home.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email"  required placeholder="Enter Your Email">
      <input type="password" name="password"  required placeholder="Enter Your Password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
      <p><a href="index.php">Home</a></p>
   </form>

</div>

</body>
</html>