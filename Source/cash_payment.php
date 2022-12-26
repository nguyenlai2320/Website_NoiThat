<?php 
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include("../controller/clsMain.php");
    $p = new Main();
    if(isset($_SESSION['inputData']) && is_array($_SESSION['inputData'])){
        if($_SESSION['inputData']>0){
            for($i=0;$i<sizeof($_SESSION['inputData']);$i++){
                // echo '<h1>'.$_SESSION['inputData'][$i][0].'</h1>';
                $in4_cus_name = $_SESSION['inputData'][$i][3];
                $in4_cus_email = $_SESSION['inputData'][$i][4];
                $in4_cus_phone = $_SESSION['inputData'][$i][5];
                $in4_cus_address = $_SESSION['inputData'][$i][6];
                // $in4_ord_id = $_SESSION['inputData'][$i][0];
                $in4_ord_id = rand(1,1000000);
                $in4_ord_desc = $_SESSION['inputData'][$i][1];
                $in4_ord_amout = $_SESSION['inputData'][$i][2];
                $in4_ord_time_order = time();

            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THANH TOÁN BẰNG TIỀN MẶT</title>
    <link rel="stylesheet" href="../css/cash_payment.css">
</head>
<body>
    <div class="container">
        <div class="title">
            THANH TOÁN BẰNG TIỀN MẶT
        </div>
        <div class="content">
            <form action="" method="POST">
                <div class="form-group">
                    <!-- <label for="in4_ord_id">MÃ ĐƠN HÀNG</label> -->
                    <input type="hidden" name="in4_ord_id" value="<?php echo $in4_ord_id; ?>">
                </div>                
                <div class="form-group">
                    <label for="in4_ord_amount">TỔNG TIỀN ĐƠN HÀNG</label>
                    <input type="text" name="in4_ord_amount" value="<?php echo $in4_ord_amout; ?>">
                </div>                
                <div class="form-group">
                    <label for="in4_cus_name">HỌ TÊN KHÁCH HÀNG</label>
                    <input type="text" name="in4_cus_name" value="<?php echo $in4_cus_name; ?>">
                </div>                
                <div class="form-group">
                    <label for="in4_cus_email">EMAIL</label>
                    <input type="text" name="in4_cus_email" value="<?php echo $in4_cus_email; ?>">
                </div>                
                <div class="form-group">
                    <label for="in4_cus_phone">SỐ ĐIỆN THOẠI</label>
                    <input type="text" name="in4_cus_phone" value="<?php echo $in4_cus_phone; ?>">
                </div>                
                <div class="form-group">
                    <label for="in4_cus_address">ĐỊA CHỈ</label>
                    <input type="text" name="in4_cus_address" value="<?php echo $in4_cus_address; ?>">
                </div>                
                <div class="form-group">
                    <label for="in4_ord_desc">GHI CHÚ</label>
                    <input type="text" name="in4_ord_desc" value="<?php echo $in4_ord_desc; ?>">
                </div>      
                <!-- <div class="form-group">
                    <label for="in4_ord_time_order">THỜI GIAN ĐẶT HÀNG</label>
                    <input type="text" name="in4_ord_time_order" value="<?php echo date('Y-m-d H:m:s', $in4_ord_time_order); ?>">
                </div>       -->
                <div class="button">
                    <input type="submit" name="btn-submit" class="btn-submit" value="THANH TOÁN ĐƠN HÀNG">          
                </div>

                <?php 
                    $btn = isset($_POST['btn-submit'])?$_POST['btn-submit']:'';
                    switch($btn){
                        case 'THANH TOÁN ĐƠN HÀNG': {
                            $ipt_ord_id = $_POST['in4_ord_id'];
                            $ipt_ord_amount = $_POST['in4_ord_amount'];
                            $ipt_ord_desc = $_POST['in4_ord_desc'];
                            // $ipt_ord_time_order = $_POST['in4_ord_time_order'];
                            $ipt_cus_name = $_POST['in4_cus_name'];
                            $ipt_cus_email = $_POST['in4_cus_email'];
                            $ipt_cus_phone = $_POST['in4_cus_phone'];
                            $ipt_cus_address = $_POST['in4_cus_address'];
                            if($ipt_cus_name!='' && $ipt_ord_id!=''){
                                if($p->editData("INSERT INTO dondathang(madonhang,tongtien,hoten_kh,email,sdt,diachi,ghichu,trangthai_dathang,trangthai_vanchuyen) 
                                VALUES ('$ipt_ord_id', '$ipt_ord_amount', '$ipt_cus_name', '$ipt_cus_email', '$ipt_cus_phone', '$ipt_cus_address', '$ipt_ord_desc', 'THÀNH CÔNG', 'CHỜ VẬN CHUYỂN')")==1){
                                    $message = "Thanh toán thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                    header('location: pd_main.php');
                                }
                                else {
                                    $message = "Thanh toán thành công!";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                            }
                            else {
                                $message = "Vui lòng điền đầy đủ thông tin!";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                            break;
                        }
                    }
                ?>
            </form>
            <a style="width:300px;height:40px;color:#000;text-decoration:none;margin-left:40p;" href="pd_main.php">
                TRỞ VỀ TRANG CHỦ
            </a>
        </div>
    </div>
</body>
</html>