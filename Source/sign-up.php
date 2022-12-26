<?php 

    include("../controller/clsSignup.php");
    $p = new signupAccount();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG ĐĂNG KÝ</title>
    <link rel="stylesheet" href="../css/sign-up.css">
    <link rel="icon" type="image/x-icon" href="../icon/user.png">
    <script src="https://kit.fontawesome.com/61bf5ef370.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/sign-up.js"></script>
</head>
<body>
    <div class="container">
        <div class="left-pane"></div>
        <div class="right-pane">
            <div class="title">ĐĂNG KÝ TÀI KHOẢN</div>
            <form action="" method="POST" class="signup-from" id="signup-form">
                <div class="form-field">
                    <input type="text" name="input-user" class="input-user" id="input-user" placeholder=" " required autocomplete="none">
                    <label for="" class="label-user" id="label-user">Tài khoản</label>
                    
                </div>
                <div class="form-field">
                    <input type="text" name="input-pass" class="input-pass" id="input-pass" placeholder=" " required autocomplete="none">
                    <label for="" class="label-pass" id="label-pass">Mật khẩu</label>
                </div>
                <div class="form-field">
                    <input type="text" name="repeat-pass" class="repeat-pass" id="repeat-pass" placeholder=" " required autocomplete="none">
                    <label for="" class="label-repeat" id="label-repeat">Nhập lại mật khẩu</label>
                </div>
                <div class="option-signup">
                    <a href="../index.php" class="return-homepage">
                        <i class="fa-solid fa-arrow-left"></i>
                        Trở về Trang chủ
                    </a>
                    <a href="./sign-in.php" class="signin">Đăng nhập tài khoản</a>
                </div>
                <div class="button-signup">
                    <button type="submit" name="btn-signup" class="btn-signup" id="btn-signup" value="ĐĂNG KÝ">ĐĂNG KÝ</button>
                </div>
                <div align="center">
                    <?php 
                        $btn = isset($_POST['btn-signup'])?$_POST['btn-signup']:'';
                        switch($btn){
                            case 'ĐĂNG KÝ': {
                                $taikhoan = isset($_POST['input-user'])?$_POST['input-user']:'';
                                $matkhau = isset($_POST['input-pass'])?$_POST['input-pass']:'';
                                $matkhau = md5($matkhau);
                                if($taikhoan!='' && $matkhau!=''){
                                    if($p->manipulateAccount("INSERT INTO taikhoan_kh (taikhoan,matkhau) VALUES ('$taikhoan', '$matkhau')")==1){
                                        echo 'Đăng ký tài khoản thành công!';
                                    }
                                    else {
                                        echo 'Đăng ký tài khoản không thành công!';
                                    }
                                }
                                else {
                                    echo 'Vui lòng nhập đầy đủ thông tin!';
                                }
                                break;
                            }
                        }
                    ?>
                </div>
                <div class="other-signup">
                    <div class="other-sign-cap">hoặc dùng tài khoản</div>
                    <div class="other-sign-icon">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-google"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-telegram"></i></a>
                    </div>
                </div>
                <div class="message-alert" id="message-alert">
                    
                </div>
                <div class="theme-btn-container"></div>
            </form>
            <script src="../js/main.js"></script>
        </div>
    </div>
</body>
</html>