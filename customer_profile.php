<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customerdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user profile information
$user_id = 1; // This should come from session or authentication in a real application
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user profile information
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];

    $sql = "UPDATE users SET name = ?, mobile = ?, age = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $name, $mobile, $age, $user_id);
    if ($stmt->execute()) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
    exit;
}

// Fetch profile data for GET request
$sql = "SELECT name, mobile, age FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-info p {
            font-size: 16px;
            margin: 10px 0;
        }
        #edit-button {
            display: block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #edit-button:hover {
            background-color: #0056b3;
        }
        #update-form {
            margin-top: 20px;
        }
        #update-form input {
            display: block;
            margin: 10px 0;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        #update-form button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #update-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Profile</h1>
        <div class="profile-info">
            <p><strong>Name:</strong> <span id="name"><?php echo htmlspecialchars($data['name']); ?></span></p>
            <p><strong>Mobile Number:</strong> <span id="mobile"><?php echo htmlspecialchars($data['mobile']); ?></span></p>
            <p><strong>Age:</strong> <span id="age"><?php echo htmlspecialchars($data['age']); ?></span></p>
        </div>
        <button id="edit-button">Update Details</button>
        <div id="update-form" style="display: none;">
            <h2>Update Details</h2>
            <form id="update-form-element">
                <label for="name-input">Name:</label>
                <input type="text" id="name-input" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
                <label for="mobile-input">Mobile Number:</label>
                <input type="text" id="mobile-input" name="mobile" value="<?php echo htmlspecialchars($data['mobile']); ?>" required>
                <label for="age-input">Age:</label>
                <input type="number" id="age-input" name="age" value="<?php echo htmlspecialchars($data['age']); ?>" required>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButton = document.getElementById('edit-button');
            const updateForm = document.getElementById('update-form');
            const updateFormElement = document.getElementById('update-form-element');

            // Show the form when the button is clicked
            editButton.addEventListener('click', function() {
                updateForm.style.display = updateForm.style.display === 'none' ? 'block' : 'none';
            });

            // Handle form submission
            updateFormElement.addEventListener('submit', function(event) {
                event.preventDefault();

                const name = document.getElementById('name-input').value;
                const mobile = document.getElementById('mobile-input').value;
                const age = document.getElementById('age-input').value;

                // Send data to PHP script
                fetch('customer_profile.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({
                        name: name,
                        mobile: mobile,
                        age: age
                    })
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    // Update profile info on the page
                    document.getElementById('name').textContent = name;
                    document.getElementById('mobile').textContent = mobile;
                    document.getElementById('age').textContent = age;
                    updateForm.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>
