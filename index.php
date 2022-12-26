<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniHouse Nguyen Hoang</title>
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://kit.fontawesome.com/61bf5ef370.js" crossorigin="anonymous"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <link rel="icon" href="./icon/home.png" type="image/x-icon">
    <style>
        .customer-box {width: 250px;height: 60px;margin-left:-30px;margin-right:20px;background-color: #000;text-align: center;}
    </style>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "105266132348272");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
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
                                <li><a href="">LU VU TÔNG</a></li>
                                <li><a href="">XI LIN</a></li>
                                <li><a href="">ĐÌ O</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a href="./Source/about-us.php" class="menu-link">GIỚI THIỆU</a></li>
                        <li class="menu-item"><a href="./Source/contact.php" class="menu-link">LIÊN HỆ</a></li>
                    </ul>
                </div>
                <div class="right-option">
                    <div class="customer-box" >
                        <div class="user-option">
                            <div class="login-signup">
                                <a href="./Source/sign-in.php" class="login">ĐĂNG NHẬP</a> /
                                <a href="./Source/sign-up.php" class="signup">ĐĂNG KÝ</a>
                            </div>
                        </div>
                    </div>
                    <div class="cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <a href="./Source/cart.php" class="cart">GIỎ HÀNG</a>
                    </div>
                    <div class="hamburger-menu">
                        <input type="checkbox" name="menu_toggle" id="menu_toggle">
                        <label for="menu_toggle" class="menu_btn"><span></span></label>
                        
                        <div class="menu_box">
                            <div class="menu_item">
                                <form action="">
                                    <div class="search_label">
                                        <label for="search_box">TÌM KIẾM SẢN PHẨM</label>
                                    </div>
                                    <input type="text" class="search_box" id="search_box" placeholder="Nhập sản phẩm cần tìm ..." autocomplete="none">
                                    <button type="submit" id="search_btn" class="search_btn">TÌM KIẾM</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="content">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 4</div>
                    <img src="./img/carousel-1.jpg" style="width:100%;" alt="">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">2 / 4</div>
                    <img src="./img/carousel-2.jpg" style="width:100%;" alt="">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">3 / 4</div>
                    <img src="./img/carousel-4.jpg" style="width:100%;" alt="">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">4 / 4</div>
                    <img src="./img/carousel-5.jpg" style="width:100%;" alt="">
                </div>
                <a class="prev" onclick="plusSlides(-1)"><</a>
                <a class="next" onclick="plusSlides(1)">></a>
            </div>
            <br>
            <div style="text-align: center;">
                <span class="dot" onclick="currentSlide(1)"></span></div>
                <span class="dot" onclick="currentSlide(2)"></span></div>
                <span class="dot" onclick="currentSlide(3)"></span></div>
            </div>
            <div class="executive-members">
                <div class="member-title">
                    THÀNH VIÊN BAN SÁNG TẠO & ĐIỀU HÀNH
                </div>
                <div class="content-member">
                    <div class="first-person">
                        <div class="avatar-member">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="name-member">
                            <strong>ÔNG: NGUYỄN HOÀNG LAI</strong>
                            <br>
                            MÃ SỐ SINH VIÊN: 19468461
                            <br>
                            TRƯỞNG BAN SÁNG TẠO & ĐIỀU HÀNH WEBSITE - KIÊM NHÂN VIÊN BÁN HÀNG
                        </div>
                    </div>
                    <div class="second-person">
                        <div class="avatar-member">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="name-member">
                            <strong>ÔNG: NGUYỄN HOÀNG LÝ</strong>
                            <br>
                            MÃ SỐ SINH VIÊN: 19439051
                            <br>
                            PHÓ BAN SÁNG TẠO & ĐIỀU HÀNH WEBSITE - KIÊM NHÂN VIÊN BÁN HÀNG
                        </div>
                    </div>
                </div>
            </div>
            <button onclick="topFunction()" id="myBtn" title="Go to top">Trở về đầu <i class="fa-solid fa-arrow-up"></i></button>
    <script src="./js/new.js"></script>
    <script src="./js/scrollTop.js"></script>
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
                            <li><a href="./Source/about-us.php">GIỚI THIỆU</a></li>
                            <li><a href="./Source/contact.php">LIÊN HỆ</a></li>
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