<?php
session_start();
error_reporting(0);
include_once '../db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Авиабилеты</title>
</head>
<body>
    <div class="heads">
        <?php
        include_once '../controllers/header_menu_second.php';
        ?>      
        <h1>Отмененные рейсы</h1>
    </div>
    <?php
    $str_out = "SELECT * FROM `flights` WHERE `status` = 5";
    $run_out = mysqli_query($connect, $str_out);
    $num_out = mysqli_num_rows($run_out);
    if ($num_out == 0) {
        echo "<h1 class='e-sad'>На данный момент отмененных рейсов нет!</h1>";
    }else {
        while ($flights = mysqli_fetch_array($run_out)) {
            echo "<div class='out out_schedule'>
            <div class='out_main'>
                <div class='out_price'>$flights[price]</div>
                <div>
                    <p class='out_price'>Отбытие</p>
                    <p class='out_price'>$flights[etime]</p>
                    <p>$flights[whence]</p>
                    <p>$flights[ddate]</p>
                </div>
                <div>
                    <p class='out_price'>Прибытие</p>
                    <p class='out_price'>$flights[atime]</p>
                    <p>$flights[wheres]</p>
                    <p>$flights[adate]</p>
                </div>
            </div>
        </div>";
        }
    }
    ?>
    <?php
        include_once '../controllers/footer.php';
    ?>
</body>
<script src="../scripts/js.js"></script>
</html>
