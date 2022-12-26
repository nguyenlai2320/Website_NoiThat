<?php
    include("../controller/clsSignin.php");
    $p = new loginAccount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="../css/sign-in.css">
    <link rel="icon" href="../icon/user.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/61bf5ef370.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/sign-in.js"></script>
</head>
<body>
    <div class="container">
        <div class="left-pane"></div>
        <div class="right-pane">
            <div class="title">ĐĂNG NHẬP TÀI KHOẢN</div>
            <form action="" method="POST" class="signin-form" id="signin-form">
                <div class="form-field">
                    <input type="email" name="input-user" class="input-user" id="input-user" value="Nhập tài khoản vào đây" placeholder=" " required autocomplete="none">
                    <label for="" class="label-user" id="label-user">Email</label>
                </div>
                <div class="form-field">
                    <input type="password" name="input-pass" class="input-pass" id="input-pass" value="Nhập mật khẩu vào đây" placeholder=" " required autocomplete="none"> 
                    <label for="" class="label-pass" id="label-pass">Mật khẩu</label>
                </div>
                <div class="option-signin">
                    <a href="../index.php" class="return-homepage">
                        <i class="fa-solid fa-arrow-left"></i>
                        Trở về Trang chủ |
                    </a> 
                    <a href="./admin-login.php" class="direct-adminlogin">
                        Tôi là Quản trị viên
                    </a>
                    <a href="#" class="forgot-password" id="myBtn">Quên mật khẩu | </a>
                    <a href="./sign-up.php" class="signup">Đăng ký tài khoản</a>
                </div>
                <div class="button-signin">
                    <button type="submit" name="btn-signin" class="btn-signin" id="btn-signin" value="ĐĂNG NHẬP">ĐĂNG NHẬP</button>
                </div>
                <div align="center">
                    <?php 
                        session_start();
                        $btn = isset($_POST['btn-signin'])?$_POST['btn-signin']:'';
                        switch($btn){
                            case 'ĐĂNG NHẬP': {
                                $taikhoan = isset($_POST['input-user'])?$_POST['input-user']:'';
                                $matkhau = isset($_POST['input-pass'])?$_POST['input-pass']:'';
                            
                                if($taikhoan!='' && $matkhau!='' && $taikhoan==true && $matkhau==true){
                                    if($p->myLogin($taikhoan,$matkhau)==1){
                                        header('location: ./pd_main.php');
                                    }
                                    else {
                                        echo 'Đăng nhập thất bại!';
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
                <?php 
                    if(!empty($_SESSION['current_user'])){
                        $currentUser = $_SESSION['current_user'];
                        
                        
                    }
                    else {
                        include("facebook_source.php");
                    
                ?>
                <div class="other-signin">
                    <div class="other-sign-cap">hoặc dùng tài khoản</div>
                    <div class="other-sign-icon">
                        <a href="<?= $loginUrl; ?>"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-google"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-telegram"></i></a>
                    </div>
                </div>
                <?php } ?>
                <div class="message-alert" id="message-alert">
                    
                </div>
                <div class="theme-btn-container"></div> 
            </form>
        </div>
        
        <script src="../js/main.js"></script>
        <div class="modal" id="myModal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" id="close-modal">&times;</span>
                    QUÊN MẬT KHẨU
                </div>
                <div class="modal-body">
                    <form action="./reset-pass.html" id="reset-account" class="reset-account">
                        <div class="form-field-2">
                            <input type="text" id="input-reset-account" class="input-reset-account" placeholder=" ">
                            <label for="" id="label-reset-account" class="label-reset-account">TÀI KHOẢN</label>
                        </div>
                        <button type="submit" id="btn-reset-account" class="btn-reset-account">XÁC NHẬN</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="modal-footer-content">
                        &copy; Bản quyền website này thuộc về Hoàng Lai và Hoàng Lý - 
                    Các anh chị sẽ phải đứng trước toà nếu vi phạm bản quyền website đối với chúng tôi
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/modal.js"></script>
    </div>
</body>
</html>