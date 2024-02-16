<?php
session_start();
error_reporting(0);
include_once '../db/db.php';
if ($_SESSION['user']['role'] == 1) {
    header("Location:lk_user.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <title>Авиабилеты</title>
</head>
<body>
    <div class="heads">
        <?php
        include_once '../controllers/header_menu_second.php';
        ?>      
        <h1>Расписание рейсов</h1>
    </div>

    <?php
        include_once '../controllers/footer.php';
    ?>
</body>