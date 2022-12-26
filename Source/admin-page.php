<?php 
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['taikhoan']) && isset($_SESSION['matkhau'])){
        include("../controller/clsAdminLogin.php");
        $q = new loginAdminAccount();
        $q->confirmAdminLogin($_SESSION['id'],$_SESSION['taikhoan'],$_SESSION['matkhau']);
    }
    else {
        header('location: admin-login.php');
    }
?>
<?php 
    include("../controller/clsAdmin.php");
    $p = new AdminPage();
    $getCusID = 0;
    $getEmpID = 0;
    $getPdCode = 0;
    if(isset($_REQUEST['id'])){
        $getCusID = $_REQUEST['id'];
    }
    if(isset($_REQUEST['id_emp'])){
        $getEmpID = $_REQUEST['id_emp'];
    }
    if(isset($_REQUEST['masp'])){
        $getPdCode = $_REQUEST['masp'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG QUẢN TRỊ VIÊN</title>
    <link rel="stylesheet" href="../css/admin-page.css">
    <link rel="icon" href="../icon/admin.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-top">
                <div class="top-left">
                    <a class="top-link" href="">MINIHOUSE INTERIOR DESIGN |</a>
                    <a class="top-link" href="">ONLINE STORE</a>
                </div>
                <div class="top-right">HOTLINE: +84862481705</div>
                <div class="slogan-box">
                   NƠI ĐEM ĐẾN NHỮNG SẢN PHẨM CHẤT LƯỢNG VÀ THẨM MỸ VƯỢT TRỘI
                </div>
            </div>
            <div class="header-bottom">
                <div class="text-logo">
                    <a href="" class="text-logo-link" id="text-logo-link">
                        MINIHOUSE NGUYEN HOANG
                    </a>
                </div>
                <?php
                    if($_SESSION['taikhoan']){
                        echo '<div class="username-login">
                                <nav>
                                    <label for="touch"><span id="touch-name">'.$_SESSION['taikhoan'].'</span></label>
                                    <input type="checkbox" name="touch" id="touch">
                            
                                    <ul class="slide">
                                        <li><a href="">ĐỔI MẬT KHẨU</a></li>
                                        <li><a href="adminListOrders.php">QUẢN LÝ ĐƠN HÀNG KHÁCH HÀNG</a></li>
                                        <li><a href="logout.php">ĐĂNG XUẤT</a></li>
                                    </ul>
                                </nav>    
                            </div>';
                    }
                    else {
                        echo '<div class="user-option">
                                <div class="login-signup">
                                    <a href="admin-login.php" class="login">ĐĂNG NHẬP</a> /
                                    <a href="" class="signup">ĐĂNG KÝ</a>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
        <div class="content">
            <div class="tab">
                <button class="tablinks" onclick="openForm(event, 'Products')" id="defaultOpen">SẢN PHẨM</button>
                <button class="tablinks" onclick="openForm(event, 'Employees')" >TÀI KHOẢN NHÂN VIÊN</button>
                <button class="tablinks" onclick="openForm(event, 'Customers')" >TÀI KHOẢN KHÁCH HÀNG</button>
            </div>
            <!-- NỘI DUNG PHẦN THÊM SẢN PHẨM -->
            <div class="tabcontent" id="Products">
                <!-- KẾT THÚC PHẦN THÊM SẢN PHẨM -->
                <form id="load-product" class="load-product" action="" method="post" enctype="multipart/form-data">

                    <div class="table-control-pd">
                        <table class="table-pd" border="1" cellspacing="0">
                            <tr class="row-pd">
                                <td class="column-pd">MÃ SẢN PHẨM</td>
                                <td class="column-pd">
                                    <input type="text" class="pd-code pd" name="pd-code" id="pd-code" value="<?php echo $p->getColumnPD("select masp from sanpham where masp='$getPdCode'") ?>">
                                    <input type="hidden" name="txt-pd-code" value="<?php echo $getPdCode; ?>">
                                </td>
                            </tr>
                            <tr class="row-pd">
                                <td class="column-pd">TÊN SẢN PHẨM</td>
                                <td class="column-pd">
                                    <input type="text" class="pd-name pd" name="pd-name" id="pd-name" value="<?php echo $p->getColumnPD("select tensp from sanpham where masp='$getPdCode'") ?>">
                                </td>
                            </tr>
                            <tr class="row-pd">
                                <td class="column-pd">HÌNH ẢNH</td>
                                <td class="column-pd">
                                    <input type="file" class="pd-image pd" name="pd-image" id="pd-image" value="<?php echo $p->getColumnPD("select hinhanh from sanpham where masp='$getPdCode'") ?>">
                                </td>
                            </tr>
                            <tr class="row-pd">
                                <td class="column-pd">MÔ TẢ</td>
                                <td class="column-pd">
                                    <input type="text" class="pd-origin pd" name="pd-origin" id="pd-origin" value="<?php echo $p->getColumnPD("select xuatxu from sanpham where masp='$getPdCode'") ?>">
                                </td>
                            </tr>
                            <tr class="row-pd">
                                <td class="column-pd">XUẤT XỨ</td>
                                <td class="column-pd">
                                    <input type="text" class="pd-description pd" name="pd-description" id="pd-description" value="<?php echo $p->getColumnPD("select mota from sanpham where masp='$getPdCode'") ?>">
                                </td>
                            </tr>
                            <tr class="row-pd">
                                <td class="column-pd">GIÁ TIỀN</td>
                                <td class="column-pd">
                                    <input type="text" class="pd-price pd" name="pd-price" id="pd-price" value="<?php echo $p->getColumnPD("select giatien from sanpham where masp='$getPdCode'") ?>">
                                </td>
                            </tr>
                            <tr class="row-pd">
                                <td class="column-pd" colspan="2">
                                    <button class="btn-add-pd" name="btn-pd" id="btn-add-pd" value="THÊM SẢN PHẨM">THÊM SẢN PHẨM</button>
                                    <button class="btn-delete-pd" name="btn-pd" id="btn-delete-pd" value="XOÁ SẢN PHẨM">XOÁ SẢN PHẨM</button>
                                    <button class="btn-update-pd" name="btn-pd" id="btn-update-pd" value="SỬA SẢN PHẨM">SỬA SẢN PHẨM</button>
                                </td>
                            </tr>
                        </table>
                        <div align="center">
                            <?php 
                                $btn = isset($_POST['btn-pd'])?$_POST['btn-pd']:'';
                                switch($btn){
                                    case 'THÊM SẢN PHẨM': {
                                        $pd_code = $_REQUEST['pd-code'];
                                        $pd_name = $_REQUEST['pd-name'];
                                        $pd_description = $_REQUEST['pd-description'];
                                        $pd_origin = $_REQUEST['pd-origin'];
                                        $pd_price = $_REQUEST['pd-price'];

                                        $name = $_FILES['pd-image']['name'];
                                        $tmp_name = $_FILES['pd-image']['tmp_name'];
                                        $type = $_FILES['pd-image']['type'];
                                        $size = $_FILES['pd-image']['size'];

                                        if($name!=''){
                                            $name = time()."-".$name;
                                            if($p->uploadFileImage($name,$tmp_name,"../img/img_products")==1){
                                                if($p->editData("INSERT INTO sanpham (masp,tensp,hinhanh,giatien,mota,xuatxu) VALUES ('$pd_code', '$pd_name', '$name', '$pd_price', '$pd_description', '$pd_origin');")==1){
                                                    $message = "Thêm sản phẩm thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                                else {
                                                    $message = "Thêm sản phẩm không thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                            }
                                            else {
                                                $message = "Thêm ảnh sản phẩm không thành công!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                        }
                                        else {
                                            $message = "Chưa thêm ảnh!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                        break;
                                    }
                                    case 'XOÁ SẢN PHẨM':{
                                        $PdCode_Del = $_REQUEST['txt-pd-code'];
                                        if($PdCode_Del!=''){
                                            if($p->editData("DELETE FROM sanpham WHERE masp='$PdCode_Del' LIMIT 1")==1){
                                                $message = "Xoá sản phẩm thành công!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            else {
                                                $message = "Xoá sản phẩm thành công!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                        } 
                                        else {
                                            $message = "Chọn sản phẩm cần xoá!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                        break;
                                    };
                                    case 'SỬA SẢN PHẨM':{
                                        $PdCode_Upd = $_REQUEST['txt-pd-code'];

                                        $pd_code = $_REQUEST['pd-code'];
                                        $pd_name = $_REQUEST['pd-name'];
                                        $pd_description = $_REQUEST['pd-description'];
                                        $pd_origin = $_REQUEST['pd-origin'];
                                        $pd_price = $_REQUEST['pd-price'];

                                        if($PdCode_Upd!=''){
                                            if($p->editData("UPDATE sanpham SET masp = '$pd_code', tensp = '$pd_name', giatien = '$pd_price', mota = '$pd_description', xuatxu = '$pd_origin' WHERE masp = '$PdCode_Upd';")==1){
                                                $message = "Sửa sản phẩm thành công!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            else {
                                                $message = "Sửa sản phẩm không thành công!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                        } 
                                        else {
                                            $message = "Chọn sản phẩm cần sửa!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                        break;
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </form>
                <form action="" method="POST">
                    <table border="1" cellspacing="0">
                        <tr>
                            <th>MÃ SẢN PHẨM</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>HÌNH ẢNH</th>
                            <th>MÔ TẢ</th>
                            <th>XUẤT XỨ</th>
                            <th>GIÁ TIỀN</th>
                        </tr>
                        <?php 
                            $p->loadListProduct("select * from sanpham order by masp asc");
                        ?>
                    </table>
                </form>
            </div>
            <div class="tabcontent" id="Employees">
                
                <form action="" method="POST">
                    <div class="table-control-emp">
                        <table class="table-emp" border="1" cellspacing="0">
                            <tr class="row-emp">
                                <td class="column-emp">MÃ NHÂN VIÊN</td>
                                <td class="column-emp">
                                    <input type="text" class="emp-code pd" name="emp-code" id="emp-code" autocomplete="none" value="<?php echo $p->getColumnCus("select manv_fk from taikhoan_nv where id='$getEmpID'"); ?>">
                                </td>
                            </tr>
                            <tr class="row-emp">
                                <td class="column-emp">TÀI KHOẢN</td>
                                <td class="column-emp">
                                    <input type="text" class="emp-account pd" name="emp-account" id="emp-account" autocomplete="none" value="<?php echo $p->getColumnCus("select taikhoan from taikhoan_nv where id='$getEmpID'"); ?>">
                                    <input type="hidden" class="txt-emp-code" name="txt-emp-code" id="txt-emp-code" value="<?php echo $getEmpID; ?>">
                                </td>
                            </tr>
                            <tr class="row-emp">
                                <td class="column-emp">MẬT KHẨU</td>
                                <td class="column-emp">
                                    <input type="password" class="emp-password pd" name="emp-password" id="emp-password" autocomplete="none" value="<?php echo $p->getColumnCus("select matkhau from taikhoan_nv where id='$getEmpID'"); ?>">
                                </td>
                            </tr>
                            <tr class="row-emp">
                                <td class="column-emp" colspan="2">
                                    <button class="btn-add-emp" name="btn-emp" id="btn-add-emp" value="THÊM TÀI KHOẢN">THÊM TÀI KHOẢN</button>
                                    <button class="btn-delete-emp" name="btn-emp" id="btn-delete-emp" value="XOÁ TÀI KHOẢN">XOÁ TÀI KHOẢN</button>
                                    <button class="btn-update-emp" name="btn-emp" id="btn-update-emp" value="SỬA TÀI KHOẢN">SỬA TÀI KHOẢN</button>
                                </td>
                            </tr>
                        </table>
                        <div align="center">
                            <?php 
                                $btn = isset($_POST['btn-emp'])?$_POST['btn-emp']:'';
                                switch($btn){
                                    case 'THÊM TÀI KHOẢN': {
                                        $emp_code = $_REQUEST['emp-code'];
                                        $emp_account = $_REQUEST['emp-account'];
                                        $emp_password = $_REQUEST['emp-password'];
                                        
                                        if($emp_code!=''&&$emp_account!=''&&$emp_password!=''){
                                            if($p->editData("INSERT INTO taikhoan_nv (id,taikhoan,matkhau,manv_fk) VALUES (NULL, '$emp_account', MD5('$emp_password'), '$emp_code')")==1){
                                                $message = "Thêm tài khoản thành công!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            else {
                                                $message = "Thêm tài khoản thất bại!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                        }
                                        else {
                                            $message = "Vui lòng nhập đầy đủ thông tin!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                        break;
                                    };
                                    case 'XOÁ TÀI KHOẢN': {
                                        $EmpID_Del = $_REQUEST['txt-emp-code'];
                                            if($EmpID_Del>0){
                                                if($p->editData("DELETE FROM taikhoan_nv WHERE id='$EmpID_Del' LIMIT 1")==1){
                                                    $message = "Xoá tài khoản thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                                else {
                                                    $message = "Xoá tài khoản không thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                            }
                                            else {
                                                $message = "Vui lòng tài khoản cần xoá!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            break;
                                    }
                                    case 'SỬA TÀI KHOẢN': {
                                        $EmpID_Upd = $_REQUEST['txt-emp-code'];

                                        $emp_code = $_REQUEST['emp-code'];
                                        $emp_account = $_REQUEST['emp-account'];
                                        $emp_password = $_REQUEST['emp-password'];

                                        if($EmpID_Upd>0){
                                            if($p->editData("UPDATE taikhoan_nv SET taikhoan = '$emp_account', matkhau = MD5('$emp_password'), manv_fk = '$emp_code' WHERE id = '$EmpID_Upd'")==1){
                                                $message = "Sửa tài khoản thành công!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            else {
                                                $message = "Sửa tài khoản thất bại!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                        }
                                        else {
                                            $message = "Vui lòng chọn tài khoản cần sửa!";
                                            echo "<script type='text/javascript'>alert('$message');</script>";
                                        }
                                        break;
                                    }
                                } 
                            ?>
                        </div>
                    </div>
                </form>
                <form action="" method="post">
                    <table border="1" cellspacing="0">
                        <tr>
                            <th>MÃ NHÂN VIÊN</th>
                            <th>ID TÀI KHOẢN</th>
                            <th>TÀI KHOẢN</th>
                            <th>MẬT KHẨU</th>
                        </tr>
                        <?php 
                            $p->loadListEmp("select * from taikhoan_nv order by id asc");
                        ?>
                    </table>
                </form>
            </div>
            <div class="tabcontent" id="Customers">
                <form action="" method="post">
                <div class="table-control-cus">
                        <table class="table-cus" border="1" cellspacing="0">
                            <tr class="row-cus">
                                <td class="column-cus">MÃ KHÁCH HÀNG</td>
                                <td class="column-cus">
                                    <input type="text" class="cus-code pd" name="cus-code" id="cus-code" autocomplete="none" value="<?php echo $p->getColumnCus("select makh_fk from taikhoan_kh where id='$getCusID'"); ?>">
                                    <input type="hidden" class="txt-cus-code" name="txt-cus-code" id="txt-cus-code" value="<?php echo $getCusID; ?>">
                                </td>
                            </tr>
                            <tr class="row-cus">
                                <td class="column-cus">TÀI KHOẢN</td>
                                <td class="column-cus">
                                    <input type="text" class="cus-account pd" name="cus-account" id="cus-account" autocomplete="none" value="<?php echo $p->getColumnCus("select taikhoan from taikhoan_kh where id='$getCusID'"); ?>">
                                </td>
                            </tr>
                            <tr class="row-cus">
                                <td class="column-cus">MẬT KHẨU</td>
                                <td class="column-cus">
                                    <input type="text" class="cus-password pd" name="cus-password" id="cus-password" autocomplete="none" value="<?php echo $p->getColumnCus("select matkhau from taikhoan_kh where id='$getCusID'"); ?>">
                                </td>
                            </tr>
                            <tr class="row-cus">
                                <td class="column-cus" colspan="2">
                                    <button class="btn-add-cus" name="btn-cus" id="btn-add-cus" value="THÊM TÀI KHOẢN">THÊM TÀI KHOẢN</button>
                                    <button class="btn-delete-cus" name="btn-cus" id="btn-delete-cus" value="XOÁ TÀI KHOẢN">XOÁ TÀI KHOẢN</button>
                                    <button class="btn-update-cus" name="btn-cus" id="btn-update-cus" value="SỬA TÀI KHOẢN">SỬA TÀI KHOẢN</button>
                                </td>
                            </tr>
                        </table>
                        <div align="center">
                                <?php 
                                    $btn = isset($_POST['btn-cus'])?$_POST['btn-cus']:'';
                                    switch($btn){
                                        case 'THÊM TÀI KHOẢN': {
                                            $cus_code = $_REQUEST['cus-code'];
                                            $cus_account = $_REQUEST['cus-account'];
                                            $cus_password = $_REQUEST['cus-password'];

                                            if($cus_code!=''&&$cus_account!=''&&$cus_password!=''){
                                                if($p->editData("INSERT INTO taikhoan_kh (id,taikhoan,matkhau,makh_fk) VALUES (NULL, '$cus_account', MD5('$cus_password'), '$cus_code');")==1){
                                                    $message = "Thêm tài khoản thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                                else {
                                                    $message = "Thêm tài khoản thất bại!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                            }
                                            else {
                                                $message = "Vui lòng nhập đầy đủ thông tin!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            break;
                                        };
                                        case 'XOÁ TÀI KHOẢN': {
                                            $cusID_Del = $_REQUEST['txt-cus-code'];
                                            if($cusID_Del>0){
                                                if($p->editData("DELETE FROM taikhoan_kh WHERE id='$cusID_Del' LIMIT 1")==1){
                                                    $message = "Xoá tài khoản thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                                else {
                                                    $message = "Xoá tài khoản không thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                            }
                                            else {
                                                $message = "Vui lòng tài khoản cần xoá!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            break;
                                        };
                                        case 'SỬA TÀI KHOẢN': {
                                            $cusID_Upd = $_REQUEST['txt-cus-code'];

                                            $cus_code = $_REQUEST['cus-code'];
                                            $cus_account = $_REQUEST['cus-account'];
                                            $cus_password = $_REQUEST['cus-password'];

                                            if($cusID_Upd>0){
                                                if($p->editData("UPDATE taikhoan_kh SET taikhoan = '$cus_account', matkhau = MD5('$cus_password'), makh_fk = '$cus_code' WHERE id = '$cusID_Upd';
                                                ")==1){
                                                    $message = "Sửa tài khoản thành công!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                                else {
                                                    $message = "Sửa tài khoản thất bại!";
                                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                                }
                                            }
                                            else {
                                                $message = "Vui lòng chọn tài khoản cần sửa!";
                                                echo "<script type='text/javascript'>alert('$message');</script>";
                                            }
                                            break;
                                        }
                                    }
                                ?>
                        </div>
                    </div>
                </form>
                <form action="" method="POST">
                    <table border="1" cellspacing="0">
                        <tr>
                            <th>MÃ KHÁCH HÀNG</th>
                            <th>ID TÀI KHOẢN</th>
                            <th>TÀI KHOẢN</th>
                            <th>MẬT KHẨU</th>
                        </tr>
                        <?php 
                            $p->loadListCus("select * from taikhoan_kh order by id asc");
                        ?>
                    </table>
                </form>
            </div>
            <script src="../js/admin-page.js"></script>
            <script>
                document.getElementById("defaultOpen").click();
            </script>
        </div>
    </div>
</body>
</html>
<? ob_flush(); ?>