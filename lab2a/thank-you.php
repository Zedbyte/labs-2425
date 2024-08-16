<?php

define('DATA_FILE_PATH', 'registrations.csv');

session_start();

if (count($_SESSION) < 5) {
  header('Location: index.php');
  exit();
}

// If either email, password, and agreement is empty, go back to previous step-3.
if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['agree'])) {
  header('Location: step-3.php');
  exit();
}

require "helpers/get_age.php";
require "helpers/save_data.php";

$email = $_POST['email'];
$password = md5($_POST['password']);
$agree = $_POST['agree'];
$age = get_age($_SESSION['birthdate']);

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['agree'] = $agree;
$_SESSION['age'] = $age;

$form_data = $_SESSION;

require "partials/header.php";

if (!empty($form_data)) {
  $headerExists = check_if_header_exists(DATA_FILE_PATH, $form_data);
  write_data_to_csv($form_data, DATA_FILE_PATH, $headerExists);
}


?>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Thank You Page
        </h1>
      </div>
      <div class="p-section--shallow">
      
        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php echo $val; ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
      

      </div>

      <form action="index.php" method="get">
        <button>Go back to Home.</button>
      </form>

      <form action="registrants.php" method="get">
        <button>See All Data</button>
      </form>

    </div>
  </div>
</section>

</body>
</html>

<?php 

require "partials/footer.php";
session_destroy();
$_POST = array();

?>