<?php 
    include("uploadFile.php");
    class AdminPage extends myFile{
        function connect() {
            $con = mysqli_connect("localhost", "nguyenhoang", "10897105", "minihouse-website");
            if(!$con) {
                die("Không thể kết nối tới cơ sở dữ liệu");
                exit();
            }
            else {
                mysqli_set_charset($con, "utf8");
                return $con;
            }
        }

        function loadListProduct($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0){
                while($row = mysqli_fetch_array($result)){
                    $masp = $row['masp'];
                    $tensp = $row['tensp'];
                    $hinhanh = $row['hinhanh'];
                    $giatien = $row['giatien'];
                    $mota = $row['mota'];
                    $xuatxu = $row['xuatxu'];

                    echo '<tr>
                            <td>
                                <a class="link-product" href="?masp='.$masp.'">'.$masp.'</a>
                            </td>
                            <td><a class="link-product" href="?masp='.$masp.'">'.$tensp.'</a></td>
                            <td><img src="../img/img_products/'.$hinhanh.'" alt="" width="150px"></td>
                            <td><a class="link-product" href="?masp='.$masp.'">'.$mota.'</a></td>
                            <td><a class="link-product" href="?masp='.$masp.'">'.$xuatxu.'</a></td>
                            <td><a class="link-product" href="?masp='.$masp.'">'.number_format($giatien,0," ",".").' VNĐ</a></td>
                        </tr>';
                }
            }
        }

        function loadListEmp($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0){
                while($row=mysqli_fetch_array($result)){
                    $manv = $row['manv_fk'];
                    $id_emp = $row['id'];
                    $taikhoan = $row['taikhoan'];
                    $matkhau = $row['matkhau'];

                    echo '<tr>
                            <td><a class="link-emp" href="?id_emp='.$id_emp.'">'.$manv.'</a></td>
                            <td><a class="link-emp" href="?id_emp='.$id_emp.'">'.$id_emp.'</a></td>
                            <td><a class="link-emp" href="?id_emp='.$id_emp.'">'.$taikhoan.'</a></td>
                            <td><a class="link-emp" href="?id_emp='.$id_emp.'">'.$matkhau.'</a></td>
                        </tr>';
                }
            }
            else {
                echo 'Không có dữ liệu!';
            }
        }

        function loadListCus($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0){
                while($row=mysqli_fetch_array($result)){
                    $makh = $row['makh_fk'];
                    $id = $row['id'];
                    $taikhoan = $row['taikhoan'];
                    $matkhau = $row['matkhau'];

                    echo '<tr>
                            <td><a class="link-cus" href="?id='.$id.'">'.$makh.'</a></td>
                            <td><a class="link-cus" href="?id='.$id.'">'.$id.'</a></td>
                            <td><a class="link-cus" href="?id='.$id.'">'.$taikhoan.'</a></td>
                            <td><a class="link-cus" href="?id='.$id.'">'.$matkhau.'</a></td>
                        </tr>';
                }
            }
            else {
                echo 'Không có dữ liệu!';
            }
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

        function getColumnCus($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            $value = '';
            if($i>0){
                while($row = mysqli_fetch_array($result)){
                    $cusID = $row[0];
                    $value = $cusID;
                }
            }
            return $value;
        }

        function getColumnEmp($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            $value = '';
            if($i>0){
                while($row = mysqli_fetch_array($result)){
                    $empID = $row[0];
                    $value = $empID;
                }
            }
            return $value;
        }

        function getColumnPD($sql){
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            $value = '';
            if($i>0){
                while($row = mysqli_fetch_array($result)){
                    $pdCode = $row[0];
                    $value = $pdCode;
                }
            }
            return $value;
        }
    }
?>