<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];

$birthdate = !empty($birthdate) ? date('F j, Y', strtotime($birthdate)) : 'No birthdate provided';

$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];
$answer = $_POST['answer'] ?? [];
// if (!is_null($answer)) {
//     $answers .= $answer;
// }

$answers = [];
foreach ($_POST as $key => $value) {
    // Check if the key matches the pattern for radio button names (e.g., "answer0[]")
    if (preg_match('/^answers\d+/', $key)) {
        $answers = array_merge($answers, (array) $value);
    }
}

// Use the compute_score() function from helpers.php
$score = compute_score($answers);

// If the examinee’s score is beyond 2 points, the hero section should use is-success class, otherwise use the is-danger class.
$hero_class = "is-danger";
if ($score > 200) {
    $hero_class = "is-success";
}

// The confetti canvas should only be displayed if the user got a perfect score 5/5.
$confetti = "none";
if ($score == 500) {
    $confetti = "block";
}

?>
<html data-theme="dark" style="overflow:hidden;">

<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>

<body>
    <section class="hero section <?= $hero_class?> ">
        <progress class="progress is-link" value="100" max="100">100%</progress>
        <div class="hero-body">
            <p class="title">Your Score <?php echo $score; ?></p>
            <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
        </div>
    </section>
    <section class="section">
        <div class="table-container" style="border-radius: 10px;">
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <tbody>
                    <tr>
                        <th>Input Field</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>Complete Name</td>
                        <td><?php echo $complete_name; ?></td>
                    </tr>
                    <tr class="is-selected">
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Birthdate</td>
                        <td><?php echo $birthdate; ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><?php echo $contact_number; ?></td>
                    </tr>
                </tbody>
            </table>

            <?php 
            
            $questions = retrieve_questions();
            
            ?>

            <h1 class="title">Quiz Data</h1>
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <tbody>
                    <tr>
                        <th>Questions</th>
                        <th>Your Answers</th>
                        <th>Correct Answers</th>
                    </tr>

                    
                    <?php
                    for($i = 0; $i < MAX_QUESTION_NUMBER; $i++) { ?>
                        <tr>
                            <td>
                                <?php echo $questions['questions'][$i]['question']; ?>
                            </td>

                            <?php 
                                $c_answer = $questions['answers'][$i];
                                $u_answer = $answers[$i];

                                $options = $questions['questions'][$i]['options'];

                                $c_answer_text = '';
                                $u_answer_text = '';
                                
                                foreach ($options as $option) {
                                    if ($option['key'] === $c_answer) {
                                        $c_answer_text = $option['value'];
                                    }
                                    if ($option['key'] === $u_answer) {
                                        $u_answer_text = $option['value'];
                                    }
                                }

                                $class = "is-danger";
                                if ($c_answer === $u_answer) {
                                    $class = "is-success";
                                }
                            ?>
                            <td class="<?=$class?>">
                                <?php echo $u_answer . '. ' . $u_answer_text; ?>
                            </td>

                            <td class="is-success">
                                <?php echo $c_answer . '. ' . $c_answer_text; ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

        <canvas id="confetti-canvas" style="position: absolute; top:0; display: <?=$confetti?>"></canvas>
    </section>

    <script>
        var confettiSettings = {
            target: 'confetti-canvas'
        };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();
    </script>
</body>

</html>