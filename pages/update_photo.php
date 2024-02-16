<?php
session_start();
include_once '../db/db.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Авторизация</title>
</head>
<body>
    <div class="main">
        <div class="title">
            <h1>Обновить фото</h1>
        </div>
        <div class="auth-form">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                <input type="file" name="photo" accept=".jpeg, .jpg, .png">
                <input type="submit" value="Обновить" name="update">
                <?php
                $edit_id = $_GET['edit_photo'];
                $photo_types = array("image/jpeg", "image/jpg", "image/png");
                $photo = $_FILES['photo']['name'];
                $photo_type = $_FILES['photo']['type'];
                $photo_tmp = $_FILES['photo']['tmp_name'];
                $photo_size = $_FILES['photo']['size'];
                $photo_path = "../img/";
                $str_update_photo = "UPDATE `users` SET
                `photo` = '$photo'
                WHERE `id` = $edit_id";
                $update = $_POST['update'];
                if ($update) {
                    if (in_array($photo_type, $photo_types)) {
                        if ($photo_size <= "5242880") {
                            if (file_exists($photo_path.$photo)) {
                                echo "<p class='error error_user'>Уже есть такое фото!</p>";    
                            }
                            else {
                                move_uploaded_file($photo_tmp, $photo_path.$photo);
                                $run_update_photo = mysqli_query($connect, $str_update_photo);
                                if ($run_update_photo) {
                                    echo "<p class='success success_user'>Вы успешно обновили фото профиля!</p>";
                                }
                                else {
                                    echo "<p class='error error_user'>Что-то пошло не так..</p>";
                                }
                            }
                        }
                        else {
                            echo "<p class='error error_user'>Слишком большой размер файла!</p>";
                        }
                    }
                    else {
                        echo "<p class='error error_user'>Неправильный формат файла!</p>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
<script src="../scripts/js.js"></script>
</html>