<?PHP 
session_start();
@include 'config.php';
$client_name = NULL;
$user_type = NULL;

if(isset($_SESSION['id'])){
    $select = " SELECT * FROM user WHERE id = '".$_SESSION['id']."' LIMIT 1";
   	$result = mysqli_query($conn, $select);
   	$row = mysqli_fetch_array($result);
	$client_name = $row['name'];
	$user_type = $row['user_type'];
	$sid = $_SESSION['id'];
}
else
{
	$sid = "";
}
	

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">

<style> 
.nav-link { color:#FFF !important }
<!--.btn-primary { width:100% !important }-->
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light  " style="padding-left:120px; padding-right:120px; padding-bottom:12px; padding-top:12px; background-color:#3e3e3e "><img src="images/gt.png"  alt=""/> <a class="navbar-brand" href="#"><!--Green Town Solutions&nbsp;--></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a> </li>
          
          <?PHP if($user_type=='user' or $user_type=='admin') { ?>
          <li class="nav-item active"> <a class="nav-link" href="complain.php">Complain Here <span class="sr-only">(current)</span></a></li>
          <?PHP } ?>
          
          <li class="nav-item active"> <a class="nav-link" href="user.php">My Complains <span class="sr-only">(current)</span></a></li>
          <li class="nav-item active"> <a class="nav-link" href="about_us.php">About Us <span class="sr-only">(current)</span></a></li>
          
          <!--<li class="nav-item"> </li>-->
          <li class="nav-item dropdown">
            <div class="dropdown-menu" aria-labelledby="navbarDropdown2"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> </div>
          </li>
        </ul>
        <ul style="list-style: none;margin-top: 10px;">
        <?PHP if($sid=="") { ?>
          <li class="nav-item active" style=""> <a class="nav-link" href="login_form.php">Login Here<span class="sr-only">(current)</span></a></li>
          <?PHP } else { ?>
          <li class="nav-item active" style="text-align:right; color:#FFF"> Hi <?PHP echo $client_name; ?> | <a href="my-account.php" style="color:#6daded; text-decoration:underline">My Account </a> &nbsp;| <a class=" " href="logout.php" style="color:#F00">   <span style="text-decoration:underline">Log out</span><span class="sr-only">(current)</span></a></li>
          <?PHP } ?>
          </ul>
        <!--<form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Find Services" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Choose&nbsp;</button>
        </form>-->
</div>
    </nav>