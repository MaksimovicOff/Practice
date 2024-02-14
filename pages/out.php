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
    <h1 class="e-h1">Результаты поиска</h1>
    <?php
    session_start();
    include_once "../db/db.php";
    $whence = $_POST['Whence'];
    $wheres = $_POST['Wheres'];
    $data = $_POST['data'];
    $search = $_POST['Search'];
    $str_out = "SELECT * FROM `flights` WHERE `whence` like '%$whence%' && `wheres` like '%$wheres%' && `ddate` like '%$data%'";
    
    if ($search) {
        $run_out = mysqli_query($connect, $str_out);
        $num_out = mysqli_num_rows($run_out);
        echo $num_out;
        if ($num_out == 0) {
            echo "<h1 class='e-sad'>К сожалению, ничего не найдено!</h1>
                <a href='search.php' class='e-back-sad'>Назад</a>";
            
        }else {
            while ($flights = mysqli_fetch_array($run_out)) {
                echo "<div class='out'>
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
                <div class='out_buy'>
                    <form class='out_form'>
                        <a href=buy.php?buy=$flights[id] target='_blank'>Купить</a>
                    </form>
                </div>
            </div>";
            }
        }
    }
    ?>
    
</body>
<script src="../scripts/js.js"></script>
</html>

