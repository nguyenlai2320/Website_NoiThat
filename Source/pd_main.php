<?php 
    session_start();
    include("facebook_source.php");
    include("../controller/clsMain.php");
    $p = new Main();
    $getMaDM = 0;
    if(isset($_SESSION['madm'])){
        $getMaDM = $_SESSION['madm'];
    }
    $getAccName = 0;
    if(isset($_SESSION['taikhoan'])) {
        $getAccName = 1;
    }
    else if(isset($_SESSION['current_user'])){
        $getAccName = 2;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM</title>
    <link rel="stylesheet" href="../css/pd_main.css">
    <script src="https://kit.fontawesome.com/61bf5ef370.js" crossorigin="anonymous"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <link rel="icon" href="./icon/home.png" type="image/x-icon">

    <style>
        .customer-box {width: 250px;height: 60px;margin-left:-30px;margin-right:20px;background-color: #fff;}
        nav {width: 250px;background-color: #f2eef9;margin: 0px auto;}
        span {padding: 20px;background-color: #2d2f31;color: #fff;font-size: 16px;font-variant: small-caps;cursor: pointer;display: block;}
        span::after {float: right;right: 10%;content: "+";}
        .slide {clear: both;width: 100%;height: 0px;overflow: hidden;text-align: center;transition: height .4s ease;}
        .slide li a {text-decoration: none;color: #000;}
        .slide li:hover, .slide:focus {background-color: darkgray;font-weight: bold;}
        .slide li {padding: 20px;}
        #touch {position: absolute; opacity: 0; height: 0;}
        #touch:checked + .slide {height: 120px;}
    </style>
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
                    <a href="../index.php" class="text-logo-link" id="text-logo-link">
                        MINIHOUSE NGUYEN HOANG
                    </a>
                </div>
                <div class="menu-bar">
                    <ul class="menu-list">
                        <li class="menu-item item-one"><a href="" class="menu-link">SẢN PHẨM</a>
                        </li>
                        <li class="menu-item item-two"><a href="" class="menu-link">THƯƠNG HIỆU</a>
                            <ul>
                                <li><a href="">GU CHÌ</a></li>
                                <li><a href="">XÀ NẸO</a></li>
                                <li><a href="">XI LIN</a></li>
                                <li><a href="">LU VUI TÔNG</a></li>
                                <li><a href="">ĐÌ O</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a href="./about-us.php" class="menu-link">GIỚI THIỆU</a></li>
                        <li class="menu-item"><a href="./contact.php" class="menu-link">LIÊN HỆ</a></li>
                    </ul>
                </div>
                <div class="right-option">
                <div class="customer-box" >
                        <?php 
                            if($getAccName == 1){
                                echo '<nav>
                                <label for="touch"><span>'.$_SESSION['taikhoan'].'</span></label>
                                <input type="checkbox" id="touch">
                                
                                <ul class="slide">
                                <li><a href="myOrders.php">ĐƠN HÀNG CỦA TÔI</a></li>
                                <li><a href="logout.php">ĐĂNG XUẤT</a></li>
                                </ul>
                                </nav>';
                            }
                            else if($getAccName == 2){
                                echo '<nav>
                                        <label for="touch"><span>'.$_SESSION['current_user']['fullname'].'</span></label>
                                        <input type="checkbox" id="touch">
                                        
                                        <ul class="slide">
                                        <li><a href="myOrders.php">ĐƠN HÀNG CỦA TÔI</a></li>
                                        <li><a href="logout.php">ĐĂNG XUẤT</a></li>
                                        </ul>
                                    </nav>';
                            }
                            else {
                                echo '<div class="user-option">
                                        <div class="login-signup">
                                            <a href="" class="login">ĐĂNG NHẬP</a> /
                                            <a href="" class="signup">ĐĂNG KÝ</a>
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div class="cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <a href="./cart.html" class="cart">GIỎ HÀNG</a>
                    </div>


                    <div class="hamburger-menu">
                        <input type="checkbox" name="menu_toggle" id="menu_toggle">
                        <label for="menu_toggle" class="menu_btn"><span></span></label>
                        
                        <div class="menu_box">
                            <div class="menu_item">
                                <form action="" method="POST">
                                    <div class="search_label">
                                        <label for="search_box">TÌM KIẾM SẢN PHẨM</label>
                                    </div>
                                    <input type="text" name="search_box" class="search_box" id="search_box" placeholder="Nhập sản phẩm cần tìm ..." autocomplete="none">
                                    <button type="submit" name="search_btn" id="search_btn" class="search_btn">TÌM KIẾM</button>
                                </form>
                                <div class="result_search">
                                    <?php 
                                        if(isset($_POST['search_btn'])){
                                            $search_ipt = $_POST['search_box'];
                                            if($search_ipt == ''){
                                                echo 'Nhập tên sản phẩm cần tìm kiếm!';
                                            }
                                            else {
                                                $sqli = "select * from sanpham where tensp LIKE '%$search_ipt%'";
                                                $count = $p->pageNumber($sqli);
                                                if($count<=0){
                                                    echo 'Không tìm thấy sản phẩm!';
                                                }
                                                else {
                                                    echo 'Tìm thấy '.$count.' sản phẩm với từ khoá: '.$search_ipt.'';
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="content">
            <div class="left-pane">
                <div class="category-name">DANH MỤC SẢN PHẨM</div>
                <div class="category-list">
                    <?php 
                        $p->loadCategory("select * from danhmuc order by madanhmuc asc");
                    ?>
                </div>
            </div>
            <div class="right-pane">
                <div class="product-name">DANH SÁCH SẢN PHẨM</div>
                <div class="product-list">
                    <?php 
                        $page = 8;
                        $current_page = 1;
                        if(isset($_GET['page'])){
                            $current_page = $_GET['page'];
                        }
                        $offset = ($current_page-1)*$page;
                        if($getMaDM>0){
                            $p->loadProduct("select * from sanpham where madm_fk='$getMaDM' order by masp asc LIMIT 8 OFFSET ".$offset);
                        }
                        else if(isset($_POST['search_box'])){
                            $search_ipt = $_POST['search_box'];
                            $sqli = "select * from sanpham where tensp LIKE '%$search_ipt%'";
                            $p->loadProduct($sqli);
                        }
                        else{
                            $p->loadProduct("select * from sanpham LIMIT ".$page." OFFSET ".$offset);
                        }
                        $sql = "select * from sanpham";
                        $list = $p->pageNumber($sql);
                        $total_page = ceil($list/$page);
                    ?>
                </div>
            </div>
        </div>
        <div class="page-number">
            <ul class="number-list">
                <?php 
                    for($i=1; $i<=$total_page;$i++){
                        echo '<li class="number-item">
                        <a href="?page='.$i.'" class="number-link">'.$i.'</a>
                    </li>';
                    }
                ?>
            </ul>
        </div>
        <div class="footer">
            <div class="footer-top">
                <div class="above-one">
                    <div class="icon-footer-top">
                        <i class="fa-sharp fa-solid fa-wallet"></i>
                    </div>
                    <div class="text-footer-top">
                        THANH TOÁN NHANH CHÓNG VÀ BẢO MẬT
                    </div>
                </div>
                <div class="above-two">
                    <div class="icon-footer-top">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="text-footer-top">
                        GIAO HÀNG ĐẢM BẢO TRÊN TOÀN QUỐC
                    </div>
                </div>
                <div class="above-three">
                    <div class="icon-footer-top">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="text-footer-top">
                        HOTLINE: +84862481705 <br>
                        (7:00 AM - 5:00 PM)
                    </div>
                </div>
                <div class="above-four">
                    <div class="icon-footer-top">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div class="text-footer-top">
                        CAM KẾT SẢN PHẨM CHÍNH HÃNG
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-top">
                    <div class="bottom-one">
                        <ul>
                            <li><a href="">TRANG CHỦ</a></li>
                            <li><a href="">SẢN PHẨM</a></li>
                            <li><a href="./Source/about-us.html">GIỚI THIỆU</a></li>
                            <li><a href="./Source/contact.html">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                    <div class="bottom-two">
                        <ul>
                            <li><a href="">HƯỚNG DẪN MUA HÀNG</a></li>
                            <li><a href="">CHÍNH SÁCH ĐỔI TRẢ</a></li>
                            <li><a href="">CÂU HỎI THƯỜNG GẶP</a></li>
                        </ul>
                    </div>
                    <div class="bottom-three">
                        <ul>
                            <li><a href="">PHƯƠNG THỨC THANH TOÁN</a></li>
                            <li><a href="">
                                <i class="fa-brands fa-cc-visa icon"></i>
                                <i class="fa-brands fa-cc-mastercard icon"></i>
                            </a></li>
                        </ul>
                    </div>
                    <div class="bottom-four">
                        <ul>
                            <li><a href="">KẾT NỐI VỚI CHÚNG TÔI</a></li>
                            <li>
                                <a href=""><i class="fa-brands fa-square-facebook icon"></i></a>
                                <a href=""><i class="fa-brands fa-instagram icon"></i></a>
                                <a href=""><i class="fa-brands fa-google icon"></i></a>
                                <a href=""><i class="fa-brands fa-telegram icon"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="bottom-five">
                        <form action="./Source/contact.html" class="message-form" id="message-form">
                            <div class="message-text">ĐĂNG KÝ NHẬN BẢN TIN</div>
                            <input type="text" class="message-input" id="message-input" autocomplete="none" placeholder="VUI LÒNG NHẬP EMAIL VÀ NHẤN ENTER">
                        </form>
                    </div>
                </div>
                <div class="footer-bottom-bottom">
                    <div class="copyrights">
                        <div class="copyrights-text">
                            Copyright &copy; 2022 MiniHouse Nguyen Hoang.
                            <a href="">Chính sách</a>&nbsp;|&nbsp;
                            <a href="">Quy chế hoạt động</a>&nbsp;|&nbsp;
                            <a href="">Điều khoản và điều kiện</a>&nbsp;|&nbsp;
                            <a href="">Chủ sở hữu</a> 
                        </div>
                    </div>
                    <div class="logo-copyright">
                        <img src="./img/logoSaleNoti.png" alt="" style="width: 30%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>