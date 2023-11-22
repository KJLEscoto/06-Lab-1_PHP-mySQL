<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="./dist/output.css">
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

  label {
    font-weight: 500;
  }
  </style>
</head>

<body class="bg-gray-400 h-full w-full">

  <div
    class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20 tracking-wide md:w-1/2 w-3/4 duration-300"
    style="display: block; max-height: 80%; overflow-y: scroll;">
    <form action="./controller/fetch-info.php" method="POST">

      <h1 class="text-center m-auto mb-5 font-semibold text-2xl">
        Register
      </h1>

      <hr class="w-full border mb-5">

      <section class="lg:flex block duration-300">
        <label class="mr-2">First Name*</label><br>
        <?php if (isset($_GET['error-first'])) { ?>
        <p class="text-red-500"><?php echo "(" . $_GET['error-first'] . ")"?></p>
        <?php } ?>
      </section>
      <input class=" w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500
      outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3" type="text" name="f_name" placeholder="Gol"
        value="<?php if(isset($_SESSION['first'])) { echo $_SESSION['first']; } ?>">

      <section class="lg:flex block duration-300">
        <label class="mr-2">Middle Initial</label><br>
        <?php if (isset($_GET['error-middle'])) { ?>
        <p class="text-red-500"><?php echo "(" . $_GET['error-middle'] . ")"?></p>
        <?php } ?>
      </section>
      <input class=" w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500
      outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3" type="text" name="middle_initial"
        placeholder="D (Optional)" value="<?php if(isset($_SESSION['mid'])) { echo $_SESSION['mid']; } ?>">

      <section class="lg:flex block duration-300">
        <label class="mr-2">Last Name*</label><br>
        <?php if (isset($_GET['error-last'])) { ?>
        <p class="text-red-500"><?php echo "(" . $_GET['error-last'] . ")"?></p>
        <?php } ?>
      </section>
      <input class=" w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500
      outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3" type="text" name="l_name" placeholder="Roger"
        value="<?php if(isset($_SESSION['last'])) { echo $_SESSION['last']; } ?>">

      <section class="lg:flex block duration-300">
        <label class="mr-2">Age*</label><br>
        <?php if (isset($_GET['error-age'])) { ?>
        <p class="text-red-500"><?php echo "(" . $_GET['error-age'] . ")"?></p>
        <?php } ?>
      </section>
      <input
        class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
        name="age" placeholder="69" value="<?php if(isset($_SESSION['age'])) { echo $_SESSION['age']; } ?>">

      <section class="lg:flex block duration-300">
        <label class="mr-2">Contact No.*</label><br>
        <?php if (isset($_GET['error-contact'])) { ?>
        <p class="text-red-500"><?php echo "(" . $_GET['error-contact'] . ")"?></p>
        <?php } ?>
      </section>
      <input
        class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
        name="contact" placeholder="09123456789"
        value="<?php if(isset($_SESSION['contact'])) { echo $_SESSION['contact']; } ?>">

      <section class="lg:flex block duration-300">
        <label class="mr-2">E-mail*</label><br>
        <?php if (isset($_GET['error-email'])) { ?>
        <p class="text-red-500"><?php echo "(" . $_GET['error-email'] . ")"?></p>
        <?php } ?>
      </section>
      <input
        class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
        type="email" name="email" placeholder="example123@gmail.com"
        value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>">

      <section class="lg:flex block duration-300">
        <label class="mr-2">Address*</label><br>
        <?php if (isset($_GET['error-address'])) { ?>
        <p class="text-red-500"><?php echo "(" . $_GET['error-address'] . ")"?></p>
        <?php } ?>
      </section>
      <input
        class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
        name="address" placeholder="123, Main St."
        value="<?php if(isset($_SESSION['address'])) { echo $_SESSION['address']; } ?>">

      <section class="flex justify-center items-center mt-5">
        <button type="submit" name="submit-form"
          class="border-2 py-2 px-10 shadow-md tracking-wider rounded-lg bg-[#5495C9] font-semibold text-white border-[#2e5679] transition duration-300 ease-in-out hover:opacity-75 w-full">Submit
        </button>
      </section>
    </form>
  </div>

</body>

</html>