<?php 
session_start();
include("functions/functions.php");
include("includes/db.php"); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Customer Register</title>
		<link rel="stylesheet" href="styles/style.css" media="all" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
       	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       	<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      	<meta name="description" content="">
      	<meta name="author" content="">
      	<link rel="shortcut icon" href="themes/assets/ico/favicon.ico">
      	<link href="themes/assets/css/carousel.css" rel="stylesheet">
     

		<style type="text/css">
			body, html {
				    height: 100%;
				    background-repeat: no-repeat;
					background: #FFDE59;

				}

				.login_box{
				    background:#ffffff;
				    border:3px solid #F4F4F4;
				    padding-left: 15px;
				    margin-bottom:25px;
				    }
				.input_title{
				    color:rgba(164, 164, 164, 0.9);
				    padding-left:3px;
				        margin-bottom: 2px;
				    }

				hr{
				    width:100%;
				}
				    
				.welcome{
				    font-family: "myriad-pro",sans-serif;
				    font-style: normal;
				    font-weight: 100;
				    color:#FFFFFF;
				    margin-bottom:25px;
				    margin-top:50px;

				}

				.login_title{
				    font-family: "myriad-pro",sans-serif;
				    font-style: normal;
				    font-weight: 100;
				    color:rgba(164, 164, 164, 0.44);
				}

				.card-container.card {
				    max-width: 350px;

				}
				
				.btn {
				  display: inline-block;
				  font-weight: normal;
				  text-align: center;
				  white-space: nowrap;
				  vertical-align: middle;
				  -webkit-user-select: none;
				     -moz-user-select: none;
				      -ms-user-select: none;
				          user-select: none;
				  border: 1px solid transparent;
				  padding: 0.5rem 0.75rem;
				  font-size: 1rem;
				  line-height: 1.25;
				  border-radius: 0.25rem;
				  transition: all 0.15s ease-in-out;
				}

				.btn:focus, .btn:hover {
				  text-decoration: none;
				}

				.btn:focus, .btn.focus {
				  outline: 0;
				  box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
				}

				
				.card {
				    background-color: #FFFFFF;
				    
				    padding: 1px 25px 30px;
				    margin: 0 auto 25px;
				    margin-top: 15%x;
				    
				    -moz-border-radius: 2px;
				    -webkit-border-radius: 2px;
				    border-radius: 2px;
				    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				}

				.profile-img-card {
				    width: 96px;
				    height: 96px;
				    margin: 0 auto 10px;
				    display: block;
				    -moz-border-radius: 50%;
				    -webkit-border-radius: 50%;
				    border-radius: 50%;
				}

				
				.profile-name-card {
				    font-size: 16px;
				    font-weight: bold;
				    text-align: center;
				    margin: 10px 0 0;
				    min-height: 1em;
				}

				.reauth-email {
				    display: block;
				    color: #404040;
				    line-height: 2;
				    margin-bottom: 10px;
				    font-size: 14px;
				    text-align: center;
				    overflow: hidden;
				    text-overflow: ellipsis;
				    white-space: nowrap;
				    -moz-box-sizing: border-box;
				    -webkit-box-sizing: border-box;
				    box-sizing: border-box;
				}

				.form-signin #inputEmail,
				.form-signin #inputPassword {
				    direction: ltr;
				    height: 44px;
				    font-size: 16px;
				}

				.form-signin input[type=email],
				.form-signin input[type=password],
				.form-signin input[type=text],
				.form-signin button {
				    width: 100%;
				    display: block;

				    z-index: 1;
				    position: relative;
				    -moz-box-sizing: border-box;
				    -webkit-box-sizing: border-box;
				    box-sizing: border-box;
				}

				.form-signin .form-control:focus {
				    border-color: rgb(104, 145, 162);
				    outline: 0;
				    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
				    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
				}

				.btn.btn-signin {
				    
				    background-color: rgb(104, 145, 162);
				  
				    padding: 0px;
				    font-weight: 700;
				    font-size: 18px;
				    height: 36px;
				    -moz-border-radius: 3px;
				    -webkit-border-radius: 3px;
				    border-radius: 3px;
				    border: none;
				    -o-transition: all 0.218s;
				    -moz-transition: all 0.218s;
				    -webkit-transition: all 0.218s;
				    transition: all 0.218s;
				}

				.btn.btn-signin:hover,
				.btn.btn-signin:active,
				.btn.btn-signin:focus {
				    background-color: rgb(12, 97, 33);
				}

				.forgot-password {
				    color: rgb(104, 145, 162);
				}
				.btn-success {
				  color: #fff;
				  background-color: #28a745;
				  border-color: #28a745;
				}

				.btn-success:hover {
				  color: #fff;
				  background-color: #218838;
				  border-color: #1e7e34;
				}

				.btn-success:focus, .btn-success.focus {
				  box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.5);
				}

				.btn-success.disabled, .btn-success:disabled {
				  background-color: #28a745;
				  border-color: #28a745;
				}

				.btn-success:active, .btn-success.active,
				.show > .btn-success.dropdown-toggle {
				  background-color: #218838;
				  background-image: none;
				  border-color: #1e7e34;
				}


				.forgot-password:hover,
				.forgot-password:active,
				.forgot-password:focus{
				    color: rgb(12, 97, 33);
				}
		</style>

	</head>
	
<body>
	
	<div class="navbar-wrapper">
	    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
	    	<h2 style="color: white" align="center">Register using your Mobile NUMBER</h2>
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	              <a class="navbar-brand" href="index.html"></a>
	          
	            
	          	</div>
	        </div>
       	</div>
    </div>

    <div class="card card-container">
        <h2 class='login_title text-center' align="center" style="color: black">Enter your Details</h2>
        <form class="form-signin" method="POST">
            <p class="input_title">Name</p>
            <input type="text" name="c_name" class="login_box" placeholder="Your name" required autofocus>
            <p class="input_title">Mobile Number</p>
            <input type="text" name="c_contact" class="login_box" placeholder="Your number" required>
            <p class="input_title">Age</p>
            <input type="text" name="c_age" class="login_box" placeholder="Your age" required>
            <p class="input_title">Password</p>
            <input type="password" name="c_pass" class="login_box" placeholder="Enter password" required>
            <p class="input_title">Confirm Password</p>
            <input type="password" name="confirm_pass" class="login_box" placeholder="Confirm password" required>
            <div id="remember" class="checkbox"></div>
            <input class="btn btn-lg btn-signin" align="center" type="submit" name="register" value="Register" style="color: white">
        </form>
    </div>
</body>
</html>

<?php 
if (isset($_POST['register'])) {
    $c_name = $_POST['c_name'];
    $c_mobile = $_POST['c_mobile'];
    $c_age = $_POST['c_age'];
    $c_pass = $_POST['c_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // Check if passwords match
    if ($c_pass != $confirm_pass) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        // Update the SQL query to use the correct column names
        $insert_c = "INSERT INTO customersdetails (customer_name, customer_mobile, age, customer_pass) VALUES ('$c_name', '$c_mobile', '$c_age', '$c_pass')";
        $run_c = mysqli_query($con, $insert_c); 		
		
        if ($run_c) {		
            echo "<script>alert('Account has been created successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            echo "<script>alert('Error: Unable to create account')</script>";
        }
    }
}
?>