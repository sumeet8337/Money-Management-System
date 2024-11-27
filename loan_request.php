<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Request</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #loanStatus {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Loan Request Form</h1>
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle form submission
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $income = $_POST['income'];

            // Example logic to determine eligibility (you can modify this according to your criteria)
            if ($income >= $amount / 10) {
                $status = "Approved";
            } else {
                $status = "Rejected";
            }

            // Display loan status
            echo '<div id="loanStatus">';
            echo '<p>Loan Request Status:</p>';
            echo '<ul>';
            echo '<li>Name: ' . htmlspecialchars($name) . '</li>';
            echo '<li>Loan Amount: ₹' . htmlspecialchars($amount) . '</li>';
            echo '<li>Status: ' . $status . '</li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
        <form method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="amount">Loan Amount (₹):</label>
            <input type="number" id="amount" name="amount" required>

            <label for="income">Monthly Income (₹):</label>
            <input type="number" id="income" name="income" required>

            <button type="submit">Submit Loan Request</button>
        </form>
    </div>
</body>
</html>
