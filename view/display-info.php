<?php
session_start();

require '../config/database.php';

$global_insertedUserId = isset($_SESSION['insertedUserId']) ? $_SESSION['insertedUserId'] : null;

if ($global_insertedUserId) {
$sql = "SELECT * FROM user WHERE User_ID = $global_insertedUserId AND Deleted_At IS NULL";

try {
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            ?>

<head>
  <title>Provided Information</title>
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

<body class="bg-gray-400 h-full w-full overflow-auto">

  <div
    class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20 tracking-wide md:w-1/2 w-3/4 duration-300"
    style="display: block;">
    <div class="text-end font-bold text-2xl">
      <a href="../index.php" class="hover:bg-red-400 hover:text-gray-300 rounded-lg px-2">&times;</a>
      <?php
          unset($_SESSION['f_name']);
          unset($_SESSION['mid_ini']);
          unset($_SESSION['l_name']);
          unset($_SESSION['age']);
          unset($_SESSION['contact']);
          unset($_SESSION['email']);
          unset($_SESSION['address']);
      ?>
    </div>
    <h1 class="text-center text-2xl font-semibold mb-5">Provided Information</h1>
    <hr class="w-full border mb-5">
    <p class="mb-1 mt-3 font-semibold">First Name: <span
        class="font-normal"><?php echo ucwords($row['First_Name']) ?></span></p>

    <?php
          $middle_initial = ucfirst($row['Middle_Initial']);

          if (empty($middle_initial)) { ?>
    <p class="mb-1 mt-3 font-semibold">Middle Initial: <span class="font-normal"><?php echo $middle_initial ?></span>
    </p>
    <?php } else { ?>
    <p class="mb-1 mt-3 font-semibold">Middle Initial: <span class="font-normal"><?php echo $middle_initial ?>.</span>
    </p>
    <?php } ?>

    <p class="mb-1 mt-3 font-semibold">Last Name: <span
        class="font-normal"><?php echo ucwords($row['Last_Name']) ?></span></p>
    <p class="mb-1 mt-3 font-semibold">Age: <span class="font-normal"><?php echo $row['Age'] ?></span></p>
    <p class="mb-1 mt-3 font-semibold">Contact No: <span class="font-normal"><?php echo $row['Contact_No'] ?></span></p>
    <p class="mb-1 mt-3 font-semibold">E-mail: <span class="font-normal"><?php echo $row['Email'] ?></span></p>
    <p class="mb-1 mt-3 font-semibold">Address: <span class="font-normal"><?php echo ucwords($row['Address']) ?></span>
    </p>
  </div>
</body>

<?php
            }
        } else {
            throw new Exception("Error executing query: " . $conn->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conn->close();
    }
} else {
    echo "No valid user ID found in the session.";
}
?>