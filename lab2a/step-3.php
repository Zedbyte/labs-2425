<?php

session_start();

/**
 * 
 * To avoid redirecting chain up to step-1.
 * Check if user has already filled program and address.
 */
if (
  (empty($_POST['program']) || empty($_POST['address'])) &&
  (empty($_SESSION['program']) || empty($_SESSION['address']))
  ) 
  {
  header('Location: step-2.php');
  exit();
}

$program = empty($_SESSION['program']) ? $_POST['program'] : $_SESSION['program'];
$address = empty($_SESSION['address']) ? $_POST['address'] : $_SESSION['address'];

$_SESSION['program'] = $program;
$_SESSION['address'] = $address;

require "partials/header.php";

dump_session();
?>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Registration (Step 3/3)
        </h1>
      </div>
      <div class="p-section--shallow">


        <form action="thank-you.php" method="POST">

          <fieldset>
            <label>Email address</label>
            <input type="email" name="email" placeholder="example@canonical.com" autocomplete="email" required>
  
            <label>Password</label>
            <input type="password" name="password" placeholder="******" autocomplete="current-password" required>
            
            <label class="p-checkbox--inline">
            <input type="checkbox" name="agree" required>
            </label>
            I agree to the terms and conditions...
            
            <br />
            <br />

            <button type="submit" class="p-button--positive">Finish</button>
          </fieldset>

        </form>


      </div>

    </div>

    <div class="col">
      <div class="p-image-container--3-2 is-cover">
        <img class="p-image-container__image" src="https://www.auf.edu.ph/home/images/ittc.jpg" alt="">
      </div>
    </div>

  </div>
</section>

</body>
</html>
