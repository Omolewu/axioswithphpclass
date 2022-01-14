<?php
$res = json_decode(file_get_contents('php://input'), true);
$name = $res['name'];
$age = $res['age'];
$reponse = array();
if (empty(trim($name))) {
    $reponse['nameerror'] = 'Name is required';
}
if (empty(trim($age))) {
    $reponse['ageerror'] = 'Age is required';
}
if (empty($reponse)) {
    $reponse['success'] = "Your data is successfully submitted";
}
header('Content-Type: application/json');
echo json_encode($reponse);
