<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Contribution Form</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        button:hover {
            background-color: #45a049;
        }

        h2 {
            margin-top: 30px;
        }

        #contribution-history {
            /* Style contribution history */
        }

        #current-balance {
            /* Style current balance */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shares Contribution</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="amount">Enter Contribution Amount (₹):</label>
            <input type="number" id="amount" name="amount" required>
            <button type="submit">Submit Contribution</button>
        </form>
        
        <h2>Contribution History</h2>
        <div id="contribution-history">
            <?php
            // PHP code to fetch and display contribution history
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "your_database";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch contribution history
            $sql = "SELECT * FROM contributions ORDER BY contributed_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Amount: ₹" . $row["amount"] . " contributed on " . $row["contributed_at"] . "<br>";
                }
            } else {
                echo "No contributions yet.";
            }

            $conn->close();
            ?>
        </div>
        
        <h2>Current Balance</h2>
        <div id="current-balance">
            <?php
            // PHP code to calculate and display current balance
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to calculate current balance
            $sql = "SELECT SUM(amount) AS total_contributions FROM contributions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "Total Balance: ₹" . $row["total_contributions"];
            } else {
                echo "Total Balance: ₹0";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"];

    // Connect to database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert contribution into database
    $sql = "INSERT INTO contributions (amount) VALUES ($amount)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Contribution added successfully.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
