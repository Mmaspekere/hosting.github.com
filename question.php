<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$db_name = 'ctu'; 
$table_name = 'question'; 


$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST["question"];

    
    $query = "INSERT INTO question (question) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $question);
    $stmt->execute();

    echo "comment or Question is submitted successfully!";
} else {
    echo "Error submitting question.";
}


$conn->close();
?>


