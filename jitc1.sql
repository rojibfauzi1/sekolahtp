-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2016 at 07:54 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jitc1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `gambar`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin', 'admin.jpg'),
(2, 'guru', '77e69c137812518e359196bb2f5e9bb9', 'guru@guru', 'guru.jpg'),
(3, 'rojib', '0bd9897bf12294ce35fdc0e21065c8a7', 'rojib@fauzi', 'rojib.jpg'),
(4, 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7', 'fauzi@gadsa.com', 'fauzi.jpg'),
(5, 'dada', 'b01abf84324066bdb4eed4d5bf20f887', 'dada@gmail.com', '5-dada.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(5) NOT NULL,
  `jdl_album` varchar(100) NOT NULL,
  `album_seo` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `tanggal`) VALUES
(2, 'kenangan', 'joss tenan', '2016-04-28'),
(3, 'mari mari', 'mantav', '2016-04-28'),
(4, 'SMA', 'keren', '2016-05-02'),
(5, 'COBA LAGI', 'DSADSA', '2016-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `jam` time NOT NULL,
  `pengirim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `judul_seo`, `isi_berita`, `gambar`, `tgl_posting`, `jam`, `pengirim`) VALUES
(3, 1, 'gaga', '', '<p>gatau</p>\r\n', '3-gaga.jpg', '2016-05-07 08:02:19', '08:02:19', ''),
(5, 1, 'mau mau', '', 'cbsdjhbsahdbhajs', '5.jpg', '1970-01-01 00:00:00', '838:59:59', ''),
(6, 6, 'coba lagi', '', 'sandjknsajkdas', '6.jpg', '1970-01-01 00:00:00', '00:00:00', ''),
(7, 1, 'gagageuwaheuawk', '', 'nyoba', '7.jpg', '1970-01-01 00:00:00', '00:00:00', ''),
(8, 1, 'fdsfsd', '', 'snfksdfsd', '8.jpg', '1970-01-01 00:00:00', '00:00:00', ''),
(9, 1, 'fefe', '', 'dsadasda', '9-fefe.jpg', '2016-04-30 00:00:00', '01:36:04', ''),
(10, 3, 'sawah', '', 'Bercocok tanam', '10.jpg', '2016-04-28 00:00:00', '00:00:00', ''),
(11, 1, 'wow bgt', '', 'dsadsadasda', '11-wow-bgt.jpg', '2016-05-01 00:00:00', '12:41:06', ''),
(12, 1, 'coba lagi yoiiii', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-coba-lagi-yoiiii.jpg', '2016-05-01 13:52:06', '01:52:06', ''),
(13, 5, 'mauuu lagi', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '13-mauuu-lagi.jpg', '2016-05-01 13:47:16', '01:47:16', ''),
(14, 3, 'nyoba lagi wow', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '14-nyoba-lagi-wow.jpg', '2016-05-02 04:32:43', '04:32:43', ''),
(15, 6, 'gahaiyat', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-gahaiyat.jpg', '2016-05-02 04:34:58', '04:34:58', ''),
(16, 1, 'aloy', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '16-aloy.jpg', '2016-05-02 04:37:00', '04:37:00', ''),
(17, 1, 'juminten', '', 'fasfdsfds', '17-juminten.jpg', '2016-05-02 05:12:41', '05:12:41', ''),
(18, 1, 'waaaha', '', 'sadsada', '18-waaaha.jpg', '2016-05-02 05:14:40', '05:14:40', ''),
(19, 1, 'hahahha', '', 'yoiii', '19-hahahha.jpg', '2016-05-02 05:16:15', '05:16:15', ''),
(20, 1, 'io', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '20-io.jpg', '2016-05-02 05:35:15', '05:35:15', ''),
(21, 1, '', '', '', '21-.jpg', '2016-05-11 06:11:42', '06:11:42', ''),
(22, 3, 'huuhuhuhu', '', '<p>dsadsadsadsa</p>\r\n', '22-huuhuhuhu.jpg', '2016-05-11 06:42:46', '06:42:46', ''),
(23, 5, 'wrqeqreqwe', '', '<p>ewqewqewq</p>\r\n', '23-wrqeqreqwe.jpg', '2016-05-11 06:43:51', '06:43:51', ''),
(24, 6, 'rterewtre', '', '<p>frewfwerfre</p>\r\n', '24-rterewtre.jpg', '2016-05-11 06:44:40', '06:44:40', ''),
(25, 4, 'rwerewrew', '', '<p>dwqdwqdqw</p>\r\n', '25-rwerewrew.jpg', '2016-05-11 06:45:14', '06:45:14', ''),
(26, 4, 'rwerewrew', '', '<p>dwqdwqdqw</p>\r\n', '25-rwerewrew.jpg', '2016-05-11 06:48:23', '06:48:23', ''),
(27, 4, 'rwerewrew', '', '<p>dwqdwqdqw</p>\r\n', '25-rwerewrew.jpg', '2016-05-11 06:48:44', '06:48:44', ''),
(28, 2, 'fdsfdsfsd', '', '<p>dqwdwqdwqdwq</p>\r\n', '28-fdsfdsfsd.jpg', '2016-05-11 06:50:54', '06:50:54', ''),
(29, 1, 'rewrewrew', '', '<p>dasdsadsax</p>\r\n', '29-rewrewrew.jpg', '2016-05-11 06:52:30', '06:52:30', ''),
(30, 13, 'dsadsadsa', '', '<p>sadsadasds</p>\r\n', '29-dsadsadsa.jpg', '2016-05-11 06:52:51', '06:52:51', ''),
(31, 6, 'haha coba', '', '<p>dasdsadasdas</p>\r\n', '31-haha-coba.jpg', '2016-05-11 10:57:27', '10:57:27', ''),
(32, 1, 'kok', '', '<p>okolololllkhkhkhkhkhkhhkhkhk</p>\r\n', '32-kok.jpg', '2016-05-14 06:58:10', '06:58:10', ''),
(33, 1, 'lolipop', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '33-lolipop.jpg', '2016-05-18 07:26:11', '07:26:11', 'admin'),
(34, 12, 'coba edit rojib', '', '<p>bbsadjnsajdnjkasn djkx csajk dsald,sals\\\\</p>\r\n\r\n<p>dsadsadsadsa</p>\r\n', '34-coba-edit-rojib.jpg', '2016-05-16 11:17:19', '11:17:19', 'rojib'),
(35, 3, 'lagi deh', '', '<p>dsmamndmsannmdnas dnas</p>\r\n\r\n<p>dsadksamdksmakld</p>\r\n', '35-lagi-deh.jpg', '2016-05-16 11:14:00', '11:14:00', 'admin'),
(36, 1, 'rere', '', '<p>sadasdsadsamxkjsnajkxas</p>\r\n', '36-rere.jpg', '2016-05-18 07:25:16', '07:25:16', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(5) NOT NULL,
  `id_album` int(5) NOT NULL,
  `judul_gallery` varchar(100) NOT NULL,
  `gallery_seo` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_gallery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `judul_gallery`, `gallery_seo`, `keterangan`, `gambar_gallery`) VALUES
(1, 2, 'masa SMA', 'masa SMA', 'dsadsadasdas', '1.jpg'),
(2, 2, 'bermain', 'bermain', 'fdfsdfsdfsd', '2.jpg'),
(3, 3, 'nyantai', 'nyantai', 'ddaggadgas', '3.jpg'),
(4, 2, 'coba', 'coba', 'dsadas', '4.jpg'),
(6, 2, 'percobaan', 'percobaan', 'yapss', '6-percobaan.jpg'),
(7, 2, 'hehe', 'hehe', 'lagi coba', '7-hehe.jpg'),
(8, 2, 'rarrara', 'rarrara', 'yoiii', '8-rarrara.jpg'),
(9, 3, 'yoyo', 'yoyo', 'hbbjkhnjninubgbtvftvft', '9-yoyo.jpg'),
(10, 3, 'lagi lagi', 'lagi lagi', 'yes yes', '10-lagi-lagi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi2'),
(2, 'Pendidikan'),
(3, 'Pertanian'),
(4, 'Perkebunan'),
(5, 'Perkebunan'),
(6, 'Guru'),
(7, 'Guru'),
(12, 'Kesehatan'),
(13, 'duduk'),
(14, 'haji'),
(15, 'percobaan11'),
(16, 'yoyo'),
(17, 'perhutanan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(5) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(2, '10 C'),
(3, '10 A'),
(4, '11 B'),
(5, '13');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_kelas`, `id_siswa`) VALUES
(4, 4, 9),
(8, 2, 7),
(9, 4, 8),
(10, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_matapelajaran` int(5) NOT NULL,
  `matapelajaran` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_matapelajaran`, `matapelajaran`, `keterangan`) VALUES
(3, 'IPA ku', 'alam'),
(5, 'Matematika', 'hitung hitungan'),
(6, 'IPS', 'social');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_file` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_matapelajaran` int(5) NOT NULL,
  `file_materi` varchar(100) NOT NULL,
  `tgl_posting` date NOT NULL,
  `id_guru` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_file`, `judul`, `id_kelas`, `id_matapelajaran`, `file_materi`, `tgl_posting`, `id_guru`) VALUES
(2, 'Biologis Fundamentals', 4, 5, 'sadsadsa', '2016-04-06', 6),
(3, 'hahaha', 4, 5, '3.pdf', '2016-04-30', 5),
(4, 'fafsaf', 2, 3, '20160307_20150304_2.KecerdasanBuatan.ppt', '2016-05-14', 4),
(5, 'dawq', 2, 6, '20160307_Top5PROJECTPLANNINGPHASE.ppt', '2016-05-15', 9),
(6, 'sulit', 4, 5, '20160307_20150304_2.KecerdasanBuatan-(1).ppt', '2016-05-18', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(5) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `email` varchar(100) NOT NULL,
  `No_HP` varchar(25) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nip`, `nama_guru`, `jenis_kelamin`, `email`, `No_HP`, `tempat_lahir`, `tgl_lahir`, `agama`, `jabatan`, `alamat`, `password`, `gambar`) VALUES
(4, '3443243', 'papa', 'laki-laki', 'sadas@fdsa.com', '0', 'sfdsfsd', '2016-04-08', 'dsadasd', 'dsadasd', 'asdasdas', '77e69c137812518e359196bb2f5e9bb9', ''),
(5, '4324324324', 'Rika Widianingsihaing putra', 'perempuan', 'black_rasta66@yahoo.com', '081802748877', 'jogja', '2016-04-16', 'islam', 'kepala', 'fasdasdsada', '77e69c137812518e359196bb2f5e9bb9', '4324324324-Rika-Widianingsihaing-putra.jpg'),
(6, '32132132', 'wakijo', 'laki-laki', 'rojib@fauzi', '081832133213', 'jogja', '2016-04-08', 'islam', 'ceo', 'sdsadasdas', '77e69c137812518e359196bb2f5e9bb9', '32132132-wakijo.jpg'),
(7, '4325234', 'fafafsad', 'perempuan', 'dwqdwq@fdsfd.com', '432321321', 'rewrewrdew', '2016-05-05', 'efewfew', 'fewfewf', 'ewfewfwe', '', ''),
(8, '3213213254', 'arnete', 'perempuan', 'black_rasta66@yahoo.com', '2147483647', 'dsadwefew', '2016-05-25', 'fewfew', 'fwefewf', 'fewfew', '', ''),
(9, '7777777', 'tumini', 'perempuan', 'rojib@fauzi', '089123432521', 'rere', '2016-05-28', 'ewqewqe', 'vcxvcxv', 'vdfsvdvfd', '77e69c137812518e359196bb2f5e9bb9', '7777777-tumini.jpg'),
(10, '3333333333', 'yuyn', 'perempuan', 'ruruwuq@dhsjaidas.com', '081802748877', 'jogja', '2016-05-25', 'dsadas', 'ewqewq', 'sadsadas', '49d02d55ad10973b7b9d0dc9eba7fdf0', '3333333333-yuyn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar_mapel`
--

CREATE TABLE `pengajar_mapel` (
  `id_pengajarmapel` int(5) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `id_sarana` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar_mapel`
--

INSERT INTO `pengajar_mapel` (`id_pengajarmapel`, `id_pengajar`, `id_mapel`, `id_sarana`) VALUES
(1, 5, 5, 1),
(2, 5, 3, 1),
(3, 6, 5, 1),
(4, 4, 3, 1),
(5, 9, 6, 1),
(7, 9, 3, 1),
(8, 6, 3, 1),
(9, 10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `jam` time NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `pengirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tema`, `isi`, `tempat`, `jam`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `pengirim`) VALUES
(1, 'Lebaran H-1', 'sebelum lebaran', 'sekolah lagiii', '07:31:00', '2016-04-13', '2016-04-15', '2016-05-15 00:00:00', 'admin'),
(2, '', 'mantav', 'di kali', '02:32:00', '2016-04-09', '2016-04-22', '0000-00-00 00:00:00', 'manu'),
(3, 'dasdsa', 'dsadasd', 'dasdasdas', '03:24:00', '2016-04-21', '2016-04-30', '0000-00-00 00:00:00', 'dasdasdsa'),
(4, 'dasdsa', 'dsadasdas', 'dasdasda', '00:00:00', '2016-04-27', '2016-04-16', '0000-00-00 00:00:00', 'fdsfdsfds'),
(5, 'dasdsad', 'sadsadsad', 'sadasdas', '04:04:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', ''),
(6, 'dsadsad', 'sadsadsa', '', '03:04:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', ''),
(7, 'dsadasdas', 'dasdasdasd', 'sadsadsa', '04:04:00', '2016-04-15', '2016-04-30', '0000-00-00 00:00:00', 'efwfewfew'),
(8, 'coba', 'dasdasdas', 'dsadsadas', '03:21:00', '2016-04-21', '2016-04-30', '0000-00-00 00:00:00', 'sadasdsad'),
(9, 'jajal meneh', 'sdadas', 'dsadas', '00:00:17', '0000-00-00', '0000-00-00', '2016-05-01 00:00:00', 'sdadas'),
(12, 'meneh', 'dsadas', 'dsadasd', '01:00:00', '2016-05-19', '2016-06-01', '2016-05-01 00:00:00', 'dsadasdas'),
(13, 'fafa', 'dasdsa', 'dasdsa', '01:00:00', '2016-05-26', '2016-05-28', '2016-05-01 00:00:00', 'trytrytr'),
(14, 'trate', 'fafda', '', '01:00:00', '1970-01-01', '1970-01-01', '2016-05-01 00:00:00', ''),
(15, 'gaga', '', '', '01:00:00', '1970-01-01', '1970-01-01', '2016-05-01 00:00:00', ''),
(16, 'rarar', 'dsads', '', '01:00:00', '1970-01-01', '1970-01-01', '2016-05-01 00:00:00', ''),
(17, 'gasaga', 'dasdsa', 'dewqewqew', '01:00:00', '2016-05-28', '2016-05-25', '2016-05-04 00:00:00', 'sadsajion'),
(18, 'hihihihihi', 'dsadsadsa', 'sadwqdqwewq', '00:00:12', '2016-05-27', '2016-05-28', '2016-05-04 00:00:00', 'fwefrfrefr'),
(19, 'yoiu mamen', 'dsadsadas', 'dsadsasa', '00:00:07', '2016-05-26', '2016-05-28', '2016-05-05 00:00:00', 'dsadsadas'),
(20, 'guyu', 'fdsfds', 'fdsfdsfds', '03:07:22', '2016-05-05', '2016-05-26', '2016-05-05 00:00:00', 'fdsfdsfsd'),
(21, 'lll', 'jikkjj', 'kjjkj', '08:08:00', '2016-05-05', '2016-05-05', '2016-05-14 00:00:00', 'kokko'),
(22, 'youuu', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\n&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\n&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\n&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\n&nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\n&nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'rara', '13:05:00', '2016-05-28', '2016-05-31', '2016-05-15 00:00:00', 'hehe'),
(23, 'coba ahhhh', '<p>csaxsaxsa</p>\r\n', 'safdswe', '15:03:00', '2016-05-24', '2016-05-26', '2016-05-15 00:00:00', 'admin'),
(24, 'jalan-jalan', '<p>dasdasdaskmdksamdkas</p>\r\n', 'fafa', '04:03:00', '2016-05-27', '2016-05-28', '2016-05-18 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sarana_sekolah`
--

CREATE TABLE `sarana_sekolah` (
  `id_sarana` int(5) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `nama_sarana` varchar(50) NOT NULL,
  `fungsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarana_sekolah`
--

INSERT INTO `sarana_sekolah` (`id_sarana`, `jumlah`, `keterangan`, `id_pengajar`, `nama_sarana`, `fungsi`) VALUES
(1, 324, 'haha', 4, 'dsadsa', 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(5) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`) VALUES
(7, '43243324', 'rere', 'perempuan', 'saas', '2016-05-12', 'eqwewqewqeqw', 'dasdasdas'),
(8, '432432432', 'sasawa', 'laki-laki', 'ewqrewrwe', '2016-05-12', 'fsdfdsfsdfsd', 'fdsfsdsd'),
(9, '321321312', 'hoho', 'laki-laki', 'yiytuyt', '2016-05-26', 'islam', 'sadsad'),
(10, '432432432', 'gigiohog', 'laki-laki', 'dsadasdw', '2016-05-26', 'tretretytry', 'grefrefr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `id_album` (`id_album`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_matapelajaran` (`id_matapelajaran`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `pengajar_mapel`
--
ALTER TABLE `pengajar_mapel`
  ADD PRIMARY KEY (`id_pengajarmapel`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_sarana` (`id_sarana`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `sarana_sekolah`
--
ALTER TABLE `sarana_sekolah`
  ADD PRIMARY KEY (`id_sarana`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_matapelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_file` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pengajar_mapel`
--
ALTER TABLE `pengajar_mapel`
  MODIFY `id_pengajarmapel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sarana_sekolah`
--
ALTER TABLE `sarana_sekolah`
  MODIFY `id_sarana` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_4` FOREIGN KEY (`id_matapelajaran`) REFERENCES `mata_pelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_5` FOREIGN KEY (`id_guru`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajar_mapel`
--
ALTER TABLE `pengajar_mapel`
  ADD CONSTRAINT `pengajar_mapel_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajar_mapel_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajar_mapel_ibfk_3` FOREIGN KEY (`id_sarana`) REFERENCES `sarana_sekolah` (`id_sarana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sarana_sekolah`
--
ALTER TABLE `sarana_sekolah`
  ADD CONSTRAINT `sarana_sekolah_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
