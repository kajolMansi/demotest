<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$pass= sha1($pass);
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM student_reg where email='$email' && pass='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			  
				$_SESSION['email']=$email;
				header("location:registerpage.php");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--    Css Link
    ========================================================-->
	<link rel="stylesheet" type="text/css" href="css/demostyle.css">

	<!--    Title
	    =========================================================-->
	<title>Login here</title>
</head>
<body>

    <div class="card">
	   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	      <h2 class="title"> Log in</h2>
	      <p class="subtitle">Don't have an account? <a href="registerpage.php"> sign Up</a></p>
	      <?php echo $error; ?><?php echo $msg; ?>
	      <div class="email-login">
	      		<div class="form-group">
	                <label for="email">Email</label>
	                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email." required>
	            </div>
	         	<div class="form-group">
	                <label for="pass">Password</label>
	                <input type="Password" name="pass" class="form-control" id="pass" placeholder="Enter your password." required>
	            </div>
	      </div>
	      <button class="cta-btn" name="login" value="Login" type="submit">Log In</button>
	      <a class="forget-pass" href="#">Forgot password?</a>
	   </form>
	</div>
</body>
</html>
