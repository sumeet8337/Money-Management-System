<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customerdb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['name'];
    $mobile = $data['mobile'];
    $amount = $data['amount'];
    $interest = $data['interest'];
    $shares = $data['shares'];
    $total = $data['total'];

    $sql = "INSERT INTO customers (name, mobile, amount, interest, shares, total)
            VALUES ('$name', '$mobile', '$amount', '$interest', '$shares', '$total')";

    $response = [];

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    echo json_encode($response);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #ffe6cc
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            background-color: #e6f7ff; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555; 
        }

        input[type="text"], input[type="number"] {
            width: 15%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease; 
        }

        button:hover {
            background-color: #45a049; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            border-radius: 8px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2; 
        }
    </style>
</head>
<body>
    <h1>Customer Details</h1>
    <form id="customerForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile" required><br>
        
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required><br>
        
        <label for="shares">Shares:</label>
        <input type="text" id="shares" name="shares" required><br>

        <label for="interest">Interest:</label>
        <input type="text" id="interest" name="interest" required><br>
        
        <label for="total">Total Amount:</label>
        <input type="text" id="total" name="total" readonly><br>
        
        <button type="submit">Save</button>
    </form>
    
    

    <script>
        document.getElementById('customerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const mobile = document.getElementById('mobile').value;
            const amount = parseFloat(document.getElementById('amount').value);
            const interest = parseFloat(document.getElementById('interest').value);
            const shares = parseFloat(document.getElementById('shares').value);
            const total = amount + (amount * interest / 100) + shares;

            document.getElementById('total').value = total;

            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ name, mobile, amount, interest, shares, total })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Customer details saved successfully');
                    addCustomerToList(name, mobile, amount, interest, shares, total);
                } else {
                    alert('Failed to save customer details');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function addCustomerToList(name, mobile, amount, interest, shares, total) {
            const customerList = document.getElementById('customerList');
            const row = document.createElement('tr');
            
            row.innerHTML = `
                <td>${name}</td>
                <td>${mobile}</td>
                <td>${amount}</td>
                <td>${interest}</td>
                <td>${shares}</td>
                <td>${total}</td>
            `;

            customerList.appendChild(row);
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
