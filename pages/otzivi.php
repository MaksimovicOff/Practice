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
        <h1>Отзывы</h1>
    </div>
    <div class="create_review review_out">
        <form action="" method="post">
            <textarea name="review" id="" cols="10" rows="10" placeholder="Ваш комментарий"></textarea>
            <input type="submit" name="add" value="Отправить">
            <?php
            session_start();
            include_once "../db/db.php";
            error_reporting(0);
            $review = $_POST['review'];
            $add = $_POST['add'];
            $id_user = $_SESSION['user']['id'];
            $str_add_reviews = "INSERT INTO `reviews` (`id_user`, `content`) VALUES ('$id_user', '$review')";
            if ($add) {
                if ($_SESSION['user']) {
                    $run_add_reviews = mysqli_query($connect, $str_add_reviews);
                    if ($run_add_reviews) {
                        echo "<p class='success success_reviews'>Вы успешно оставили отзыв!</p>";
                    }
                    else {
                        echo "<p class='error error_reviews'>Что-то пошло не так..</p>";
                    }
                }
                else {
                    header("Location:auth_reviews.php");
                }
            }
            ?>
        </form>
    </div>
    <div class="otzivi">
		<?php
                $str_out_reviews = "SELECT * FROM `reviews` WHERE `status` = 2";
                $run_out_reviews = mysqli_query($connect, $str_out_reviews);
                while ($reviews = mysqli_fetch_array($run_out_reviews)) {
                    $str_out_reviews_user = "SELECT * FROM `users` WHERE `id` = $reviews[id_user]";
                    $run_out_rewiews_user = mysqli_query($connect, $str_out_reviews_user);
                    $users_reviews = mysqli_fetch_array($run_out_rewiews_user);
                    echo "
                    <div class='e-reviews index_reviews'>
                        <img src='../img/$users_reviews[photo]'>
                        <div class='e-name'><p>$users_reviews[first_name]</p></div>
                        <div class='e-content'><p>$reviews[content]</p></div>
                        </div>";
                }
        ?>
		</div>
    <?php
        include_once '../controllers/footer.php';
    ?>
</body>
<script src="../scripts/js.js"></script>
</html>
