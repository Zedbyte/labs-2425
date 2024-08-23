<?php

session_start();

/**
 * EXTRA-SECURITY.
 * To avoid redirecting chain from step-3 to step-1.
 * Check if user has already filled step-1 before redirecting back.
 */
if (
  (empty($_POST['fullname']) || empty($_POST['birthdate']) || empty($_POST['contact_number']) || empty($_POST['sex'])) &&
  (empty($_SESSION['fullname']) || empty($_SESSION['birthdate']) || empty($_SESSION['contact_number']) || empty($_SESSION['sex']))
  ) {
  header('Location: step-1.php');
  exit();
}

$fullname = empty($_SESSION['fullname']) ? $_POST['fullname'] : $_SESSION['fullname'];
$birthdate = empty($_SESSION['birthdate']) ? date('F j, Y', strtotime($_POST['birthdate'])) : $_SESSION['birthdate'];
$contact_number = empty($_SESSION['contact_number']) ? $_POST['contact_number'] : $_SESSION['contact_number'];
$sex = empty($_SESSION['sex']) ? $_POST['sex'] : $_SESSION['sex'];

$_SESSION['fullname'] = $fullname;
$_SESSION['birthdate'] = $birthdate;
$_SESSION['contact_number'] = $contact_number;
$_SESSION['sex'] = $sex;

require "partials/header.php";

dump_session();

?>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Registration (Step 2/3)
        </h1>
      </div>
      <div class="p-section--shallow">


        <form action="step-3.php" method="POST">
          <fieldset>
            <label>Program</label>
            <select name="program" required>
              <option disabled selected value="">Select an option</option>
              <option value="cs">Computer Science</option>
              <option value="it">Information Technology</option>
              <option value="is">Information Systems</option>
              <option value="se">Software Engineering</option>
              <option value="ds">Data Science</option>
            </select>

            <label>Complete Address</label>
            <textarea name="address" rows="3" required></textarea>

            <button type="submit">Next</button>
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
