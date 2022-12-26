<?php 

    class loginAccount{

        function connect(){
            $con = mysqli_connect("localhost","nguyenhoang","10897105","minihouse-website");
            if(!$con){
                die("Cannot connect to database!");
                exit();
            }
            else {
                mysqli_set_charset($con,"utf8");
                return $con;
            }
        }

        function myLogin($taikhoan, $matkhau){
            $matkhau = md5($matkhau);
            $link = $this->connect();
            $sql = "select id, taikhoan, matkhau from taikhoan_kh where taikhoan='$taikhoan' and matkhau='$matkhau' LIMIT 1";
            $result = mysqli_query($link,$sql);
            $i = mysqli_num_rows($result);
            @mysqli_close($link);
            if($i>0) {
                while($row = @mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $taikhoan =  $row['taikhoan'];
                    $matkhau = $row['matkhau'];
                    $_SESSION['id'] = $id;
                    $_SESSION['taikhoan'] = $taikhoan;
                    $_SESSION['matkhau'] = $matkhau;

                    header('location: ./pd_main.php');
                }
                return 1;
            }
            else {
                return 0;
            }
        }

        function confirmLogin($id, $taikhoan, $matkhau){
            $link = $this->connect();
            $sql = "select id from taikhoan_kh where id='$id' and taikhoan='$taikhoan' and matkhau='$matkhau' LIMIT 1";
            $result = mysqli_query($link, $sql);
            $i = mysqli_num_rows($result);
            if($i!=1){
                header('location: ./Source/sign-in.php');
            }
        }
    }

?>