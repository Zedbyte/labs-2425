<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file_upload']) && isset($_POST['file_type'])) {
    $upload_directory = getcwd() . '/uploads/';
    $file_name = $_FILES['file_upload']['name'];
    $uploaded_file = $upload_directory . basename($file_name);
    $temporary_file = $_FILES['file_upload']['tmp_name'];
    $selectedType = $_POST['file_type'];

    $allowedExtensions = [];
    switch ($selectedType) {
        case 'pdf':
            $allowedExtensions = ['pdf'];
            break;
        case 'audio':
            $allowedExtensions = ['mp3', 'wav', 'ogg'];
            break;
        case 'image':
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            break;
        case 'video':
            $allowedExtensions = ['mp4', 'avi', 'mov'];
            break;
    }
    $fileExtension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    // if selected type and file does not match.
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo 'Error in file type.';
        echo '<meta http-equiv="refresh" content="4;url=index.php">';
        // header("Location: index.php");
        exit;
    }


    if (!file_exists($upload_directory)) {
        mkdir($upload_directory);
    }

    if (move_uploaded_file($temporary_file, $uploaded_file)) {
        $relative_path = 'uploads/';
        $file_path = $relative_path . $file_name;

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
            exit;
    }  else {
        echo 'Failed to upload video file';
    }
}
else {
    header("Location: index.php");
    exit;
}



