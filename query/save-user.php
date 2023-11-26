<?php
require '../config/database.php';

$sql = $conn->prepare("INSERT INTO user (First_Name, Last_Name, Middle_Initial, Age, Contact_No, Email, Address) VALUES (?,?,?,?,?,?,?)");

$sql->bind_param("sssisss", $first_name, $last_name, $middle_initial, $age, $contact_no, $email, $address);

require_once '../controller/fetch-info.php';

$formInfo = $_SESSION['formInfo'];

$first_name = $formInfo->getFirstName();
$last_name = $formInfo->getLastName();
$middle_initial = $formInfo->getMiddleInitial();
$age = $formInfo->getAge();
$contact_no = $formInfo->getContactNo();
$email = $formInfo->getEmail();
$address = $formInfo->getAddress();
$sql->execute();

$insertedUserId = $sql->insert_id;
$_SESSION['insertedUserId'] = $insertedUserId;

$sql->close();
$conn->close();

header("Location: ../view/display-info.php");
exit();
?>