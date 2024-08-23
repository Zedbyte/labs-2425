<?php

if (isset($_FILES['pdf_file'])) {
    $upload_directory = getcwd() . '/uploads/';
    $file_name = $_FILES['pdf_file']['name'];
    $uploaded_file = $upload_directory . basename($file_name);
    $temporary_file = $_FILES['pdf_file']['tmp_name'];

    if (!file_exists($upload_directory)) {
        mkdir($upload_directory);
    }

    if (move_uploaded_file($temporary_file, $uploaded_file)) {
        $relative_path = 'uploads/';
        $pdf_path = $relative_path . $file_name;

        require './partials/header.php'
        ?>
            <body>
                <div class="h-100 container">
                    <div class="h-100 grid">
                        <div class="file__container">
                        <object data="<?php echo $pdf_path ?>" type="application/pdf" width="100%" height="100%">
                        <p>Unable to display PDF file. <a href="<?php echo $pdf_path ?>">Download</a> instead.</p>
                        </object>
                        </div>
                        <div class="metadata__container">
                            <h4>This is the information of the PDF file:</h4>
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
        echo 'Failed to upload PDF file';
    }
}



