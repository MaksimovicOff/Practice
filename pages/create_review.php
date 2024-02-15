<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Поиск</title>
</head>
<body>
    <h1 class="e-h1">Отзывы</h1>
    <div class="create_review">
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
</body>
<script src="../scripts/js.js"></script>
</html>

