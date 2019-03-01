<?php 
session_start();
$_SESSION['msg']='you session started';
     if(isset($_POST['submit']))
     {


        // echo "button clicked";

            $email=$_POST['email'];
            $npassword=$_POST['npassword'];
            $cpassword=$_POST['cpassword'];

      // echo 'username:'.$username.'<br>'.'npassword:'.$npassword.'<br>';
            if ($npassword==$cpassword)
             {
            	$conn= mysqli_connect('localhost','root','','samplelogindb') or die('database not selected');

            	$updateq="UPDATE `user` SET `password`='$npassword' WHERE email='$email'";
            	$fire=mysqli_query($conn,$updateq) or die('did not run');

                echo 'you password has been changed';
            }

            else
            {

                 echo "cpassword and new password does not mactch";


            }
mysqli_close($conn);

     }

   session_destroy();


 ?>






<!DOCTYPE html>
<html>
<head>
	<title>forgot password</title>
</head>
<body>
    <form action="forgot.php" method="post">
    	enter your email:<input type="text" name="email"><br>
    	new password:<input type="text" name="npassword"><br>
    	comfirm password:<input type="text" name="cpassword"><br><br>
    	<input type="submit" name="submit" value="change password">

    </form>
         
</body>
</html>