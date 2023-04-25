<?php

session_start();
if(!isset($_SESSION['email'])) {
    header('location: ./login.php');
}

?>

<?php require_once('../db/db.php') ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <title>Admin Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="./dashboard.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./rooms/">Phòng <span class="sr-only">(hiện tại)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./bookings/">Nhận phòng khách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./reservations/">Đặt phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./businessinteligence/">Tình báo kinh doanh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Đăng xuất</a>
                </li>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="jumbotron my-5">
            <h2 class="display-4">Chào Admin</h2>
            <p>Bắt đầu bằng cách kiểm tra khách.</p>
            <form action="./bookings/index.php" method="POST" style="width: 60%;">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="hập số tham chiếur" name="refno">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">Nhận phòng khácht</button>
                </div>
              </div>
            </form><hr>
            hoặc bạn có thể <a style="text-decoration: solid !important;" href="./rooms/addroom.php" role="button">thêm 1 phòng mới</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>