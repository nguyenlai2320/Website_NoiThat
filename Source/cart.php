<?php 
    session_start();
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    if(isset($_GET['delcart']) && $_GET['delcart']==1) unset($_SESSION['cart']);
    if(isset($_GET['delid']) && $_GET['delid']>=0) {
        array_splice($_SESSION['cart'],$_GET['delid'],1);
    } 
    if(isset($_POST['btn-buy']) && $_POST['btn-buy']) {
        $pd_name = $_POST['pd_name'];
        $pd_img = $_POST['pd_img'];
        $pd_price = $_POST['pd_price'];
        $pd_quantity = $_POST['pd_quantity'];

        $check = 0;
        for($i=0;$i<sizeof($_SESSION['cart']);$i++){
            if($_SESSION['cart'][$i][0] == $pd_name){
                $check = 1;
                $quantityUpdated = $pd_quantity + $_SESSION['cart'][$i][3];
                $_SESSION['cart'][$i][3] = $quantityUpdated;
                break;
            }
        }

        if($check==0){
            $pd_info = [$pd_name,$pd_img,$pd_price,$pd_quantity];
            $_SESSION['cart'][] = $pd_info;
        }
    }
    function showCart(){
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
            if(sizeof($_SESSION['cart'])>0){
                $totalPriceOrder = 0;
                for($i=0; $i<sizeof($_SESSION['cart']); $i++){
                    $totalPriceProduct = $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][3];
                    $totalPriceOrder += $totalPriceProduct;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td>'.$_SESSION['cart'][$i][0].'</td>
                            <td><img src="../img/img_products/'.$_SESSION['cart'][$i][1].'" alt="" width="100px"></td>
                            <td>'.number_format($_SESSION['cart'][$i][2],0," ",".").' VNĐ</td>
                            <td>'.$_SESSION['cart'][$i][3].'</td>
                            <td>'.number_format($totalPriceProduct,0," ",".").' VNĐ</td>   
                            <input type="hidden" name="totalPriceOrder" value="'.$totalPriceOrder.'">     
                            <td>
                                <a href="cart.php?delid='.$i.'" style="width:200px;height:40px;background-color:#333;border-radius:5px;padding: 5px 10px 5px 10px;cursor:pointer;text-decoration:none;color:#fff;font-weight:bold;">XOÁ SẢN PHẨM</a>
                            </td>                
                        </tr>';
                }
                echo '<tr>
                        <td colspan="3">
                            <button type="submit" name="btn-clear-cart" style="width:150px;height:30px;background:lightcoral;font-weight:bold;border-radius:5px;">
                                <a href="cart.php?delcart=1" style="text-decoration:none;color:#000;">LÀM TRỐNG GIỎ HÀNG</a>
                            </button>

                        </td>
                        <td colspan="2"><strong>THÀNH TIỀN</strong></td>
                        <td>'.number_format($totalPriceOrder,0," ",".").' VNĐ</td>
                        <td>
                        </td>
                    </tr>';
            }
            else {
                echo '<div align="center" style="font-weight:bold;color:red;font-size:20px;">GIỎ HÀNG CÓ CÁI GÌ ĐÂU !? CÒN KHÔNG MAU THÊM VÔ ĐI?</div>';
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
    <title>GIỎ HÀNG</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="icon" href="../icon/cart.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="cart-title">
            GIỎ HÀNG CỦA BẠN
        </div>
        <form action="index_vpn.php" method="POST">
            <div class="info-cus">
                <div class="form-field">
                    <input type="text" class="info-ipt-name" name="info-ipt-name" id="info-ipt-name" autocomplete="none" placeholder=" ">
                    <label for="" id="info-lb-name" class="info-lb-name">HỌ TÊN KHÁCH HÀNG</label>
                </div>
                <div class="form-field">
                    <input type="text" class="info-ipt-email" name="info-ipt-email" id="info-ipt-email" autocomplete="none" placeholder=" ">
                    <label for="" id="info-lb-email" class="info-lb-email">EMAIL</label>
                </div>
                <div class="form-field">
                    <input type="text" class="info-ipt-phone" name="info-ipt-phone" id="info-ipt-phone" autocomplete="none" placeholder=" ">
                    <label for="" id="info-lb-phone" class="info-lb-phone">SỐ ĐIỆN THOẠI</label>
                </div>
                <div class="form-field">
                    <input type="text" class="info-ipt-address" id="info-ipt-address" name="info-ipt-address" placeholder=" ">
                    <label for="" id="info-lb-address" class="info-lb-address">ĐỊA CHỈ GIAO HÀNG</label>
                </div>
            </div>
            <div class="line"></div>
            <div class="cart">
                <button class="btn-addmore-pd" name="btn-addmore-pd" type="submit" style="width: 200px;height: 30px;background-color: lightgreen;border-radius: 5px;font-weight: bold;margin-left: 160px;margin-top:20px;">
                    <a href="./pd_main.php">THÊM TIẾP SẢN PHẨM</a>
                </button>
                <table class="cart-tbl" id="cart-tbl" border="1" cellspacing="0">
                    <tr>
                        <td>STT</td>
                        <td>TÊN SẢN PHẨM</td>
                        <td>HÌNH ẢNH</td>
                        <td>ĐƠN GIÁ</td>
                        <td>SỐ LƯỢNG</td>
                        <td>THÀNH TIỀN</td>
                        <td>TUỲ CHỌN</td>
                    </tr>
                    <?php showCart(); ?> 
                </table>
                <div class="submit-buy">
                    <input type="submit" class="btn-submit-buy" name="btn-submit-buy" value="THANH TOÁN">
                </div>
            </div>
        </form>
    </div>
</body>
</html>