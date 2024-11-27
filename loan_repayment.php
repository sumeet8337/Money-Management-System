<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Repayment Page</title>
    <style>
        /* CSS styles can be included here or in an external CSS file */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type=number] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Loan Repayment Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="amount">Repayment Amount:</label>
            <input type="number" id="amount" name="amount" required>
            <button type="submit">Submit Repayment</button>
        </form>

        <h2>Repayment History</h2>
        <ul>
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "your_username";
            $password = "your_password";
            $dbname = "your_database";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Process form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $amount = $_POST['amount'];

                // Insert repayment into database
                $sql = "INSERT INTO repayment_history (amount, date) VALUES ($amount, NOW())";

                if ($conn->query($sql) === TRUE) {
                    echo "<li>Amount: " . $amount . " Date: " . date("Y-m-d H:i:s") . "</li>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Fetch and display repayment history
            $sql = "SELECT amount, date FROM repayment_history ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>Amount: " . $row["amount"] . " Date: " . $row["date"] . "</li>";
                }
            } else {
                echo "<li>No repayment history found.</li>";
            }

            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>
