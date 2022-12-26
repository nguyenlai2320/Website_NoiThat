<?php 

    class Main {

        function connect(){
            $con = mysqli_connect("localhost", "nguyenhoang", "10897105", "minihouse-website");
            if(!$con){
                die("Không thể kết nối tới cơ sở dữ liệu!");
                exit();
            }
            else {
                mysqli_set_charset($con, "utf8");
                return $con;
            }
        }

        function loadCategory($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0){
                while($row=mysqli_fetch_array($result)){
                    $madm = $row['madanhmuc'];
                    $tendm = $row['tendanhmuc'];
                    
                    echo '<div class="cate-list-item"><a style="color: #fff; text-decoration: none;" href="pd_main.php?madm='.$madm.'">'.$tendm.'</a></div>';
                }
            }
            else {
                echo 'Không có dữ liệu!';
            }
        }

        function loadListOrders($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0){
                $stt = 1;
                while($row = mysqli_fetch_array($result)){
                    $madonhang = $row['madonhang'];
                    $tongtien = $row['tongtien'];
                    $hoten_kh = $row['hoten_kh'];
                    $email = $row['email'];
                    $diachi = $row['diachi'];
                    $trangthai_dathang = $row['trangthai_dathang'];
                    $trangthai_vanchuyen = $row['trangthai_vanchuyen'];

                    echo '<tr>
                            <td><input type="checkbox" name="checkbox" value="'.$madonhang.'"/></td>
                            <td>'.$stt.'</td>
                            <td>'.$madonhang.'</td>
                            <td>'.$tongtien.'</td>
                            <td>'.$hoten_kh.'</td>
                            <td>'.$email.'</td>
                            <td>'.$diachi.'</td>
                            <td>'.$trangthai_dathang.'</td>
                            <td>'.$trangthai_vanchuyen.'</td>
                        </tr>';
                $stt++;

                    }
            }
        }

        function loadAdminListOrders($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0){
                $stt = 1;
                while($row = mysqli_fetch_array($result)){
                    $madonhang = $row['madonhang'];
                    $tongtien = $row['tongtien'];
                    $hoten_kh = $row['hoten_kh'];
                    $email = $row['email'];
                    $diachi = $row['diachi'];
                    $trangthai_dathang = $row['trangthai_dathang'];
                    $trangthai_vanchuyen = $row['trangthai_vanchuyen'];

                    echo '<tr>
                            <td><input type="checkbox" name="checkbox" value="'.$madonhang.'"/></td>
                            <td>'.$stt.'</td>
                            <td>'.$madonhang.'</td>
                            <td>'.$tongtien.'</td>
                            <td>'.$hoten_kh.'</td>
                            <td>'.$email.'</td>
                            <td>'.$diachi.'</td>
                            <td>'.$trangthai_dathang.'</td>
                            <td><input type="text" class="stateDelivery" name="stateDelivery" value="'.$trangthai_vanchuyen.'"></td>
                        </tr>';
                        $stt++;
                    }

            }
        }

        function loadProduct($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0){
                while($row=mysqli_fetch_array($result)){
                    $masp = $row['masp'];
                    $tensp = $row['tensp'];
                    $giatien = $row['giatien'];
                    $mota = $row['mota'];
                    $xuatxu = $row['xuatxu'];
                    $hinhanh = $row['hinhanh'];

                    echo '
                    <div class="pd-item">
                        <div class="pd-img"><img src="../img/img_products/'.$hinhanh.'" alt="" height="250px" width="300px"></div>
                        <div class="pd-name">'.$tensp.'</div>
                        <div class="pd-description">'.$mota.'</div>
                        <div class="pd-price">'.number_format($giatien,0," ",".").' VNĐ</div>
                        <div align="center">
                            <form action="cart.php" method="post">
                                <input type="hidden" name="pd_name" value="'.$tensp.'">
                                <input type="hidden" name="pd_img" value="'.$hinhanh.'">
                                <input type="hidden" name="pd_price" value="'.$giatien.'">
                                <input type="hidden" name="pd_description" value="'.$mota.'">
                                <input type="number" name="pd_quantity" style="width: 100px;" value="1">
                                <input type="submit" name="btn-buy" style="width: 100px; font-weight:bold;background-color:lightgreen;cursor:pointer;" value="MUA">
                                </form>
                        </div>
                    </div>';
                }
            }
            else {
                echo 'Không có dữ liệu!';
            }
        }

        function pageNumber($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            @mysqli_close($link);
            $i = mysqli_num_rows($result);
            return $i;
        }

        function editData($sql){
            $link = $this->connect();
            if(mysqli_query($link,$sql)){
                return 1;
            }
            else {
                return 0;
            }
        }

    }

    

?>