<html>
<head>
<?php
session_start();
include("includes/db.php");

if (isset($_POST['login'])) {
    $c_mobile = $_POST['mobile'];
    $c_pass = $_POST['pass'];

    $sel_c = "SELECT * FROM customersdetails WHERE customer_pass='$c_pass' AND customer_mobile='$c_mobile'";
    
    
    if ($run_c = mysqli_query($con, $sel_c)) {
        $check_customer = mysqli_num_rows($run_c);

        if ($check_customer == 0) {
            echo "<script>alert('Mobile number or password is incorrect, please try again!')</script>";
        }

        if ($check_customer > 0) {
			$_SESSION['customer_mobile'] = $c_mobile;
			header("Location: Contribution.php"); 
			exit; 
		}
		
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<title>LOGIN</title>
    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

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
		    background: rgb(255,235,205); 
		    background: -moz-radial-gradient(center, ellipse cover,  rgba(255,235,205,1) 0%, rgba(255,239,213,1) 38%, rgba(255,228,181,1) 68%, rgba(255,218,185,1) 100%); /* Firefox */
		    background: -webkit-radial-gradient(center, ellipse cover,  rgba(255,235,205,1) 0%,rgba(255,239,213,1) 38%,rgba(255,228,181,1) 68%,rgba(255,218,185,1) 100%); /* Chrome, Safari */
		    background: radial-gradient(ellipse at center,  rgba(255,235,205,1) 0%,rgba(255,239,213,1) 38%,rgba(255,228,181,1) 68%,rgba(255,218,185,1) 100%); /* W3C */
		    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffebcd', endColorstr='#ffd6b3',GradientType=1 ); /* IE */
		}

		.login_box{
		    background: #faf0e6; 
		    border: 3px solid #f4a460; 
		    padding-left: 15px;
		    margin-bottom: 25px;
		    border-radius: 10px; 
		}

		.input_title{
		    color: #8b4513; 
		    padding-left: 3px;
		    margin-bottom: 2px;
		}

		hr{
		    width: 100%;
		}
		    
		.welcome{
		    font-family: "myriad-pro", sans-serif;
		    font-style: normal;
		    font-weight: 100;
		    color: #8b0000; 
		    margin-bottom: 25px;
		    margin-top: 50px;
		}

		.login_title{
		    font-family: "myriad-pro", sans-serif;
		    font-style: normal;
		    font-weight: 100;
		    color: #8b4513; 
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
		    background-color: #ffffff;
		    
		    padding: 1px 25px 30px;
		    margin: 0 auto 25px;
		    margin-top: 15%;
		    
		    -moz-border-radius: 10px;
		    -webkit-border-radius: 10px;
		    border-radius: 10px;
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
		    background-color: #8b4513; 
		    color: white;
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
		    background-color: #5a2c0f; 
		}

		.forgot-password {
		    color: #8b4513; 
		}

		.forgot-password:hover,
		.forgot-password:active,
		.forgot-password:focus{
		    color: #8b0000; 
		}
</style>
</head>
<body>

   
		<div class="navbar-wrapper" >
		    <div class="navbar navbar-inverse navbar-static-top " role="navigation">
		    	<h2 style="color: white" align="center">Money Management System</h2>
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse ">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		              <a class="navbar-brand" href="index.html"></a>
		          
		            <div class="navbar-collapse collapse">
		              <ul class="nav navbar-nav">
		             
		              </ul>
		          	</div>
		        </div>
       		</div>
       	</div>
		
	
		<div class="container">
    <h1 class="welcome text-center" align="center" style="color: black">Welcome to <br> the Money Management System</h1>
        <div class="card card-container">
        <h2 class='login_title text-center' align="center" style="color: darkgrey">Login using your Mobile NUMBER</h2>

    
			<form class="form-signin" action="" method="post">
				<span id="reauth-email" class="reauth-email"></span>
				<p class="input_title">Mobile Number</p>
				<input type="text" name="mobile" class="login_box" placeholder="Mobile Number" required autofocus>
				<p class="input_title">Password</p>
				<input type="password" name="pass" class="login_box" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Login</button>
			</form>
			<a href="forgot_password.php" class="forgot-password">
				Forgot your password?
			</a>
		</div>
	</div>

	

</body>
</html>
