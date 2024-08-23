<?php
# from the $_SERVER global variable, check if the HTTP method used is POST, if its not POST, redirect to the index.php page
# Reference: https://www.php.net/manual/en/reserved.variables.server.php

// Supply the missing code
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
?>
<html>

<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>

<body>
    <section class="section">
        <progress class="progress is-primary" value="33" max="100">33%</progress>
        <h1 class="title is-size-4">
            Hello <?= $complete_name ?>, please read the instructions first.
        </h1>
        <hr/>
        <h1 class="title">Instructions</h1>
        <h2 class="subtitle">
            This is the IPT10 PHP Quiz Web Application Laboratory Activity.
        </h2>

        <!-- Supply the correct HTTP method and target form handler resource -->
        <form method="POST" action="quiz.php">
            <input name="complete_name" type="hidden" value="<?php echo $complete_name; ?>" />
            <input name="email" type="hidden" value="<?php echo $email; ?>" />
            <input name="birthdate" type="hidden" value="<?php echo $birthdate; ?>" />
            <input name="contact_number" type="hidden" value="<?php echo $contact_number; ?>" />

            <!-- Display the instruction -->
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>

            <div class="field">
                <label class="label">Terms and conditions</label>
                <div class="control">
                    <textarea class="textarea" placeholder="Textarea"
                        disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input class="agree" type="checkbox" name="agree">
                        I agree to the <a href="#">terms and conditions</a>
                    </label>
                </div>
            </div>

            <!-- Start Quiz button -->
            <button type="submit" class="button is-link">Start Quiz</button>
            <script src="../lab3a/javascript/instructions.js"></script>
        </form>
    </section>

</body>

</html>