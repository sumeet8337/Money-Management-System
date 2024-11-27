<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "customerdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['amount']) && isset($_POST['mobile_number'])) {
        $contribution_amount = $_POST['amount'];
        $mobile_number = $_POST['mobile_number'];
        $contribution_date = date('Y-m-d'); // Current date

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO contributions (date, amount, mobile_number) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $contribution_date, $contribution_amount, $mobile_number);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New contribution recorded successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}

// Fetch contribution history
$history = array();
$sql = "SELECT date, amount, mobile_number FROM contributions ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $history[] = array($row['date'], "₹" . number_format($row['amount'], 2), $row['mobile_number']);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribution Page</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        form {
            margin-bottom: 20px;
        }

        .contribution-history {
            margin-top: 10px;
        }

        .contribution-history p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Monthly Contribution Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="amount">Contribution Amount (₹):</label>
            <input type="text" id="amount" name="amount" required>
            
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number" required>
            
            <button type="submit">Submit</button>
        </form>
        
        
    </div>

   
</body>
</html>
