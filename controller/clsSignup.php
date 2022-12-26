<?php 

    class signupAccount {

        function connect() {
            $con = mysqli_connect("localhost", "nguyenhoang", "10897105", "minihouse-website");
            if(!$con) {
                die("Không kết nối được với cơ sở dữ liệu!");
                exit();
            }
            else {
                mysqli_set_charset($con, "utf8");
                return $con;
            }
        }

        function manipulateAccount($sql){
            $link = $this->connect();
            if(mysqli_query($link, $sql)){
                return 1;
            }
            else {
                return 0;
            }
        }

    }

?>