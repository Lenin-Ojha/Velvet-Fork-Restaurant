<?php
// DB connection
$server ="localhost";
$username = "root";
$password="";

$conn = new mysqli("localhost", "root", "", "restaurant_project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$identity_type = isset($_POST['identity_type']) ? $_POST['identity_type'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$booking_date = $_POST['date'];
$from_time = $_POST['from_time'];
$to_time = $_POST['to_time'];
$occasion = $_POST['occasion'];
$hall_name = isset($_POST['hall_name']) ? $_POST['hall_name'] : '';
$number_of_people = isset($_POST['number_of_people']) ? $_POST['number_of_people'] : '';
$photo_video_requirement = $_POST['photo_video'];
$description = $_POST['description'];
$special_request = $_POST['special_request'];


// Insert query
$sql = "INSERT INTO bookings (name, phone, email, identity_type, location, booking_date, from_time, to_time, occasion, hall_name, number_of_people, photo_video_requirement, description, special_request)
VALUES ('$name', '$phone', '$email', '$identity_type', '$location', '$booking_date', '$from_time', '$to_time', '$occasion', '$hall_name', '$number_of_people', '$photo_video_requirement', '$description', '$special_request')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successful!";
    // Optional: redirect to a confirmation page
    // header("Location: confirmation_page.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>