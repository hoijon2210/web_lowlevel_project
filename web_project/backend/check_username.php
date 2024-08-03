<?php
$servername = "localhost";
$username = "root";
$password = "9&zearn0#ZN0%";
$dbname = "webserver";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST["username"];

    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM members WHERE id = ?");
    $stmt->bind_param("s", $inputUsername);

    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    header('Connent-Type: application/json');
    if ($count > 0) {
        echo json_encode(["avilable" => false]);
    } else {
        echo json_encode(["availabel" => true]);
    }
}
?>