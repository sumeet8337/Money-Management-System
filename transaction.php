<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        /* CSS Styles */
        .transaction-history {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="transaction-history">
        <h1>Transaction History</h1>
        <div id="transaction-list">
            <?php
            // PHP Logic
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

            // Fetch contributions
            $sql_contributions = "SELECT * FROM contributions";
            $result_contributions = $conn->query($sql_contributions);

            if ($result_contributions->num_rows > 0) {
                echo "<h2>Contributions</h2>";
                echo "<ul>";
                while($row = $result_contributions->fetch_assoc()) {
                    echo "<li>Contributor: " . $row["contributor_id"]. " - Amount: " . $row["amount"]. " - Date: " . $row["date"]. "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No contributions found.</p>";
            }

            // Fetch loans
            $sql_loans = "SELECT * FROM loans";
            $result_loans = $conn->query($sql_loans);

            if ($result_loans->num_rows > 0) {
                echo "<h2>Loans</h2>";
                echo "<ul>";
                while($row = $result_loans->fetch_assoc()) {
                    echo "<li>Borrower: " . $row["borrower_id"]. " - Amount: " . $row["amount"]. " - Date: " . $row["date"]. "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No loans found.</p>";
            }

            // Fetch repayments
            $sql_repayments = "SELECT * FROM repayments";
            $result_repayments = $conn->query($sql_repayments);

            if ($result_repayments->num_rows > 0) {
                echo "<h2>Repayments</h2>";
                echo "<ul>";
                while($row = $result_repayments->fetch_assoc()) {
                    echo "<li>Loan ID: " . $row["loan_id"]. " - Amount: " . $row["amount"]. " - Date: " . $row["date"]. "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No repayments found.</p>";
            }

            // Fetch shares
            $sql_shares = "SELECT * FROM shares";
            $result_shares = $conn->query($sql_shares);

            if ($result_shares->num_rows > 0) {
                echo "<h2>Shares</h2>";
                echo "<ul>";
                while($row = $result_shares->fetch_assoc()) {
                    echo "<li>Contributor: " . $row["contributor_id"]. " - Amount: " . $row["amount"]. " - Date: " . $row["date"]. "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No shares found.</p>";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
