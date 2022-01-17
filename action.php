<?php
$reponse = array();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "axioswithphp";
$conn =  new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    $response['db_error'] = "connection failed:" . $conn->connect_error;
}

$res = json_decode(file_get_contents('php://input'), true);
$name = $res['name'];
$age = $res['age'];
if (empty(trim($name))) {
    $reponse['nameerror'] = 'Name is required';
}
if (empty(trim($age))) {
    $reponse['ageerror'] = 'Age is required';
}
if (empty($reponse)) {

    // $insert = $conn->query("INSERT INTO users (name, age) VALUES ('$name', '$age')");
    $insert = $conn->prepare("INSERT INTO users (name, age) VALUES (?, ?)");
    /*
      s - string
      i - integer
        d - double
        b - blob
    */
    // Bind the variables to the parameter
    $insert->bind_param("si", $name, $age);

    // Assign variables
    $name = $res['name'];
    $age = (int) $res['age'];
    // Execute the statement
    if (!$insert->execute()) {
        $response['db_error'] = "insertion failed:" . $conn->error;
    }

    //INSERT USING PREPARED STATEMENT AND BOUND PARAMETERS


    $reponse['success'] = "Your data is successfully submitted";
}
header('Content-Type: application/json');
echo json_encode($reponse);
