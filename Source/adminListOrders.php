<?php 
    session_start();
    include("../controller/clsMain.php");
    $p = new Main();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ ĐƠN HÀNG KHÁCH HÀNG</title>
    <link rel="stylesheet" href="../css/adminListOrders.css">
    <style>
        .stateDelivery {
            text-align: center;
            font-weight: bold;
            width: 150px;
            height: 30px;
        }
        input.stateDelivery[value="HUỶ GIAO"] {
            color: red;
        }
        input.stateDelivery[value="ĐANG GIAO"] {
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">QUẢN LÝ ĐƠN HÀNG KHÁCH HÀNG</div>
        <div class="content">
            <div class="return-homepage">
                <a class="link-return" href="admin-page.php">TRỞ VỀ TRANG QUẢN TRỊ VIÊN</a>
            </div>
            <form action="" method="post">
                <table border="1" cellspacing="0">
                    <tr>
                        <td>CHECK</td>
                        <td>STT</td>
                        <td>MÃ ĐƠN</td>
                        <td>TỔNG TIỀN</td>
                        <td>HỌ TÊN</td>
                        <td>EMAIL</td>
                        <td>ĐỊA CHỈ</td>
                        <td>TT ĐƠN</td>
                        <td>TT GIAO</td>
                    </tr>
                    <?php 
                        echo $p->loadAdminListOrders("select * from dondathang order by madonhang asc");
                    ?>
                    <tr>
                        <td colspan="9">
                            <input type="submit" class="btn-confirm" name="btn" value="XÁC NHẬN GIAO">
                            <input type="submit" class="btn-cancel" name="btn" value="HUỶ GIAO">
                            <input type="submit" class="btn-delete" name="btn" value="XOÁ ĐƠN HÀNG">
                        </td>
                    </tr>
                </table>
                <?php 
                    $btn = isset($_POST['btn'])?$_POST['btn']:'';
                    switch($btn){
                        case 'HUỶ GIAO': {
                            $box_checked = $_POST['checkbox'];
                            if($box_checked != '') {
                                if($p->editData("UPDATE dondathang SET trangthai_vanchuyen = 'HUỶ GIAO' WHERE madonhang = '$box_checked'")==1) {
                                    $message = "Cập nhật trạng thái vận chuyển thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                                else {
                                    $message = "Cập nhật trạng thái vận chuyển không thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                            }
                            else {
                                $message = "Chọn đi mới sửa được chứ ba?";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                            break;
                        }
                        case 'XÁC NHẬN GIAO': {
                            $box_checked = $_POST['checkbox'];
                            if($box_checked != '') {
                                if($p->editData("UPDATE dondathang SET trangthai_vanchuyen = 'ĐANG GIAO' WHERE madonhang = '$box_checked'")==1) {
                                    $message = "Cập nhật trạng thái vận chuyển thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                                else {
                                    $message = "Cập nhật trạng thái vận chuyển không thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                            }
                            else {
                                $message = "Chọn đi mới sửa được chứ ba?";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                            break;
                        }
                        case 'XOÁ ĐƠN HÀNG': {
                            $box_checked = $_POST['checkbox'];
                            if($box_checked != '') {
                                if($p->editData("DELETE FROM dondathang WHERE madonhang = '$box_checked'")==1) {
                                    $message = "Xoá đơn hàng thành công";
                                    echo "<script type='text/javascript'>alert('$message');</script>";    
                                }
                                else {
                                    $message = "Xoá đơn hàng không thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";    
                                }
                            }
                            else {
                                $message = "Muốn xoá thì phải chọn chứ đã bồ?";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                            break;
                        }
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>