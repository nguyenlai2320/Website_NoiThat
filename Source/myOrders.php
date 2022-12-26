<?php 
    session_start();
    include("../controller/clsMain.php");
    $p = new Main();
    $cus_name = 0;
    if(isset($_SESSION['taikhoan'])) {
        $cus_name = $_SESSION['taikhoan'];
    }
    else if(isset($_SESSION['current_user'])){
        $cus_name = $_SESSION['current_user'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐƠN HÀNG CỦA TÔI</title>
    <link rel="stylesheet" href="../css/myOrders.css">
</head>
<body>
    <div class="container">
        <div class="title">
            ĐƠN HÀNG CỦA TÔI
        </div>
        <div class="content">
            <div class="return-homepage">
                <a class="link-return" href="pd_main.php">
                    TRỞ VỀ TRANG CHỦ
                </a>
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
                        echo $p->loadListOrders("select * from dondathang where email = '$cus_name' order by madonhang asc");
                    ?>
                    <tr>
                        <td colspan="9">
                            <input type="submit" class="btn-cancel" name="btn" value="HUỶ ĐƠN">
                        </td>
                    </tr>
                </table>
                <?php 
                    $btn = isset($_POST['btn'])?$_POST['btn']:'';
                    switch($btn) {
                        case 'HUỶ ĐƠN': {
                            $box_checked = $_POST['checkbox'];
                            if($box_checked!='') {
                                if($p->editData("UPDATE dondathang SET trangthai_dathang = 'HUỶ ĐƠN' WHERE madonhang = '$box_checked' ")==1) {
                                    $message = "Huỷ đơn hàng thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                                else {
                                    $message = "Huỷ đơn hàng không thành công";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                            }
                            else {
                                $message = "Chưa chọn lấy gì huỷ đơn hả má?";
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