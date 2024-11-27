<?php
// Database connection
include("includes/db.php");

// Handle user management (Add, Edit, Delete)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_user'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO new_users (name, phone) VALUES ('$name', '$phone')";
        if ($con->query($sql) === TRUE) {
            echo "New user registered successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    // Handle edit and delete functionality here
}

// Fetch user data
$sql_users = "SELECT * FROM new_users";
$result_users = $con->query($sql_users);

// Fetch contribution and loan data
$sql_contributions = "SELECT COUNT(*) AS contributed FROM new_contributions WHERE amount > 0";
$result_contributions = $con->query($sql_contributions);
$contributed = $result_contributions->fetch_assoc()['contributed'];

$sql_total_users = "SELECT COUNT(*) AS total FROM new_users";
$result_total_users = $con->query($sql_total_users);
$total_users = $result_total_users->fetch_assoc()['total'];

$sql_loans = "SELECT COUNT(*) AS taken_loan FROM new_loans WHERE amount > 0";
$result_loans = $con->query($sql_loans);
$taken_loan = $result_loans->fetch_assoc()['taken_loan'];

$not_contributed = $total_users - $contributed;
$not_taken_loan = $total_users - $taken_loan;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Users</h1>

        <h2>Register New User</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            <br>
            <input type="submit" name="add_user" value="Register">
        </form>

        

       
    </div>
</body>
</html>
