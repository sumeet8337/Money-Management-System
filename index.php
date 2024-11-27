<?php
// PHP code for handling the contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Simple email sending functionality (example)
    $to = "support@mmssystem.com";
    $subject = "Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $contactMessage = "<p>Thank you for contacting us, $name. We will get back to you shortly.</p>";
    } else {
        $contactMessage = "<p>Sorry, something went wrong. Please try again later.</p>";
    }
} else {
    $contactMessage = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Management System - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Money Management System</h1>
        <nav>
            
        </nav>
    </header>
    
    <main>
        <section id="overview">
            <h2>Overview</h2>
            <p>Welcome to the Money Management System, where you can easily contribute and manage funds within a group. Each month, 20 participants contribute ₹10,000 each, creating a total pool of ₹200,000. This amount is then loaned to two members at 2% interest. Contributions are tracked, and participants receive updates and reminders to ensure smooth operations.</p>
        </section>

        <section id="how-it-works">
            <h2>How It Works</h2>
            <ol>
                <li>20 participants each contribute ₹10,000 monthly.</li>
                <li>Total ₹200,000 is loaned out to 2 participants at 2% interest.</li>
                <li>Contributions and repayments are tracked and updated regularly.</li>
                <li>Participants receive monthly reminders for contributions.</li>
            </ol>
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, please reach out to us at:</p>
            <p>Email: <a href="mailto:support@mmssystem.com">support@mmssystem.com</a></p>
            <p>Phone: +91-123-456-7890</p>
            <button onclick="document.getElementById('contact-form').scrollIntoView();">Contact Us</button>
        </section>

        
    </main>

    <h1 align="center"><a href="customer_login.php"><button type="button" class="btn btn-success" name="">Login</button></a></h1>
<h1 align="center"><a href="admin/admin_login.php"><button type="button" class="btn btn-success" name="">Admin</button></a></h1>

</body>
</html>
