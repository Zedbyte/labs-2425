<?php

require "helpers.php";

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
$agree = $_POST['agree'];
// $answer = $_POST['answer'] ?? null;
$answers = $_POST['answers'] ?? null;
// if (!is_null($answer)) {
//     $answers .= $answer;
// }

$questions = retrieve_questions();
// $current_question = get_current_question($answers);
// $current_question_number = get_current_question_number($answers);

$target = 'result.php';
// if ($current_question_number == MAX_QUESTION_NUMBER) {
//     $target = 'result.php';
// }

// $options = get_options_for_question_number($current_question_number);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>


<section class="section">
    <progress class="progress is-primary" value="66" max="100">66%</progress>

    <div class="section">
        <h1 id="timer" class="title">60 seconds remaining</h1>
        <progress class="clock progress is-primary" value="100" max="100">
            100%
        </progress>
    </div>

    <form method="POST" action="<?php echo $target; ?>" id="auto-submit-form">
        <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
        <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />
        <input type="hidden" name="agree" value="<?php echo $agree; ?>" />
        
        <input type="hidden" name="answers" value="<?php echo htmlspecialchars($answers); ?>" />

        <?php
        foreach($questions['questions'] as $key => $value): ?>
            <div class="box">
                <h1 class="title">Question <?php echo $key+1; ?> / <?php echo MAX_QUESTION_NUMBER; ?></h1>
                <h2 class="subtitle">
                    <?php echo $value['question']; ?>
                </h2>

                <?php foreach($value['options'] as $index => $option): ?>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio"
                                    name="answers<?php echo $key?>[]"
                                    value="<?php echo $option['key']; ?>" />
                                    <?php echo $option['value']; ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>


        <!-- Start Quiz button -->
        <button type="submit" class="button">Submit</button>
        <script src="../lab3a/javascript/quiz.js"></script>
    </form>
</section>


</body>
</html>