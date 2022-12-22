<?php 
include("config.php");
$error="";
$msg="";
if(isset($_POST['reg']))
{

    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    
    $pass= sha1($pass);
    
    
    $query = "SELECT * FROM student_reg where email='$email'";
    $res=mysqli_query($con, $query);
    $num=mysqli_num_rows($res);
    
    if($num == 1)
    {
        $error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
    }
    else
    {
        
        if(!empty($name) && !empty($email) && !empty($address) && !empty($phone) && !empty($pass))
        {
            
             $sql="INSERT INTO student_reg (name, email, address, phone, pass) VALUES ('$name','$email','$address','$phone','$pass')";

            $result=mysqli_query($con, $sql);

               if($result){
                   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
               }
               else{
                   $error = "<p class='alert alert-warning'>Register Not Successfully</p> ";
               }
        }else{
            $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
        }
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
    <title>Registration Form</title>
</head>
<body>

    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php echo $error; ?><?php echo $msg; ?>
        <div class="jumbotron mt-5">
            <div>
                <h2 class="title pb-3">Register here</h2>
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your  name." required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email." required>
            </div>
            <div class="form-group">
                <label for="address-1">Address</label>
                <input type="address" class="form-control" name="address" id="address" placeholder="Locality/House/Street no." required>
            </div>
            <div class="form-group">
                <label for="cod">Country code</label>
                <select class="form-control browser-default custom-select">
                  <option data-countryCode="IN" value="91">India (+91)</option>
            </select>
            </div>
            <div class="form-group">
                <label for="tel">Phone</label>
                <input type="tel" name="phone" class="form-control" id="tel" placeholder="Enter Your Contact Number." maxlength="10" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="Password" name="pass" class="form-control" id="pass" placeholder="Enter your password." required>
            </div>
            <div class="checkbox-text">                                     
                        <div class="checkbox-content">
                            <input type="checkbox" id="" onclick="showPassword()">
                            <label for="" class="">Show Password</label>
                        </div>
                        <script>
                                function showPassword(){
                                    var x= document.getElementById("pass");
                                    if (x.type ==="password"){
                                        x.type="text";
                                    }
                                    else
                                        x.type="password";
                                }
                            </script>
                        
                    </div>
            <div class="form-group mb-0">
               <button class="btn cta-btn" name="reg" value="Register" type="submit">Submit</button>
            </div>
            <div class="">
                <div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
            </div>
            
        </div>
        </form>
    </div>


</body>
</html>
