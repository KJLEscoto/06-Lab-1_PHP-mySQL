<?php
session_start();

class FormInfoClass {
    private $lastName;
    private $firstName;
    private $middleInitial;
    private $age;
    private $contactNo;
    private $email;
    private $address;

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setMiddleInitial($middleInitial) {
        $this->middleInitial = $middleInitial;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setContactNo($contactNo) {
        $this->contactNo = $contactNo;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getMiddleInitial() {
        return $this->middleInitial;
    }

    public function getAge() {
        return $this->age;
    }

    public function getContactNo() {
        return $this->contactNo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }
}

if (isset($_POST['submit-form'])) {
    $direction_index = "../index.php?error-";

    $f_name = $_POST['f_name'];
    $mid_name = $_POST['middle_initial'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];
    $contact_no = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $error_fname = array("First Name is required", "First Name should only contain letters and a dot (if needed)");

    if (empty($f_name)) {
        header("Location: " . $direction_index . "first=" . urlencode($error_fname[0]));
        exit;
    } elseif (!preg_match('/^[A-Za-z.]+$/', $f_name)) {
        $_SESSION['first'] = $f_name;
        header("Location: " . $direction_index . "first=" . urlencode($error_fname[1]));
        exit;
    }

    $error_midname = array("Middle Initial should be a single letter");

    if (!empty($mid_name) && !preg_match('/^[A-Za-z]$/', $mid_name)) {
        $_SESSION['middle'] = $mid_name;
        header("Location: " . $direction_index . "middle=" . urlencode($error_midname[0]));
        exit;
    }

    $error_lname = array("Last Name is required", "Last Name should only contain letters and a dot (if needed)");

    if (empty($l_name)) {
        header("Location: " . $direction_index . "last=" . urlencode($error_lname[0]));
        exit;
    } elseif (!preg_match('/^[A-Za-z.]+$/', $l_name)) {
        $_SESSION['last'] = $l_name;
        header("Location: " . $direction_index . "last=" . urlencode($error_lname[1]));
        exit;
    }

    $error_age = array("Age is required", "Age should be a number", "Age cannot be below 0");

    if (empty($age)) {
        header("Location: " . $direction_index . "age=" . urlencode($error_age[0]));
        exit;
    }

    if (!is_numeric($age)) {
        $_SESSION['age'] = $age;
        header("Location: " . $direction_index . "age=" . urlencode($error_age[1]));
        exit;
    } elseif ($age < 0) {
        $_SESSION['age'] = $age;
        header("Location: " . $direction_index . "age=" . urlencode($error_age[2]));
        exit;
    }

    $error_contact = array("Contact Number is required", "Invalid Contact Number format", "Contact Number cannot contain letters");

    if (empty($contact_no)) {
        header("Location: " . $direction_index . "contact=" . urlencode($error_contact[0]));
        exit;
    }

    if (preg_match('/[A-Za-z]/', $contact_no)) {
        $_SESSION['contact'] = $contact_no;
        header("Location: " . $direction_index . "contact=" . urlencode($error_contact[2]));
        exit;
    }

    $cleaned_contact = preg_replace('/[^0-9+()\-\[\]]/', '', $contact_no);

    if (empty($cleaned_contact)) {
        header("Location: " . $direction_index . "contact=" . urlencode($error_contact[1]));
        exit;
    }

    $error_email = array("E-mail is required", "Invalid E-mail format");

    if (empty($email)) {
        header("Location: " . $direction_index . "email=" . urlencode($error_email[0]));
        exit;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email'] = $email;
        header("Location: " . $direction_index . "email=" . urlencode($error_email[1]));
        exit;
    }

    $error_address = array("Address is required");

    if (empty($address)) {
        header("Location: " . $direction_index . "address=" . urlencode($error_address[0]));
        exit;
    }

    $_SESSION['formInfo'] = new FormInfoClass();
    $_SESSION['formInfo']->setFirstName($f_name);
    $_SESSION['formInfo']->setLastName($l_name);
    $_SESSION['formInfo']->setMiddleInitial($mid_name);
    $_SESSION['formInfo']->setAge($age);
    $_SESSION['formInfo']->setContactNo($contact_no);
    $_SESSION['formInfo']->setEmail($email);
    $_SESSION['formInfo']->setAddress($address);

    header("Location: ../view/display-info.php");
    exit;
}
?>