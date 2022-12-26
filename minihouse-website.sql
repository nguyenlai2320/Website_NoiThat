-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 14, 2022 lúc 04:46 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `minihouse-website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet_sp`
--

DROP TABLE IF EXISTS `baiviet_sp`;
CREATE TABLE IF NOT EXISTS `baiviet_sp` (
  `mabaiviet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tieude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `manv_fk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mabaiviet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi_kh`
--

DROP TABLE IF EXISTS `cauhoi_kh`;
CREATE TABLE IF NOT EXISTS `cauhoi_kh` (
  `macauhoi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidungcauhoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidungtraloi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`macauhoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoi_kh`
--

INSERT INTO `cauhoi_kh` (`macauhoi`, `hoten`, `email`, `sdt`, `noidungcauhoi`, `noidungtraloi`) VALUES
('1', 'ten', 'mail', 'sdt', 'noidung', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap_fb`
--

DROP TABLE IF EXISTS `dangnhap_fb`;
CREATE TABLE IF NOT EXISTS `dangnhap_fb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dangnhap_fb`
--

INSERT INTO `dangnhap_fb` (`id`, `username`, `password`, `email`, `fullname`, `birthday`, `status`, `created_time`, `last_updated`) VALUES
(2, NULL, NULL, 'nguyenlai17621@gmail.com', 'Nguyễn Hoàng Lai', NULL, 1, 1666365473, 1666365473);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `madanhmuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`madanhmuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`madanhmuc`, `tendanhmuc`) VALUES
('BANAN', 'BÀN ĂN'),
('BANLAMVIEC', 'BÀN LÀM VIỆC'),
('SOFA', 'GHẾ SOFA'),
('TUQUANAO', 'TỦ QUẦN ÁO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE IF NOT EXISTS `dondathang` (
  `madonhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` int(20) NOT NULL,
  `hoten_kh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai_dathang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'THÀNH CÔNG',
  `trangthai_vanchuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CHỜ VẬN CHUYỂN',
  PRIMARY KEY (`madonhang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`madonhang`, `tongtien`, `hoten_kh`, `email`, `sdt`, `diachi`, `ghichu`, `trangthai_dathang`, `trangthai_vanchuyen`) VALUES
('839653', 590000000, 'Trương Thành Đạt', 'thanhdat177@gmail.com', '0862481706', 'Long An', 'Noi dung thanh toan', 'THÀNH CÔNG', 'CHỜ VẬN CHUYỂN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotenkh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nganhang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `hotenkh`, `sdt`, `ngaysinh`, `diachi`, `stk`, `nganhang`, `email`) VALUES
('KH01', 'Truong Thanh Dat', '0354125764', '2002-07-31', '50 Le Duc Tho, phuong 2, quan Go Vap, TP.HCM', '21479925', 'Agribank', 'thanhdat01@gmail.com'),
('KH02', 'Nguyen Tri Tinh', '0341547851', '2002-07-31', '116/17 Nguyen Van Luong, phuong 17, quan Go Vap, TP.HCM', '20973985', 'MB Bank', 'tritinh02@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khosanpham`
--

DROP TABLE IF EXISTS `khosanpham`;
CREATE TABLE IF NOT EXISTS `khosanpham` (
  `makho` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`makho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khosanpham`
--

INSERT INTO `khosanpham` (`makho`, `soluong`) VALUES
('KHOBANAN', 100),
('KHOBANLAMVIEC', 100),
('KHOSOFA', 100),
('KHOTUQUANAO', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `manv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotennv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `hotennv`, `sdt`, `ngaysinh`, `diachi`, `email`, `chucvu`) VALUES
('NV01', 'Nguyen Hoang Ly', '0862415846', '2001-11-25', '12 Nguyen Van Bao, phuong 4, quan Go Vap, TP.HCM', 'hoangly.2511@gmail.com', 'Nhan vien ban hang'),
('NV02', 'Ha Phu Khuong', '0842514762', '2001-09-19', '14 Nguyen Van Bao, phuong 4, quan Go Vap, TP.HCM', 'phukhuong199@gmail.com', 'Nhan vien giao hang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantrivien`
--

DROP TABLE IF EXISTS `quantrivien`;
CREATE TABLE IF NOT EXISTS `quantrivien` (
  `maqtv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotenqtv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maqtv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quantrivien`
--

INSERT INTO `quantrivien` (`maqtv`, `hotenqtv`, `sdt`, `ngaysinh`, `diachi`, `email`) VALUES
('QTV01', 'Nguyen Hoang Lai', '0862481705', '2001-06-17', '116/17 Nguyen Van Luong, phuong 17, quan Go Vap, TP.HCM', 'nguyenlai1706@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giatien` float NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xuatxu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `madm_fk` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manv_fk` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `makho_fk` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`masp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `hinhanh`, `giatien`, `mota`, `xuatxu`, `madm_fk`, `manv_fk`, `makho_fk`) VALUES
('BANH13', 'BỘ BÀN ĂN 4 GHẾ MANGO NÂU - BANH13', 'ms20.jpg', 3100000, 'Kích thước 3mx2m', 'Việt Nam Net', 'BANAN', 'NV01', 'KHOBANAN'),
('BANH36', 'BỘ BÀN ĂN 4 GHẾ MẶT ĐEN', 'ms23.jpg', 5900000, 'Kích thước 3mx2m', 'Việt Nam', 'BANAN', 'NV01', 'KHOBANAN'),
('BANH39', 'BỘ BÀN ĂN 6 GHẾ GỖ SỒI - BANH39', 'ms22.jpg', 8200000, 'Kích thước 3mx2m', 'Việt Nam', 'BANAN', 'NV01', 'KHOBANAN'),
('BANH40', 'BỘ BÀN ĂN 4 GHẾ MẶT GIẢ ĐÁ - BANH40', 'ms21.jpg', 2200000, 'Kích thước 3mx2m', 'Việt Nam', 'BANAN', 'NV01', 'KHOBANAN'),
('BANH42', 'BỘ BÀN ĂN 6 GHẾ VERTICAL - BANH42', 'ms19.jpg', 7900000, 'Kích thước 3mx2m', 'Việt Nam', 'BANAN', 'NV01', 'KHOBANAN'),
('BLVNH21', 'BÀN LÀM VIỆC VÁCH NGĂN 8 NGƯỜI - BLVNH21', 'ms18.jpg', 3400000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('BLVNH38', 'BÀN LÀM VIỆC CHÂN SẮT RYDER - BLVNH38', 'ms13.jpg', 2600000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('BLVNH39', 'MODULE BÀN LÀM VIỆC VÁCH NGĂN 4 NGƯỜI - BLVNH39', 'ms17.jpg', 3400000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('BLVNH40', 'BÀN LÀM VIỆC 1M6 CÓ 2 HỘC - BLVNH40', 'ms11.jpg', 2700000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('BLVNH41', 'CỤM BÀN LÀM VIỆC VÁCH NGĂN 2 NGƯỜI - BLVNH41', 'ms16.jpg', 3600000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('BLVNH42', 'MODULE BÀN LÀM VIỆC 4 NGƯỜI - BLVNH42', 'ms14.jpg', 6400000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('BLVNH45', 'BÀN LÀM VIỆC CHÂN SẮT CHỮ U - BLVNH45', 'ms12.jpg', 550000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('BLVNH61', 'BÀN VÁCH NGĂN 6 NGƯỜI - BLVNH61', 'ms15.jpg', 3000000, 'Kích thước 3mx2m', 'Việt Nam', 'BANLAMVIEC', 'NV01', 'KHOBANLAMVIEC'),
('SFNH59', 'GHẾ SOFA PHÒNG NGỦ - SFNH59', 'ms05.jpg', 6000000, 'Kích thước 3mx2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH66', 'GHẾ SOFA VĂNG DA CAO CẤP - SFNH66', 'ms08.jpg', 6000000, 'Kích thước 3mx2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH69', 'GHẾ SOFA VĂNG DA CAO CẤP - SFNH69', 'ms06.jpg', 5400000, 'Kích thước 3mx2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH71', 'GHẾ SOFA NỈ CHỮ L PHÒNG KHÁC - SFNH71', 'ms07.jpg', 9200000, 'Kích thước 3mx2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH75', 'GHẾ SOFA VĂNG MÀU DA CAO CẤP - SFNH75', 'ms09.jpg', 5400000, 'Kích thước 3mx2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH88', 'GHẾ SOFA DA CHỮ L - SFNH88', 'ms04.jpg', 8500000, 'Kích thước 3mx2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH90', 'GHẾ SOFA NỈ CHỮ L - SFNH90', 'ms03.jpg', 5300000, 'Kích thước ghế 3mx2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH95', 'GHẾ SOFA DÂY VĂNG HIỆN ĐẠI - SFNH95', 'ms02.jpg', 5200000, 'Kích thước ghế dài 2m', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('SFNH97', 'GHẾ SOFA CHỮ L GỖ SỒI - SFNH97', 'ms01.jpg', 14000000, 'Kích thước 2m6x1m6 bao gồm bàn, ghế rời và gối như hình', 'Việt Nam', 'SOFA', 'NV01', 'KHOSOFA'),
('TAQNH04', 'TỦ QUẦN ÁO CÁNH LÙA - TQANH04', 'ms25.jpg', 7500000, 'Kích thước 3mx2m', 'Việt Nam', 'TUQUANAO', 'NV01', 'KHOTUQUANAO'),
('TAQNH05', 'TỦ QUẦN ÁO CÁNH LÙA VIỀN NÂU - TAQNH05', 'ms27.jpg', 3000000, 'Kích thước 3mx2m', 'Việt Nam', 'TUQUANAO', 'NV01', 'KHOTUQUANAO'),
('TAQNH07', 'TỦ QUẦN ÁO CÁNH LÙA VIỀN NÂU - TQANH07', 'ms26.jpg', 3100000, 'Kích thước 3mx2m', 'Việt Nam', 'TUQUANAO', 'NV01', 'KHOTUQUANAO'),
('TQANH02', 'TỦ QUẦN ÁO 3 CÁNH MÀU GỖ - TQANH02', 'ms24.jpg', 2800000, 'Kích thước 3mx2m', 'Việt Nam', 'TUQUANAO', 'NV01', 'KHOTUQUANAO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_kh`
--

DROP TABLE IF EXISTS `taikhoan_kh`;
CREATE TABLE IF NOT EXISTS `taikhoan_kh` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `makh_fk` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `taikhoan` (`taikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_kh`
--

INSERT INTO `taikhoan_kh` (`id`, `taikhoan`, `matkhau`, `makh_fk`) VALUES
(1, 'thanhdat177@gmail.com', '2e678024cabebdfe17a5aeef0163fe6d', 'KH01'),
(2, 'tritinh273@gmail.com', 'a8e1560b56e0284a54727be2fe3c8853', 'KH02'),
(3, 'phukhuong176@gmail.com', '94712b247dc2485c94ed725d0ee59c8e', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_nv`
--

DROP TABLE IF EXISTS `taikhoan_nv`;
CREATE TABLE IF NOT EXISTS `taikhoan_nv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manv_fk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_nv`
--

INSERT INTO `taikhoan_nv` (`id`, `taikhoan`, `matkhau`, `manv_fk`) VALUES
(1, 'hoangly2311@gmail.com', '884fceaed613b07bab0314eef7b8777d', 'NV01'),
(2, 'phukhuong199@gmail.com', '94712b247dc2485c94ed725d0ee59c8e', 'NV02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_qtv`
--

DROP TABLE IF EXISTS `taikhoan_qtv`;
CREATE TABLE IF NOT EXISTS `taikhoan_qtv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `maqtv_fk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_qtv`
--

INSERT INTO `taikhoan_qtv` (`id`, `taikhoan`, `matkhau`, `maqtv_fk`) VALUES
(1, 'nguyenlai1706@gmail.com', '1f77fa5082112344e08f6befbf5476e5', 'QTV01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
