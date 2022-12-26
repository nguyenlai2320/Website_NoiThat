<?php 
    include("../controller/clsAdminLogin.php");
    $p = new loginAdminAccount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÔI LÀ QUẢN TRỊ VIÊN</title>
    <link rel="stylesheet" href="../css/adminlogin.css">
</head>
<body>
    <div class="container">
        <div class="login-title">
            TRANG ĐĂNG NHẬP QUẢN TRỊ VIÊN
        </div>
        <form class="frm-admin-login" action="" method="post">
            <div class="form-field">
                <input type="text" class="input-admin-name" name="input-admin-name" id="input-admin-name" value="Nhập tài khoản vào đây" autocomplete="none" placeholder="">
                <label for="" id="label-admin-name" class="label-admin-name">TÀI KHOẢN</label>
            </div>
            <div class="form-field">
                <input type="password" class="input-admin-password" name="input-admin-password" id="input-admin-password" value="Nhập mật khẩu vào đây" autocomplete="none" placeholder="">
                <label for="" id="label-admin-password" class="label-admin-password">MẬT KHẨU</label>
            </div>
            <div class="btn">
                <button type="submit" class="btn-admin-login" name="btn-admin-login" value="ĐĂNG NHẬP">ĐĂNG NHẬP</button>
                <button type="reset" class="btn-reset-login" name="btn-reset-login">HUỶ</button>
            </div>
            <div class="other-login">
                <a href="../index.php">Trở về Trang chủ | </a>
                <a href="./sign-in.php">Tôi là Khách hàng</a>
            </div>
            <div align="center">
                <?php 
                    $btn = isset($_POST['btn-admin-login'])?$_POST['btn-admin-login']:'';
                    switch($btn){
                        case 'ĐĂNG NHẬP': {
                            $taikhoan = isset($_POST['input-admin-name'])?$_POST['input-admin-name']:'';
                            $matkhau = isset($_POST['input-admin-password'])?$_POST['input-admin-password']:'';
                            
                            if($taikhoan!=''&&$matkhau!=''){
                                if($p->myAdminLogin($taikhoan,$matkhau)==1){
                                    header('location: admin-page.php');
                                }   
                                else {
                                    echo 'ĐĂNG NHẬP THẤT BẠI!';
                                }
                            }
                            else {
                                echo 'VUI LÒNG NHẬP ĐẦY ĐỦ THÔNG TIN!';
                            }
                            break;
                        }
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>