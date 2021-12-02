-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2021 lúc 09:26 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phonggym`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitap`
--

CREATE TABLE `baitap` (
  `id` int(11) NOT NULL,
  `ma_bt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baitap`
--

INSERT INTO `baitap` (`id`, `ma_bt`, `name`, `ma_nhom`, `video`) VALUES
(5, 'TA01', 'Tập tay trước - Seated dumbbel', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/G6pQL18fmJ8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(6, 'NG01', 'Tập ngực - Flat Barbell Bench Pr', 'bt_04', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/kKKuzmkLtv0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(9, 'MO06', 'Hướng Dẫn Tập Mông Đúng Cách ', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/1DsKJU9o2tg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(13, 'NG08', '[NG01] Tập ngực - Flat Barbell B', 'bt_04', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/kKKuzmkLtv0\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(14, 'NG07', '[NG02] Tác dụng của các kiểu tay', 'bt_04', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/gV6P7PqWvps\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(15, 'NG04', '[NG04] Tập ngực - Decline Barbell Bench Press', 'bt_04', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/QEzSGi5PwuM\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(16, 'NG06', '[NG06] Tập ngực - Flat Dumbbell Bench Press', 'bt_04', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/klNatl9L-ck\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(17, 'NG05', '[NG05] Tập ngực - Incline Push Up', 'bt_04', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/UGDtsQrt1gU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(18, 'BU02', '[BU02] Tập bụng - Plank1', 'bt_01', ''),
(20, 'BU01', '[BU01] Tập bụng - Crunch', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/CWsTc7ylIVg\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(21, 'BU03', '[BU03] Hướng Dẫn Tập bụng Đúng Cách - Deadbug', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/WETokpTyvcA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(22, 'BU04', '[BU04] Hướng Dẫn Tập bụng Đúng Cách - Palloff Pres', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/A15rdPx4A2w\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(23, 'BU05', '[BU05] Hướng Dẫn Tập bụng Đúng Cách - Lying Windsh', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/1QnKrnTWv30\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(24, 'BU06', '[BU06] Hướng Dẫn Tập bụng Đúng Cách - Hanging Wind', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/RorK4R8FCfk\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(25, 'BU07', '[BU07] Hướng Dẫn Tập bụng Đúng Cách - Bird Dog', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/9m4I5-McC0I\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(26, 'BU08', '[BU08] Hướng Dẫn Tập Bụng Đúng Cách - Russian Twis', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/AxW2hfJ0XlA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(27, 'BU09', '[BU09] Tập Bụng Đúng Cách - Side Full Plank', 'bt_01', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/2oV59grrI2Q\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(28, 'MO01', '[MO01] Tập mông - Hip thrust', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/MGswVWCSojk\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(29, 'MO02', '[MO02] Tập mông - Pull through', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/8Iu3HVSbNrU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(30, 'MO03', '[MO03] Tập mông - Hyperextension', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/fngZkO8aPA8\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(31, 'MO04', '[MO04] Hướng Dẫn Tập mông Đúng Cách - Reverse Hype', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/kntT4MgaeLo\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(32, 'MO05', '[MO05] Hướng Dẫn Tập mông Đúng Cách - Glute Bridge', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/5LYoFBq3TfI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(33, 'MO07', '[MO07] Hướng Dẫn Tập Mông Đúng - Frog Pump', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/sUF6brROCvk\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(34, 'MO08', '[MO08] Hướng Dẫn Tập Mông Đúng - Hip Abduction Cab', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/HoUpSrDS2As\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(35, 'MO09', '[MO09] Tập Mông đúng cách - Kneeling Hip Hing', 'bt_05', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/XWe03bOGbIY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(37, 'TA02', '[TA02] Tập tay trước - Seated Hammer curl', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/9f5juF0hyss\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(38, 'TA03', '[TA03] Tập tay sau - Rope Triceps Extension', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/6OfbiOUcJSw\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(39, 'TA04', '[TA04] Tập tay trước - Incline Biceps Curl', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/1RzJ2e3RnZ8\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(40, 'TA05', '[TA05] Tập tay sau - Lying triceps extension', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/gD6-szbDi2M\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(41, 'TA06', '[TA06] Tập tay trước - Preacher Curl', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/dDxplbaK4XY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(42, 'TA07', '[TA07] Tập tay trước - Scott Curl', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/1Q8q19HH7fg\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(43, 'TA08', '[TA08] Hướng Dẫn Tập Tay Đúng - Triceps Kickback w', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/BVjiz09wwhc\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(44, 'TA09', '[TA09] Hướng Dẫn Tập Tay Đúng - Dumbbell Overhead ', 'bt_06', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/HA9UR4ydpSY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(45, 'VA01', '[VA01] Tập vai - Standing Dumbbell Front Raise', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/t5pXxF94tuo\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(46, 'VA02', '[VA02] Tập vai - Standing Dumbbell Lateral Raise', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/wDH5Z50p9-U\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(47, 'VA03', '[VA03] Tập vai - Seated Dumbbell Shoulder Press', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/neIy-6C3S3s\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(48, 'VA04', '[VA04] Tập vai - Standing Dumbbell Shoulder Press', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/F7VjnH9Avx8\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(49, 'VA05', '[VA05] Tập vai - Rear Delt Fly', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/CZwnEtibC4E\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(50, 'VA06', '[VA06] Tập vai - Seated Arnold Shoulder Press', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/gQa4O8NPOXQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(51, 'VA07', '[VA07] Hướng Dẫn Tập Vai Đúng - Rear Delt Fly', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/XFSCz86Br7M\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(52, 'VA08', '[VA08] Hướng Dẫn Tập Vai Đúng - Standing Barbell S', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/RzNtsFkKuZk\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(53, 'VA09', '[VA09] Hướng Dẫn Tập Vai Đúng - Cable Lateral Rais', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/k19w9w0uBuc\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(54, 'VA10', '[VA10] Tập Vai đúng cách - Poliquin Lateral Raise', 'bt_03', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/G5zh76fZcSo\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(55, 'CH01', '[CH01] Tập chân - Barbell Romanian Deadlift', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/k7JXXSRrTJ8\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(56, 'CH02', '[CH02] Tập chân - Dumbbell Romanian Deadlift', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/6nciQmeoeZo\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(57, 'CH03', '[CH03] Tập chân - Barbell Conventional Deadlift', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/ZJyjRPaacCM\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(58, 'CH04', '[CH04] Hướng Dẫn Tập chân Đúng Cách - Stiff-Legged', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/EZCIzmQRoz0\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(59, 'CH05', '[CH05] Hướng Dẫn Tập Chân Đúng Cách - Sumo Deadlif', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/AyuKwt3JdPU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(60, 'CH06', '[CH06] Hướng Dẫn Tập Chân Đúng - Standing Goodmorn', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/oesbKVhKCWQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(61, 'CH07', '[CH07] Hướng Dẫn Tập Chân Đúng - Seated Goodmornin', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/-a8ztkzaFjA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(62, 'CH08', '[CH08] Hướng Dẫn Tập Chân Đúng - Glute Ham Raise', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/pU45nDuakuA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(63, 'CH09', '[CH09] Hướng Dẫn Tập Chân Đúng - Machine Seated Hi', 'bt_02', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/aJh0kE6hAxA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `id` int(11) NOT NULL,
  `id_phieunhap` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `trangthai` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`id`, `id_phieunhap`, `tensp`, `gianhap`, `soluong`, `thanhtien`, `trangthai`) VALUES
(19, 29, 'aaaaaa', 111111, 4, 444444, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieuxuat`
--

CREATE TABLE `chitietphieuxuat` (
  `id` int(11) NOT NULL,
  `id_phieuxuat` int(11) NOT NULL,
  `id_sp_kho` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietphieuxuat`
--

INSERT INTO `chitietphieuxuat` (`id`, `id_phieuxuat`, `id_sp_kho`, `soluong`) VALUES
(43, 28, 7, 5),
(44, 28, 8, 5),
(45, 29, 7, 2),
(46, 29, 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `thongtin` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `name`, `sdt`, `diachi`, `total`, `created_time`, `last_updated`, `thongtin`) VALUES
(38, ' Nguyễn Văn Long', 3333, 'Hà Nội1', 5370000, 1634292612, 1634292612, 'aaa'),
(39, 'Nguyễn Duy', 948384352, 'Hà Nội', 7740000, 1634292676, 1634292676, 'aa'),
(40, 'Nguyễn Duy Thanh', 3333441, 'Hà Nội', 6000000, 1634372722, 1634372722, 'gggg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ncc`
--

INSERT INTO `ncc` (`id`, `name`, `diachi`, `sdt`, `email`) VALUES
(5, 'Nhà cung cấp 1', 'Hà Nội', '012345674', 'nhacungcap1@gmail.com'),
(6, 'Nhà cung cấp 2', 'Thái Bình', '1475826035', 'nhacungcap2@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

CREATE TABLE `nhom` (
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nhom` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `luong` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`ma_nhom`, `ten_nhom`, `luong`) VALUES
('nb_ad', 'admin', '100.000.000vnđ'),
('nb_hlv', 'Huấn luyện viên', '10.000.000vnd'),
('nb_nv', 'Nhân viên', '5.000.000vnd'),
('nb_ql_hlv', 'Quản lý huấn luyện viên', '15.000.000vnđ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom_bt`
--

CREATE TABLE `nhom_bt` (
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nhom` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom_bt`
--

INSERT INTO `nhom_bt` (`ma_nhom`, `ten_nhom`) VALUES
('bt_01', 'Tập bụng'),
('bt_02', 'Tập chân'),
('bt_03', 'Tập vai'),
('bt_04', 'Tập Ngực'),
('bt_05', 'Tập Mông'),
('bt_06', 'Tập Tay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom_sp_kho`
--

CREATE TABLE `nhom_sp_kho` (
  `id_nhom` int(11) NOT NULL,
  `ten_nhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhom_sp_kho`
--

INSERT INTO `nhom_sp_kho` (`id_nhom`, `ten_nhom`) VALUES
(1, 'Sữa Tăng Cân'),
(2, 'Vitamin & Health');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `time` varchar(32) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `id_user_noibo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `thanhtien`, `time`, `id_ncc`, `id_user_noibo`) VALUES
(29, 444444, '1634230800', 5, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `id_user_noibo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`id`, `time`, `id_user_noibo`) VALUES
(28, '15-10-2021', 28),
(29, '15-10-2021', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tien` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `Img` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_sp_kho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `tien`, `thongtin`, `soluong`, `Img`, `id_sp_kho`) VALUES
(36, 'DYMATIZE SUPER MASS GAINER, 12 LBS (5,4 KG)', '1290000', 'Super Mass Gainer là một công thức tập trung cao. Thành phần Protein giàu Glutamine cung cấp cho bạn 1 hàm lượng Amino cao giúp phục hồi nhanh chóng và tăng trưởng tối đa. Chúng tôi sử dụng công nghệ Zytrix bao gồm 1 công thức tiêu hóa cho phép bạn hấp thu lượng Calo tối đa và Protein cao nhất mà không bị suy thoái tiêu hóa.', 10, 'uploads/rich_chocolate_12lb__2__26b25d957a94471ea4eb329c94c524c9_master.jpg', 7),
(37, 'BPI BULK MUSCLE XL 15 LBS (6.8 KG)', '1500000', 'Bulk Muscle XL là một dòng tối ưu về phát triển cơ bắp cụ thể là phần cơ nạc. Với sản phẩm Bulk Muscle XL của BPI Sports sẽ cung cấp cho bạn lượng Protein, chất béo và Carbs phù hợp và cần thiết để có thể xây dựng cơ bắp một cách rắn chắc. Công thức cải tiến của BPI Sports cũng có các Axit Amin thiết yếu giúp bạn hỗ trợ tăng cường và phục hồi cơ bắp. Cho phép bạn có một buổi tập luyện cường độ cao và mạnh mẽ hơn ', 2, 'uploads/vanilla__1__22cce538970247208bb3de1d7473c0a4_master.jpg', 8),
(38, 'GÓI DÙNG 1 LẦN - MUTANT MASS XXXTREME 2500, 1 SERV', '30000', 'HIỆU QUẢ NHẤT - TIẾT KIỆM NHẤT - SỬ DỤNG NHẤT LÂU - UỐNG NGON NHẤT: Đó chính là Mutan Mass XXXTreme 2500, sữa tăng cân nhanh và hiệu quả nhất đến từ CANADA', 4, 'uploads/upload_3a7a2a9a108e4c3eac3f4ad22ab33a9e_master.jpg', 9),
(39, 'MUSCLETECH 100% PREMIUM MASS GAINER 12 LBS ( 5,44 ', '1500000', 'Premium Mass Gainer được biết đến với thương hiệu MUSCLETECH hàng đầu tại Mỹ về lĩnh vực thực phẩm bổ sung cao cấp dành cho vận đông viên thể hình và thể thao. Người ta thường nhắc đến Premium Mass Gainer theo đúng nghĩa của nó là dòng tăng cân thượng hạng. Bạn tập Gym chuyên nghiệp hay theo phong trào thì Premium Mass Gainer vẫn là sản phẩm không thể thiếu trong những giai đoạn nhất định của bạn.\r\n\r\n', 5, 'uploads/upload_926fcaacaf3549d7858991e68e51d4cd_master.jpg', 10),
(40, 'MUSCLETECH MASS TECH EXTREME 2000, 22LBS (10 KG)', '2500000', 'Siêu phẩm này còn cung cấp hơn 10g BCAAs và 10g Glutamine, giúp chống dị hóa, phục hồi và phát triển cơ bắp vượt trội. Tăng sức mạnh nhờ 10g Creatine, kích thích cơ bắp hấp thụ các chất dinh dưỡng để mau chóng tăng cân hiệu quả nhất. Phải nói rằng trong tất cả sản phẩm tăng cân trước đến nay.', 5, 'uploads/triple_chocolate_brownie__1__e951526113c248e1807256c59cb20d8f_master.jpg', 11),
(42, 'UNIVERSAL NUTRITION ANIMAL PAK, 44 PACKS', '1500000', 'Để nuôi dưỡng cơ bắp, chúng ta cần nhiều dinh dưỡng. Nhưng nếu chúng ta cần phát triển nhanh cơ bắp thì bạn cần một sự kết hợp dinh dưỡng đúng cách như: amino acids thiết yếu, carbs, vitamins, minerals và các Acids béo cần thiết (EFAs). Chỉ có Animal Pak cung cấp cho bạn những thứ bạn cần. Đó là lí do vì sao Animal Pak được bổ sung đầy đủ PAK, IGF colostrum, nucleotides, lipotropics, L-arginine, Protogen A, eleuthero ...Trong Animal Pak có chứa hơn 55 thành phần cơ bản với lượng thích hợp vào đúng thời điểm và mọi lúc.', 5, 'uploads/upload_8eb7caca87df45a3b72da1c85f3ef5b1_master.jpg', 14),
(43, 'MUTANT MASS 15 LBS (6.8 KG)', '1500000', 'Sự tận tâm của những con người khó tính đã tạo nên một nét riêng của hãng thực phẩm bổ sung Mutant. Hãng Mutant Nutrition cam kết luôn mang đến những sản phẩm hàng đầu chất lượng nhất đồng thời cùng với những thành phần tốt nhất để chinh phục tất cả khách hàng. Kể cả những người khó tính nhất. ', 5, 'uploads/triple_chocolate_15lb_f3b9ee456d284fb4b95d164640d38259_master.jpg', 12),
(44, 'ON OPTI-MEN MULTIVITAMIN, 150 TABLETS', '1000000', 'Mỗi serving bao gồm những Axit Amin dạng tự do, Vitamin chống oxy hóa, khoáng chất thiết yếu và được chiết xuất từ thực vật với số lượng cơ bản có thể được xây dựng thông qua việc tiêu thụ một chế độ ăn uống cân bằng lành mạnh. Bạn hãy cứ đơn giản nghĩ là Opti-Men như một bảo hiểm dinh dưỡng cho lối sống lành mạnh của bạn.', 5, 'uploads/on-opti-men-240-tablets-94442d90-16e2-49f9-a3be-45951dd81bfa.jpg', 15),
(45, 'RSP NUTRITION BIOVITE MULTI-VITAMIN', '1000000', 'Sự kết hợp của các vitamin và khoáng chất quan trọng cùng với hỗn hợp Đỏ và Xanh phức tạp có trong RSP BioVite cung cấp một danh sách đặc biệt về lợi ích sức khỏe bao gồm hỗ trợ hệ thống miễn dịch, hoạt động chống oxy hóa, tăng cường phục hồi cơ bắp, tiêu hóa khỏe mạnh và cũng làm cho nó hiệu quả nguồn năng lượng tự nhiên', 5, 'uploads/upload_f8b9bf0005f14dc4aadea5f1a5da7a6a_master.jpg', 16),
(46, 'MUSCLETECH PLATINUM MULTIVITAMIN, 90 TABLETS', '500000', 'Platinum MultiVitamin là một loại vitamin tổng hợp hàng ngày được điều chế để hỗ trợ nhu cầu dinh dưỡng của lối sống lành mạnh và năng động. Huấn luyện viên cường độ cao có thể mất các vitamin và khoáng chất quan trọng từ đào tạo. Platinum MultiVitamin cung cấp các vi chất dinh dưỡng quan trọng nhất để hỗ trợ sức khỏe tổng thể và hiệu suất thể thao. Điều này bao gồm vitamin A, C, D, E và B, cộng với các enzyme tiêu hóa và Axit Amin chính. Đó là một công thức thực sự hoàn chỉnh cho các vận động viên chăm chỉ.', 5, 'uploads/upload_fdb8ec8477b643bf843d879a644191e8_master.jpg', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_giohang`
--

CREATE TABLE `sp_giohang` (
  `id` int(11) NOT NULL,
  `giohang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sp_giohang`
--

INSERT INTO `sp_giohang` (`id`, `giohang_id`, `sanpham_id`, `soluong`, `gia`, `created_time`, `last_updated`) VALUES
(50, 38, 36, 3, 1290000, 1634292612, 1634292612),
(51, 38, 37, 1, 1500000, 1634292612, 1634292612),
(52, 39, 36, 6, 1290000, 1634292676, 1634292676),
(53, 40, 37, 4, 1500000, 1634372722, 1634372722);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_kho`
--

CREATE TABLE `sp_kho` (
  `id` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `gia_mua` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `id_msp` int(11) NOT NULL,
  `thongtin` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_kho`
--

INSERT INTO `sp_kho` (`id`, `ten_sp`, `id_ncc`, `gia_mua`, `gia_ban`, `soluong`, `img`, `id_msp`, `thongtin`) VALUES
(7, 'aaaaaaaaaaaaa', 5, 1000000, 1290000, 81, 'uploads/rich_chocolate_12lb__2__26b25d957a94471ea4eb329c94c524c9_master.jpg', 1, 'Super Mass Gainer là một công thức tập trung cao. Thành phần Protein giàu Glutamine cung cấp cho bạn 1 hàm lượng Amino cao giúp phục hồi nhanh chóng và tăng trưởng tối đa. Chúng tôi sử dụng công nghệ Zytrix bao gồm 1 công thức tiêu hóa cho phép bạn hấp thu lượng Calo tối đa và Protein cao nhất mà không bị suy thoái tiêu hóa.'),
(8, 'BPI BULK MUSCLE XL 15 LBS (6.8 KG)', 5, 1000000, 1500000, 90, 'uploads/vanilla__1__22cce538970247208bb3de1d7473c0a4_master.jpg', 1, 'Bulk Muscle XL là một dòng tối ưu về phát triển cơ bắp cụ thể là phần cơ nạc. Với sản phẩm Bulk Muscle XL của BPI Sports sẽ cung cấp cho bạn lượng Protein, chất béo và Carbs phù hợp và cần thiết để có thể xây dựng cơ bắp một cách rắn chắc. Công thức cải tiến của BPI Sports cũng có các Axit Amin thiết yếu giúp bạn hỗ trợ tăng cường và phục hồi cơ bắp. Cho phép bạn có một buổi tập luyện cường độ cao và mạnh mẽ hơn '),
(9, 'GÓI DÙNG 1 LẦN - MUTANT MASS XXXTREME 2500, 1 SERV', 5, 15000, 30000, 495, 'uploads/upload_3a7a2a9a108e4c3eac3f4ad22ab33a9e_master.jpg', 1, 'HIỆU QUẢ NHẤT - TIẾT KIỆM NHẤT - SỬ DỤNG NHẤT LÂU - UỐNG NGON NHẤT: Đó chính là Mutan Mass XXXTreme 2500, sữa tăng cân nhanh và hiệu quả nhất đến từ CANADA'),
(10, 'MUSCLETECH 100% PREMIUM MASS GAINER 12 LBS ( 5,44 ', 5, 1300000, 1500000, 95, 'uploads/upload_926fcaacaf3549d7858991e68e51d4cd_master.jpg', 1, 'Premium Mass Gainer được biết đến với thương hiệu MUSCLETECH hàng đầu tại Mỹ về lĩnh vực thực phẩm bổ sung cao cấp dành cho vận đông viên thể hình và thể thao. Người ta thường nhắc đến Premium Mass Gainer theo đúng nghĩa của nó là dòng tăng cân thượng hạng. Bạn tập Gym chuyên nghiệp hay theo phong trào thì Premium Mass Gainer vẫn là sản phẩm không thể thiếu trong những giai đoạn nhất định của bạn.\r\n\r\n'),
(11, 'MUSCLETECH MASS TECH EXTREME 2000, 22LBS (10 KG)', 5, 2000000, 2500000, 95, 'uploads/triple_chocolate_brownie__1__e951526113c248e1807256c59cb20d8f_master.jpg', 1, 'Siêu phẩm này còn cung cấp hơn 10g BCAAs và 10g Glutamine, giúp chống dị hóa, phục hồi và phát triển cơ bắp vượt trội. Tăng sức mạnh nhờ 10g Creatine, kích thích cơ bắp hấp thụ các chất dinh dưỡng để mau chóng tăng cân hiệu quả nhất. Phải nói rằng trong tất cả sản phẩm tăng cân trước đến nay.'),
(12, 'MUTANT MASS 15 LBS (6.8 KG)', 5, 1000000, 1500000, 195, 'uploads/triple_chocolate_15lb_f3b9ee456d284fb4b95d164640d38259_master.jpg', 1, 'Sự tận tâm của những con người khó tính đã tạo nên một nét riêng của hãng thực phẩm bổ sung Mutant. Hãng Mutant Nutrition cam kết luôn mang đến những sản phẩm hàng đầu chất lượng nhất đồng thời cùng với những thành phần tốt nhất để chinh phục tất cả khách hàng. Kể cả những người khó tính nhất. '),
(13, 'BRONSON VITAMIN K2 MK-7 + VITAMIN D3, 120 CAPSULES', 6, 450000, 700000, 95, 'uploads/upload_0fccd58bd85a4654b1f50392f4b0ffb8_master.jpg', 2, 'Vitamin D (cụ thể là D3, dạng Vit D bạn nhận được từ ánh nắng mặt trời) rất cần thiết để hấp thụ canxi đúng cách mà chúng ta đều biết là rất quan trọng khi chúng ta già đi. Không có Vitamin D3, bạn có thể bỏ lỡ những lợi ích từ canxi trong chế độ ăn uống của bạn. Hầu hết mọi người bắt đầu dùng Vitamin D3 sau khi họ gặp phải dấu hiệu thiếu hụt.'),
(14, 'UNIVERSAL NUTRITION ANIMAL PAK, 44 PACKS', 5, 1000000, 1500000, 95, 'uploads/upload_8eb7caca87df45a3b72da1c85f3ef5b1_master.jpg', 2, 'Để nuôi dưỡng cơ bắp, chúng ta cần nhiều dinh dưỡng. Nhưng nếu chúng ta cần phát triển nhanh cơ bắp thì bạn cần một sự kết hợp dinh dưỡng đúng cách như: amino acids thiết yếu, carbs, vitamins, minerals và các Acids béo cần thiết (EFAs). Chỉ có Animal Pak cung cấp cho bạn những thứ bạn cần. Đó là lí do vì sao Animal Pak được bổ sung đầy đủ PAK, IGF colostrum, nucleotides, lipotropics, L-arginine, Protogen A, eleuthero ...Trong Animal Pak có chứa hơn 55 thành phần cơ bản với lượng thích hợp vào đúng thời điểm và mọi lúc.'),
(15, 'ON OPTI-MEN MULTIVITAMIN, 150 TABLETS', 5, 700000, 1000000, 95, 'uploads/on-opti-men-240-tablets-94442d90-16e2-49f9-a3be-45951dd81bfa.jpg', 2, 'Mỗi serving bao gồm những Axit Amin dạng tự do, Vitamin chống oxy hóa, khoáng chất thiết yếu và được chiết xuất từ thực vật với số lượng cơ bản có thể được xây dựng thông qua việc tiêu thụ một chế độ ăn uống cân bằng lành mạnh. Bạn hãy cứ đơn giản nghĩ là Opti-Men như một bảo hiểm dinh dưỡng cho lối sống lành mạnh của bạn.'),
(16, 'RSP NUTRITION BIOVITE MULTI-VITAMIN', 5, 700000, 1000000, 95, 'uploads/upload_f8b9bf0005f14dc4aadea5f1a5da7a6a_master.jpg', 2, 'Sự kết hợp của các vitamin và khoáng chất quan trọng cùng với hỗn hợp Đỏ và Xanh phức tạp có trong RSP BioVite cung cấp một danh sách đặc biệt về lợi ích sức khỏe bao gồm hỗ trợ hệ thống miễn dịch, hoạt động chống oxy hóa, tăng cường phục hồi cơ bắp, tiêu hóa khỏe mạnh và cũng làm cho nó hiệu quả nguồn năng lượng tự nhiên'),
(17, 'MUSCLETECH PLATINUM MULTIVITAMIN, 90 TABLETS', 5, 350000, 500000, 95, 'uploads/upload_fdb8ec8477b643bf843d879a644191e8_master.jpg', 2, 'Platinum MultiVitamin là một loại vitamin tổng hợp hàng ngày được điều chế để hỗ trợ nhu cầu dinh dưỡng của lối sống lành mạnh và năng động. Huấn luyện viên cường độ cao có thể mất các vitamin và khoáng chất quan trọng từ đào tạo. Platinum MultiVitamin cung cấp các vi chất dinh dưỡng quan trọng nhất để hỗ trợ sức khỏe tổng thể và hiệu suất thể thao. Điều này bao gồm vitamin A, C, D, E và B, cộng với các enzyme tiêu hóa và Axit Amin chính. Đó là một công thức thực sự hoàn chỉnh cho các vận động viên chăm chỉ.'),
(18, 'APPLIED NUTRITION MULTI-VITAMIN COMPLEX, 90 TABLET', 5, 350000, 600000, 95, 'uploads/upload_23ec9786d4ec4afe84c3da2dd483b4f9_master.jpg', 2, 'Được thiết kế với tiêu chuẩn cao, MULTIVITAMIN COMPLEX là một công thức khoa học cung cấp 100% vitamin cần thiết và các thành phần thiết yếu mỗi ngày. Bổ sung nguồn Vitamins có thể giúp đảm bảo đáp ứng nhu cầu vi chất dinh dưỡng cao của bạn và cơ thể của bạn có thể liên tục hoạt động ở mức tối ưu. Các nghiên cứu cho thấy rằng điều này đặc biệt quan trọng đối với các vận động viên và những người hướng tới lối sống năng động và tích cực.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `trang_thai` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'đang tập',
  `taikhoan` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Img` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL DEFAULT 0,
  `date_start` int(50) NOT NULL,
  `term` int(11) NOT NULL,
  `date_end` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `sdt`, `ngaysinh`, `trang_thai`, `taikhoan`, `password`, `Img`, `diachi`, `gioitinh`, `date_start`, `term`, `date_end`) VALUES
(6, 'Nguyễn Văn F', 22023, '2020-12-28', 'Còn hạn', 'fnguyen', '202cb962ac59075b964b07152d234b70', 'uploads/anh_null.jpeg', 'Hà Nội', 0, 1609280013, 371, 1641334413),
(7, 'Nguyễn Văn A', 7841, '2021-05-31', 'Hết hạn', 'anguyen', '202cb962ac59075b964b07152d234b70', 'uploads/anh_null.jpeg', 'Hà Nội', 0, 1624894610, 30, 1627486610),
(8, 'Nguyễn Văn B', 784144, '2021-09-27', 'Còn hạn', 'bnguyen', '202cb962ac59075b964b07152d234b70', 'uploads/anh_null.jpeg', 'Hà Nội3', 0, 1634378922, 6, 1634897322);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_noibo`
--

CREATE TABLE `user_noibo` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` tinyint(10) NOT NULL DEFAULT 0,
  `Img` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_noibo`
--

INSERT INTO `user_noibo` (`id`, `name`, `sdt`, `email`, `ngaysinh`, `gioitinh`, `Img`, `diachi`, `taikhoan`, `password`, `ma_nhom`, `thongtin`) VALUES
(6, 'Nguyễn Công Toàn', 474741, 'toannguyen@gmail.com', '2020-11-30', 0, 'uploads/Nguyen-Cong-Toan.jpg', 'Hà Nội', 'toannguyen', '202cb962ac59075b964b07152d234b70', 'nb_ql_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(27, 'Bùi Xuân Mạnh', 5563789, 'manhbui@gmail.com', '2020-11-30', 0, 'uploads/Bui-Xuan-Manh.jpg', 'Hà Nội', 'manhbui', '202cb962ac59075b964b07152d234b70', 'nb_ql_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(28, 'Nguyễn Duy Thanh', 888888, 'thanhnguyen@gmail.com', '2000-07-13', 0, 'uploads/anh_null.jpeg', 'Hà Nội', 'admin', '202cb962ac59075b964b07152d234b70', 'nb_ad', ''),
(31, 'Nguyễn Thiên Đông', 1478520, 'dongnguyen@gmail.com', '2020-12-28', 0, 'uploads/Nguyen-Thien-Dong.jpg', 'Hà Nội', 'dongnguyen', '202cb962ac59075b964b07152d234b70', 'nb_ql_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(32, 'Bùi Sơn Bảo', 12, 'baobui@gmail.com', '2020-12-28', 0, 'uploads/Bui-Xuan-Bao.jpg', 'Nam Định', 'baobui', '202cb962ac59075b964b07152d234b70', 'nb_ql_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(33, 'Trần Trung Hiếu', 13, 'hieutran@gmail.com', '2020-12-28', 0, 'uploads/Tran-Trung-Hieu.jpg', 'Hà Nội', 'hieutran', '202cb962ac59075b964b07152d234b70', 'nb_ql_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(35, 'Lê Trung Hoàng Hiệp', 15, 'hieple@gmail.com', '2020-12-28', 0, 'uploads/Le-Trung-Hoang-Hiep.jpg', 'Hà Nội', 'hieple', '202cb962ac59075b964b07152d234b70', 'nb_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(36, 'Hoàng Mạnh Thắng', 16, 'thanghoang@gmail.com', '2020-12-28', 0, 'uploads/Hoang-Manh-Thang.jpg', 'Hà Nội', 'thanghoang', '202cb962ac59075b964b07152d234b70', 'nb_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(37, 'Nguyễn Quốc Toàn', 17, 'toannguyenquoc@gmail.com', '2020-12-28', 0, 'uploads/Nguyen-Quoc-Toan.jpg', 'Hà Nội', 'toannguyenquoc', '202cb962ac59075b964b07152d234b70', 'nb_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(38, 'Trần Minh Trang', 18, 'trangtran@gmail.com', '2020-12-28', 0, 'uploads/Tran-Minh-Trang.jpg', 'Hà Nội', 'trangtran', '202cb962ac59075b964b07152d234b70', 'nb_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(39, 'Lê Ngọc Anh', 19, 'anhle@gmail.com', '2020-12-28', 1, 'uploads/Le-Ngoc-Anh.jpg', 'Hà Nội', 'anhle', '202cb962ac59075b964b07152d234b70', 'nb_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(40, 'Trần Quang Sơn', 20, 'sontran@gmail.com', '2020-12-28', 0, 'uploads/tran-quang-son.jpg', 'Hà Nội', 'sontran', '202cb962ac59075b964b07152d234b70', 'nb_ql_hlv', 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ\r\n<br>\r\n<br>\r\nHơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao\r\n<br>\r\n<br>\r\nGặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.'),
(64, ' Nguyễn Văn Long', 78410, 'longcvx@gmail.com', '2021-09-27', 1, 'uploads/anh_null.jpeg', 'Hà Nội', 'lnguyen', '202cb962ac59075b964b07152d234b70', 'nb_nv', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_bt` (`ma_bt`),
  ADD KEY `fk_nhom_bt` (`ma_nhom`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pn` (`id_phieunhap`);

--
-- Chỉ mục cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_kho` (`id_sp_kho`),
  ADD KEY `fk_phx` (`id_phieuxuat`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`ma_nhom`);

--
-- Chỉ mục cho bảng `nhom_bt`
--
ALTER TABLE `nhom_bt`
  ADD PRIMARY KEY (`ma_nhom`);

--
-- Chỉ mục cho bảng `nhom_sp_kho`
--
ALTER TABLE `nhom_sp_kho`
  ADD PRIMARY KEY (`id_nhom`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ph2` (`id_user_noibo`),
  ADD KEY `fk_ph3` (`id_ncc`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_unb` (`id_user_noibo`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_dc` (`name`),
  ADD KEY `fk_sp_kho1` (`id_sp_kho`);

--
-- Chỉ mục cho bảng `sp_giohang`
--
ALTER TABLE `sp_giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gh` (`giohang_id`),
  ADD KEY `fk_sp_gh` (`sanpham_id`);

--
-- Chỉ mục cho bảng `sp_kho`
--
ALTER TABLE `sp_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ncc` (`id_ncc`),
  ADD KEY `fk_mnsp` (`id_msp`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_sdt` (`sdt`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `user_noibo`
--
ALTER TABLE `user_noibo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_sdt` (`sdt`),
  ADD UNIQUE KEY `uq_email` (`email`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`),
  ADD KEY `fk_nhom_usernb` (`ma_nhom`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baitap`
--
ALTER TABLE `baitap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `ncc`
--
ALTER TABLE `ncc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhom_sp_kho`
--
ALTER TABLE `nhom_sp_kho`
  MODIFY `id_nhom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `sp_giohang`
--
ALTER TABLE `sp_giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `sp_kho`
--
ALTER TABLE `sp_kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user_noibo`
--
ALTER TABLE `user_noibo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD CONSTRAINT `fk_nhom_bt` FOREIGN KEY (`ma_nhom`) REFERENCES `nhom_bt` (`ma_nhom`);

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `fk_pn` FOREIGN KEY (`id_phieunhap`) REFERENCES `phieunhap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD CONSTRAINT `fk_phx` FOREIGN KEY (`id_phieuxuat`) REFERENCES `phieuxuat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sp_kho` FOREIGN KEY (`id_sp_kho`) REFERENCES `sp_kho` (`id`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `fk_ph2` FOREIGN KEY (`id_user_noibo`) REFERENCES `user_noibo` (`id`),
  ADD CONSTRAINT `fk_ph3` FOREIGN KEY (`id_ncc`) REFERENCES `ncc` (`id`);

--
-- Các ràng buộc cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `fk_unb` FOREIGN KEY (`id_user_noibo`) REFERENCES `user_noibo` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_kho1` FOREIGN KEY (`id_sp_kho`) REFERENCES `sp_kho` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sp_giohang`
--
ALTER TABLE `sp_giohang`
  ADD CONSTRAINT `fk_gh` FOREIGN KEY (`giohang_id`) REFERENCES `giohang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sp_gh` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sp_kho`
--
ALTER TABLE `sp_kho`
  ADD CONSTRAINT `fk_mnsp` FOREIGN KEY (`id_msp`) REFERENCES `nhom_sp_kho` (`id_nhom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ncc` FOREIGN KEY (`id_ncc`) REFERENCES `ncc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `user_noibo`
--
ALTER TABLE `user_noibo`
  ADD CONSTRAINT `fk_nhom_usernb` FOREIGN KEY (`ma_nhom`) REFERENCES `nhom` (`ma_nhom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
