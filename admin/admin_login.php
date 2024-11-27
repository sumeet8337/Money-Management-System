<?php 
session_start();
include("includes/db.php"); 

if(isset($_POST['login'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    
    // Using prepared statements
    $stmt = $con->prepare("SELECT * FROM admins WHERE user_name = ? AND user_pass = ?");
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        echo "<script>alert('Password or Name is wrong, try again!')</script>";
    } else {
        $_SESSION['user_name'] = $name;
        header("Location: admin_page.php"); 
        exit(); 
    }
    $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin login</title>
    <link rel="stylesheet" href="styles/login_style.css" media="all" /> 
</head>
<body>
<div class="login">
    <h2 style="color: #FFD700; text-align: center;"><?php echo @$_GET['logged_out']; ?></h2>
    <h1>Admin Login</h1>
    <form method="post" action="">
        <input type="text" name="name" placeholder="Name" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
</div>
</body>
</html>
