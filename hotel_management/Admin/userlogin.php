<?php
require_once('../db/db.php');

$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $pdo = establishCONN();

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :mail AND password = :pwd");
    $stmt->bindValue(":mail", $email);
    $stmt->bindValue(":pwd", $password);
    $stmt->execute();

    if($res = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        
         // echo "Login Successful";
        $login = 1;
        session_start();
        $_SESSION['id']=$res[0]['id'];
        $_SESSION['email']=$res[0]['email'];
        header('location: ./dashboard.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="css/userlogin.css">
    <link rel="shortcut icon" href="https://banner2.cleanpng.com/20190304/rqs/kisspng-logo-muong-thanh-hotel-portable-network-graphics-b-logo-muong-thanh-thit-k-thi-cng-xy-d-5c7d029070b4e0.9390674015516965284617.jpg">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>

<?php

    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thành công</strong> Bạn đã đăng nhập thành công!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

?>

<?php

    if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Thông tin không hợp lệ!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

?>

    
    <div class = "center">
        <h1>Đăng nhập</h1>
        <form method="post">
            <div class="text_form">
                <input type="email" name="email" class="username" required>
                <span></span>
                <label>Tên đăng nhập</label>
            </div>
            <div class="text_form">
                <input type="password" name="password" class="password" required>
                <span></span>
                <label>Mật khẩu</label>
                
            </div>
            <div class = "redirect">
                <div class = "pass">Quên mật khẩu?</div>
                <div class = "sign">
                    <a href ="signup.php">Đăng ký</a>
                </div>
            </div>
            
            <input type="submit" value="Đăng nhập">
        </form>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="js/main.js"></script>
</body>
</html>