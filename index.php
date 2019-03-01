		<?php
		include ('connect.php');
		include ('function.php');
		$error= "";
		//------------------------------------------------------------------------------------------------------------------------------------------


			   
											if(isset($_POST['submit_bt']))
											{
												//echo '<script type "text/javascript">alert("submit_bt clicked")</script>';
												$username = mysql_real_escape_string($_POST['username']);
												$email = mysql_real_escape_string($_POST['email']);
												$password = mysql_real_escape_string($_POST['password']);
												$cpassword = mysql_real_escape_string($_POST['cpassword']);
												$details = mysql_real_escape_string($_POST['details']);
												
												//echo $username."<br>" .$email. "<br>" .$password. "<br>" .$cpassword."<br>" .$details;
												if(strlen($username)<3)
												{
													echo "<script>alert('User name is too short')</script>";
												}
												else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
												{
													echo "<script>alert('Fill the valid email')</script>";
												}
												else if(strlen($password) <3)
												{
													echo "<script>alert('password is too short')</script>";
												}
												else if($password !== $cpassword)
												{
													echo "<script>alert('password does not match')</script>";
												}
												else
												{
													$password=($password);
												$insertQuery ="INSERT INTO user(username,email,password,details) VALUES ('$username','$email','$password','$details')";
		 										mysqli_query($con,$insertQuery);
												echo "<script>alert('you are successfully registered')</script>";
											    }   
												
								 
											}
											// ------------------------------------------------------------------------------------------------------------
										if(isset($_POST['login']))
											{
												//echo '<script type "text/javascript">alert("login_bt clicked")</script>'; 
												
												$email = mysql_real_escape_string($_POST['email']);
												$password = mysql_real_escape_string($_POST['password']);
												
							                    if(email_exists($email,$con))
												{
													//echo "<script>alert('email exists')</script>";
													$result = mysqli_query($con,"SELECT password FROM user WHERE email='$email'");
													$retrievepassword = mysqli_fetch_assoc($result);
													if(($password) !== $retrievepassword['password'])
													{
														echo "<script>alert('password incorrect')</script>";	
													}
													else
													{
													// echo "<script>alert('password is correct')</script>";
													$_SESSION['email'] = $email;
													    header("Refresh: 1;url=homepage.html");
													echo "<script>alert('you are successfully login click ok to continue')</script>";
												     }
												}	 
												else
												{
													echo "<script>alert('email does not exists')</script>";
												}
											}	
											
											

							
				
		    ?>
			
		<!--------------------------------------------------------------------------------------------------------------->	
			
			
		<!DOCTYPE html>
		<html lang="en">

		    <head>

		        <meta charset="utf-8">
		        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		        <meta name="viewport" content="width=device-width, initial-scale=1">
		        <title>IEI KNIT LOGIN &amp; REGISTER PAGE</title>

		        <!-- CSS -->
		        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
		        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
				<link rel="stylesheet" href="assets/css/form-elements.css">
		        <link rel="stylesheet" href="assets/css/style.css">

		        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		        <!--[if lt IE 9]>
		            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		        <![endif]-->

		        <!-- Favicon and touch icons -->
		        <link rel="shortcut icon" href="">
		        <link rel="icon-precomposed" href="#">

		    </head>

		    <body>
			<!--------------------------------------------------------------------------------------------------------------->
		<div id ="error"  <?php echo $error ; ?> </div>
		<!--------------------------------------------------------------------------------------------------------------->

		        <!-- Top content -->
		        <div class="top-content">
		        	
		            <div class="inner-bg">
		                <div class="container">
		                	
		                    <div class="row">
		                        <div class="col-sm-8 col-sm-offset-2 text">
								<img src ="logo.png" class="img-circle" style="background-color:#cccccc" width="200" height="200"> 
								
		                            <h1><strong>IEI| KNIT CHAPTER</strong> <br/>Login &amp; Register</h1>
		                            <div class="description">
		                            	<p>
			                            
			                         <a href="#" target="_blank"><strong>* Institution of Engineers of India *</strong></a>
		                            	</p>
		                            </div>
		                        </div>
		                    </div>
		               <!-------login form design---->
					   
		                    <div class="row">
		                        <div class="col-sm-5">
		                        	
		                        	<div class="form-box">
			                        	<div class="form-top">
			                        		<div class="form-top-left">
			                        			<h3>Login to our site</h3>
			                            		<p>Enter username and password to log on:</p>
			                        		</div>
			                        		<div class="form-top-right">
			                        			<i class="fa fa-lock"></i>
			                        		</div>
			                            </div>
			                            <div class="form-bottom">
						                    <form role="form" action="" method="post" class="login-form">
						                    	<div class="form-group">
						                        	<label class="sr-only" for="form-email">Email</label>
						                        	<input name="email" type="email"  placeholder="Email..." class="form-email form-control" id="form-email"required/>
						                        </div>
						                        <div class="form-group">
						                        	<label class="sr-only" for="form-password">Password</label>
						                        	<input name="password" type="password"  placeholder="Password..." class="form-password form-control" id="form-password"required/>
						                        </div>
						                        <button name ="login"type="submit" class="btn">Sign in!</button>
						                    </form>
					                    </div>
				                    </div>
						<a href="forgot.php">forgot password?</a>			
									
									

				                <!------login form ends----->
								<!------social login----->

				                	<div class="social-login">
			                        	<h3>...or login with:</h3>
			                        	<div class="social-login-buttons">
				                        	<a class="btn btn-link-2" href="#">
				                        		<i class="fa fa-facebook"></i> Facebook
				                        	
				                        	<a class="btn btn-link-2" href="#">
				                        		<i class="fa fa-google-plus"></i> Google Plus
				                        	</a>
			                        	</div>
			                        </div>
			                        
		                        </div>
		                        <!------ social login ends----->
		                        <div class="col-sm-1 middle-border"></div>
		                        <div class="col-sm-1"></div>
		                        	
		                        <div class="col-sm-5">
		                        	
									
									<!------sign up form start form ----->
		                        	<div class="form-box">
		                        		<div class="form-top">
			                        		<div class="form-top-left">
			                        			<h3>Sign up now</h3>
			                            		<p>Fill in the details below to get access:</p>
			                        		</div>
			                        		<div class="form-top-right">
			                        			<i class="fa fa-pencil"></i>
			                        		</div>
			                            </div>
			                            <div class="form-bottom">
						                    <form role="form" action="" method="post" class="registration-form">
						                    	<div class="form-group">
						                    		<label class="sr-only" for="form-first-name">User name</label>
						                        	<input  name="username" type="text"  placeholder="User name..." class="form-first-name form-control" id="form-first-name"required/>
						                        </div>
						      
						                        <div class="form-group">
						                        	<label class="sr-only" for="form-email">Email</label>
						                        	<input name="email" type="email"  placeholder="Email..." class="form-email form-control" id="form-email"required/>
						                        </div>
												
												 <div class="form-group">
						                        	<label class="sr-only" for="form-password">Password</label>
						                        	<input name="password" type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password"required/>
						                        </div>
												
												 <div class="form-group">
						                        	<label class="sr-only" for="form-password">Confirm Password</label>
						                        	<input name="cpassword" type="password" name="form-password" placeholder="Confirm Password..." class="form-password form-control" id="form-password"required/>
						                        </div>
												
						                        <div class="form-group">
						                        	<label class="sr-only" for="form-about-yourself">About yourself</label>
						                        	<textarea name="details" placeholder="Please fill detail about your branch and course......" 
						                            class="form-about-yourself form-control" id="form-about-yourself"required/></textarea>
						                        </div>
						                        <button name="submit_bt" type="submit" class="btn">Sign me up!</button>
						                    </form>
		                                    
											
		                                     									   
					                    </div>
		                        	</div>
		                        	
		                        </div>
		                    </div>
		                    
		                </div>
		            </div>
		            
		        </div>

		        <!-- Footer -->
		        <footer>
		        	<div class="container">
		        		<div class="row">
		        			
		        			<div class="col-sm-8 col-sm-offset-2">
		        				<div class="footer-border"></div>
		        				<p><strong> THANK YOU ! <i class="fa fa-smile-o"></i></strong></br> <a href="index.html"><strong><button class="btn"><b>CLICK FOR VISIT HOME PAGE<b></button></strong></a> 
		        					</p>
		        			</div>
		        			
		        		</div>
		        	</div>
		        </footer>

		        <!-- Javascript -->
		        <script src="assets/js/jquery-1.11.1.min.js"></script>
		        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
		        <script src="assets/js/jquery.backstretch.min.js"></script>
		        <script src="assets/js/scripts.js"></script>
		        
		        <!--[if lt IE 10]>
		            <script src="assets/js/placeholder.js"></script>
		        <![endif]-->

		    </body>

		</html>