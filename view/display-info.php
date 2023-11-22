<?php

require_once '../controller/fetch-info.php';

if (isset($_SESSION['formInfo'])) {
    $formInfo = $_SESSION['formInfo'];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="../dist/output.css">
  <style>
  ::-webkit-scrollbar {
    width: 8px;
  }

  ::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
  }

  ::-webkit-scrollbar-track {
    background: #f0f0f0;
    border-radius: 4px;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: #20449d
  }
  </style>
</head>

<body class="bg-gray-400 h-full w-full">

  <div
    class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20 tracking-wide md:w-1/2 w-3/4 duration-300"
    style="display: block;">
    <div class="text-end font-bold text-2xl">
      <a href="../index.php" class="hover:bg-red-400 hover:text-gray-300 rounded-lg px-2">&times;</a>
    </div>
    <h1 class="text-center text-2xl font-semibold mb-5">Provided Information</h1>
    <hr class="w-full border mb-5">
    <p class="mb-1 mt-3 font-semibold">First Name: <span
        class="font-normal"><?php echo ucwords($formInfo->getFirstName()) ?></span></p>

    <?php
    $middle_initial = ucfirst($formInfo->getMiddleInitial());

    if (empty($middle_initial)) { ?>
    <p class="mb-1 mt-3 font-semibold">Middle Initial: <span class="font-normal"><?php echo $middle_initial ?></span>
    </p>
    <?php } else { ?>
    <p class="mb-1 mt-3 font-semibold">Middle Initial: <span class="font-normal"><?php echo $middle_initial ?>.</span>
    </p>
    <?php } ?>

    <p class="mb-1 mt-3 font-semibold">Last Name: <span
        class="font-normal"><?php echo ucwords($formInfo->getLastName()) ?></span></p>
    <p class="mb-1 mt-3 font-semibold">Age: <span class="font-normal"><?php echo $formInfo->getAge() ?></span></p>
    <p class="mb-1 mt-3 font-semibold">Contact No: <span
        class="font-normal"><?php echo $formInfo->getContactNo() ?></span></p>
    <p class="mb-1 mt-3 font-semibold">E-mail: <span class="font-normal"><?php echo $formInfo->getEmail() ?></span></p>
    <p class="mb-1 mt-3 font-semibold">Address: <span
        class="font-normal"><?php echo ucwords($formInfo->getAddress()) ?></span></p>
  </div>

</body>

</html>

<?php
    unset($_SESSION['formInfo']);
} else {
    header("Location: ../index.php");
    exit;
}
?>