<?php
    $host = 'localhost';
    $user = 'root';
    $pw = '9&zearn0#ZN0%;'
    $dbName = 'webserver';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli($host, $user, $pw, $dbName);

    if ($conn->connect_error) {
        die("connection failed: ". $conn->connect_error);
    }

    $id = $_POST['username'];
    $pw = $_POST['password'];
    $birth = $_POST['ssn'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO members (id, pw, phone, birth, address) VALUES ('$id', '$pw', '$phone', '$birth', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "회원가입이 성공적으로 완료되었습니다.";
    } else {
        echo "오류: " .$sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>