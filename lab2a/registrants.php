<?php

define('DATA_FILE_PATH', 'registrations.csv');

require "partials/header.php";
require "helpers/get_data.php";


$table_data = get_user_data(DATA_FILE_PATH);

?>
    
<body>
    <section class="p-section--hero">
        <div class="row">
            <div class="col">
                <div class="p-section--shallow">
                    <h1>
                        Registrants Page
                    </h1>
                </div>
                <div class="p-section--shallow">

                    <table aria-label="Session Data">
                        <thead>
                            <tr>
                                <th>Complete Name</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Contact Number</th>
                                <th>Sex</th>
                                <th>Program</th>
                                <th>Complete Address</th>
                                <th>Email Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($table_data as $val):
                                ?>
                                <tr>
                                <?php
                                    $indices = [0, 1, 9, 2, 3, 4, 5, 6];
                                    foreach ($indices as $index):
                                        ?>
                                    <td>
                                        <?php echo $val[$index]; ?>
                                    </td>
                                    <?php
                                    endforeach;
                                    ?>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>


                </div>

                <form action="index.php" method="get">
                    <button>Go back to Home</button>
                </form>

            </div>
        </div>
    </section>

</body>

</html>