<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file_upload']) && isset($_POST['file_type'])) {
    $upload_directory = getcwd() . '/uploads/';

    $file_name_text = $_FILES['text_file']['name'];
    $file_name_pdf = $_FILES['pdf_file']['name'];

    $uploaded_file_text = $upload_directory . basename($file_name_text);
    $uploaded_file_pdf = $upload_directory . basename($file_name_pdf);

    $temporary_file_text = $_FILES['text_file']['tmp_name'];
    $temporary_file_pdf = $_FILES['pdf_file']['tmp_name'];

    if (!file_exists($upload_directory)) {
        mkdir($upload_directory);
    }

    if (move_uploaded_file($temporary_file_text, $uploaded_file_text)) {
        $relative_path = 'uploads/';
        $text_path = $relative_path . $file_name_text;

        require './partials/header.php'
        ?>
            <body>
                <div class="h-100 container">
                    <div class="h-100 grid">
                        <div class="file__container">
                        <object data="<?php echo $text_path ?>" type="text/plain" width="100%" height="100%">
                        <p>Unable to displayText file. <a href="<?php echo $text_path ?>">Download</a> instead.</p>
                        </object>
                        </div>
                        <div class="metadata__container">
                            <h4>This is the information of the Text file:</h4>
                            <?php
                                echo '<pre>';
                                    echo '<ul>';
                                    foreach ($_FILES as $fileKey => $fileInfo) {
                                        echo '<li>';
                                        echo '<strong>' . htmlspecialchars($fileKey) . ':</strong><br>';
                                        echo '<ul>';
                                        foreach ($fileInfo as $key => $value) {
                                            echo '<li><strong>' . htmlspecialchars($key) . ':</strong> ' . htmlspecialchars($value) . '</li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                echo '</pre>';
                            ?>

                            <form method="GET" action="index.php">
                                <input type="submit" value="Go Back">
                            </form>
                            <pre class="cpy">&copy; Mark Jerome Santos</pre>
                        </div>
                    </div>
                </div>
            </body>
            </html>
            <?php
    } 
    if (move_uploaded_file($temporary_file_pdf, $uploaded_file_pdf)) {
        $relative_path = 'uploads/';
        $pdf_path = $relative_path . $file_name_pdf;

        require './partials/header.php'
        ?>
            <body>
                <div class="h-100 container">
                    <div class="background-blur"></div>
                    <div class="h-100 grid">
                        <div class="file__container">
                        <?php if ($selectedType == 'image') { ?>
                            <img class="file_image" src="<?php echo $file_path; ?>" alt="Uploaded Image"/>
                        <?php } elseif ($selectedType == 'audio') { ?>
                            <audio controls>
                                <source src='<?php echo $file_path; ?>' type='audio/mp3'>Your browser does not support the audio element.
                            </audio>
                        <?php } elseif ($selectedType == 'video') { ?>
                            <video width='100%' height='100%' controls>
                                <source src='<?php echo $file_path; ?>' type='video/mp4'>Your browser does not support the video tag.
                            </video>
                        <?php } elseif ($selectedType == 'pdf') { ?>
                            <object data="<?php echo $file_path ?>" type="application/pdf" width="100%" height="100%">
                            <p>Unable to display PDF file. <a href="<?php echo $file_path ?>">Download</a> instead.</p>
                            </object>
                        <?php } ?>
                        </div>
                        <div class="metadata__container">
                            <h4>This is the information of the <?php echo $selectedType; ?> file:</h4>
                            <?php
                                echo '<pre>';
                                    echo '<ul>';
                                    foreach ($_FILES as $fileKey => $fileInfo) {
                                        echo '<li>';
                                        echo '<strong>' . htmlspecialchars($fileKey) . ':</strong><br>';
                                        echo '<ul>';
                                        foreach ($fileInfo as $key => $value) {
                                            echo '<li><strong>' . htmlspecialchars($key) . ':</strong> ' . htmlspecialchars($value) . '</li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                echo '</pre>';
                            ?>

                            <form method="GET" action="index.php">
                                <input type="submit" value="Go Back">
                            </form>
                            <pre class="cpy">&copy; Mark Jerome Santos</pre>
                        </div>
                    </div>
                </div>
            </body>
            </html>
            <?php
    }
}
else {
    header("Location: index.php");
    exit;
}



