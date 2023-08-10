<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $con = mysqli_connect('localhost', 'id21065487_hardik', 'Hardik@webhost10', 'id21065487_mydatabase');

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Sanitize user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Create the SQL query
    $sql = "INSERT INTO contact_form_dataTable (fldname, fldEmail, fldPhone, fldMessage) VALUES ('$name', '$email', '$phone', '$message')";

    // Execute the query
    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo "<h2>Thank you for your message, $name!</h2>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone</p>";
        echo "<p>Message: $message</p>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
