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
    
    $_SESSION['f_name'] = $_POST['f_name'];
    $_SESSION['mid_ini'] = $_POST['middle_initial'];
    $_SESSION['l_name'] = $_POST['l_name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['contact'] = $_POST['contact'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['address'] = $_POST['address'];

    $direction_index = "../index.php?error-";
    
    $error_fname = array("First Name is required", "First Name should only contain letters and a dot");

    if (empty($_SESSION['f_name'])) {
        header("Location: " . $direction_index . "first=" . urlencode($error_fname[0]));
        exit;
    } elseif (!preg_match('/^[A-Za-z.\s]+$/', $_SESSION['f_name'])) {
        unset($_SESSION['f_name']);
        header("Location: " . $direction_index . "first=" . urlencode($error_fname[1]));
        exit;
    }    

    $error_midname = array("Middle Initial should be a single letter");

    if (!empty($_SESSION['mid_ini']) && !preg_match('/^[A-Za-z]$/', $_SESSION['mid_ini'])) {
        unset($_SESSION['mid_ini']);
        header("Location: " . $direction_index . "middle=" . urlencode($error_midname[0]));
        exit;
    }    

    $error_lname = array("Last Name is required", "Last Name should only contain letters and a dot");

    if (empty($_SESSION['l_name'])) {
        header("Location: " . $direction_index . "last=" . urlencode($error_lname[0]));
        exit;
    } elseif (!preg_match('/^[A-Za-z.]+$/', $_SESSION['l_name'])) {
        unset($_SESSION['l_name']);
        header("Location: " . $direction_index . "last=" . urlencode($error_lname[1]));
        exit;
    }
    
    $error_age = array("Age is required and cannot be 0", "Age should be a whole number", "Age cannot be below 0");

    if (empty($_SESSION['age'])) {
        header("Location: " . $direction_index . "age=" . urlencode($error_age[0]));
        exit;
    }
    
    if (!filter_var($_SESSION['age'], FILTER_VALIDATE_INT)) {
        unset($_SESSION['age']);
        header("Location: " . $direction_index . "age=" . urlencode($error_age[1]));
        exit;
    }
    
    if ($_SESSION['age'] <= 0) {
        unset($_SESSION['age']);
        header("Location: " . $direction_index . "age=" . urlencode($error_age[2]));
        exit;
    }    
    
    $error_contact = array("Contact Number is required", "Invalid Contact Number format", "Contact Number cannot contain letters");

    if (empty($_SESSION['contact'])) {
        header("Location: " . $direction_index . "contact=" . urlencode($error_contact[0]));
        exit;
    }

    if (preg_match('/[A-Za-z]/', $_SESSION['contact'])) {
        unset($_SESSION['contact']);
        header("Location: " . $direction_index . "contact=" . urlencode($error_contact[2]));
        exit;
    }

    $cleaned_contact = preg_replace('/[^0-9+()\-\[\]]/', '', $_SESSION['contact']);

    if (empty($cleaned_contact)) {
        unset($_SESSION['contact']);
        header("Location: " . $direction_index . "contact=" . urlencode($error_contact[1]));
        exit;
    }

    $error_email = array("E-mail is required", "Invalid E-mail format");

    if (empty($_SESSION['email'])) {
        header("Location: " . $direction_index . "email=" . urlencode($error_email[0]));
        exit;
    } elseif (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
        unset($_SESSION['email']);
        header("Location: " . $direction_index . "email=" . urlencode($error_email[1]));
        exit;
    }

    $error_address = array("Address is required");

    if (empty($_SESSION['address'])) {
        unset($_SESSION['address']);
        header("Location: " . $direction_index . "address=" . urlencode($error_address[0]));
        exit;
    }

    $_SESSION['formInfo'] = new FormInfoClass();
    $_SESSION['formInfo']->setFirstName($_SESSION['f_name']);
    $_SESSION['formInfo']->setLastName($_SESSION['l_name']);
    $_SESSION['formInfo']->setMiddleInitial($_SESSION['mid_ini']);
    $_SESSION['formInfo']->setAge($_SESSION['age']);
    $_SESSION['formInfo']->setContactNo($_SESSION['contact']);
    $_SESSION['formInfo']->setEmail($_SESSION['email']);
    $_SESSION['formInfo']->setAddress($_SESSION['address']);

    header("Location: ../query/save-user.php");
    exit;
}
?>