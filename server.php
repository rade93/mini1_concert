<?php 
	session_start();

	$student_id = "";
	$studentName = "";
	$direction = "";
	$username = "";
	$email = "";
	$adminpassword = "";
	$adminname = lcfirst($username);
	$errors = array();
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'songs');


	if(isset($_POST['update'])){
    $sql = "UPDATE concert SET concert_name = '$_POST[conpname]', concert_place = '$_POST[conplace]', concert_date = '$_POST[conpdate]', concert_ticket = '$_POST[conticket]' WHERE concert_id = '$_GET[editcon]'";
    if(mysqli_query($db,$sql)){
      header('Location: admin.php');
    }else{
      $result = '<div class="alert alert-danger"> Desila se greška prilikom čuvanja podataka</div>';
    }
  }

	// log user in form login page
	if (isset($_POST['login'])) {
	  	$username = mysqli_real_escape_string($db, $_POST['adminname']);
		$password = mysqli_real_escape_string($db, $_POST['adminpassword']);

	  if (empty($username)) {
	  	array_push($errors, "Username is required");
	  }
	  if (empty($password)) {
	  	array_push($errors, "Password is required");
	  }

	  	if (count($errors) == 0) {
	  	$query=mysqli_query($db,"SELECT * FROM appuser");
	    while($row=mysqli_fetch_array($query))
	    {
	        $username1 = $_POST['adminname'];
	        $password1 = $_POST['adminpassword'];

	        if($username1==$username && $password1==$password){
	            session_start();
	            $_SESSION["appuser_email"]=$username;
	                header("Location:admin.php");
	        }
	        else {
	        	array_push($errors, "Login data are not valid!");
	        }
		}
		}
	}
	// logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.php');
	}

	

 ?>