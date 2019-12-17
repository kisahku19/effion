-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 08:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `grup` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `grup`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `domisili` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_lengkap`, `email`, `no_hp`, `domisili`, `username`, `password`, `gambar`) VALUES
(6, 'Aris Nandar', 'arisnan@yahoo.com', '083817289303', 'jakarta barat', 'aris', '288077f055be4fadc3804a69422dd4f8', 'aris.jpg'),
(7, 'saefullah', 'saeful@yahoo.co.id', '08124990291', 'petamburan', 'sae', 'dabfae3e14243f88c733376f4e6c1a37', 'saeful.jpg'),
(8, 'Muhammed Hilman', 'muhilman@gmail.com', '083863728912', 'tangerang selatan', 'hilman', 'cf081b11e184de45ecce347f758936f9', 'muhilman.jpg'),
(9, 'Rima Hadi Ismail', 'rimahadi@gmail.com', '087632992920', 'alam sutera', 'rimahadi', '9c721ec380e1cae09b1324e7b9768a49', 'rima.jpg'),
(11, 'dnl', 'dnl@yahoo.com', '086537728911', 'tangerang', 'dnl', 'acfab62edf7b27740d050315cbc326a4', 'yt2.png'),
(13, 'Victor Ardi', 'victorard@gmail.com', '081563728729', 'jakarta barat', 'victor', 'ffc150a160d37e92012c196b6af4160d', 'victor.jpg'),
(14, 'Mguntur', 'guntur23@gmail.com', '081736739029', 'tangerang selatan', 'guntur', '30d8692c0d2ac50d082f20cfc4648206', 'mguntur.jpg'),
(15, 'Aam Riyanto', 'riyantoam@gmail.com', '0878651928102', 'cipete', 'aam', '35c2d90f7c06b623fe763d0a4e5b7ed9', 'aam.jpg'),
(16, 'Djwiznu', 'djwiznu12@gmail.com', '0838647812992', 'jakarta barat', 'djwiznu', '362652d103f53d9c4facf8c600f9b42d', 'djwiznu.jpg'),
(17, 'Jr gelar', 'jrgelar8@gmail.com', '0878655218921', 'bintaro', 'jrgelar', 'd6109552201f124bc8a1f7ad960a7671', 'jrgelar.jpg'),
(18, 'Farrel kumara', 'kumarafar@gmail.com', '087843284895', 'Kebon jeruk', 'farrel', '7eed7340d6ad80b8cd9800b5cefae431', 'farrelkumara.jpg'),
(19, 'ndo', 'ndo@ndo.com', '02818219930', 'tng', 'ndo', 'a456b778b5db40c6ec2ea0b9dd011f79', 'Screenshot_10.png'),
(20, 'yes', 'yes@ya.com', '099282828', 'tnngg', 'yes', 'a6105c0a611b41b08f1209506350279e', 'logoweb.png'),
(21, 'smm', 'smm@smm.com', '0998838383', 'tnngg', 'smm', '68007ca905924c65d5b0dd76f91ea63f', 'bg1.jpg'),
(23, 'ayodon', 'ayodon@yahoo.com', '09899291', 'jakbar', 'ayodon', 'd2e0bcc22985bd7b44c953deeb49b883', '6_5W_Stereo_Audio_Amp_BOT.png'),
(24, 'contoh', 'contoh@contoh.com', '0982828288', 'jkt', 'contoh', '4553eb3ff328b4868a7a1e6e53cd28b4', 'berita3.jpg'),
(25, 'yaya', 'yaya@yahoo.com', '0811379929200', 'tng', 'yaya', '4409eae53c2e26a65cfc24b3a2359eb9', 'nov6.jpg'),
(26, 'yaya', 'yaya@yaya', '007', 'jkt', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'nov61.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_event` varchar(128) NOT NULL,
  `isi_event` longtext NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_forum`, `id_admin`, `id_kategori`, `nama_event`, `isi_event`, `tanggal`, `gambar`, `rating`) VALUES
(1, 1, 1, 5, 'Vizitrip Video Competition ', '<h2><b>Vizitrip Video Competition #LiburanJadiMudah</b></h2><b><br></b><div><b>Tanggal :&nbsp;</b></div>Periode lomba : s.d 27 Juni 2018<br>Pengumuman pemenang : 4 Juli 2018<br>Tempat:&nbsp;Diadakan secara online<br><br><h3><b>Syarat &amp; Ketentuan kontes :</b></h3>Tunjukkin spot keren buat liburan di kota kamu, bikin videonya dan menangkan hadiah jalan-jalan ke Bangkok!<br>Kali ini Viziteam punya kejutan spesial untuk Vizitors! Mau jalan-jalan gratis ke Bangkok? <br>Dalam lomba ini, Viziteam menantang Vizitors untuk menunjukkan spot liburan yang keren di kota kamu dalam video singkat berdurasi maksimal 60 detik.<br>Ikuti Video Competition #LiburanJadiMudah dengan tema Spot Liburan Keren di Kota ku ?yang berhadiah tour ke Bangkok 3D2N untuk 1 (satu) pemenang utama &amp; 2 (dua) pemenang favorit berhak mendapatkan tour Dieng Plateu!<br><br><h3><b>Syarat &amp; Ketentuan :</b></h3>Video merupakan karya asli yang belum pernah dipublikasikan atau diikutsertakan di kompetisi lain<br>Durasi video maksimal 60 detik dengan tema Spot Liburan Keren di Kota ku<br>Setiap peserta diperbolehkan submit video sebanyak-banyaknya namun panitia hanya akan memilih 1 (satu) video dari 1 (satu) akun Instagram<br>Masing-masing peserta hanya boleh berpartisipasi melalui satu akun Instagram<br>Video yang masuk akan dinilai berdasarkan: konsep, alur cerita dan sinematografi<br>Vizitrip berhak untuk menggunakan video peserta yang diikutsertakan dalam kompetisi ini untuk segala kepentingan Vizitrip<br>Peserta tidak dipungut biaya. Jika ada pihak lain yang mengatasnamakan Vizitrip ataupun Panitia Penyelenggara yang memungut/meminta biaya untuk proses pengambilan/pengiriman hadiah maka dipastikan bahwa itu adalah penipuan.<br><br><h3><b>Mekanisme Mengikuti Blog Competition :</b></h3>Peserta wajib follow Instagram Vizitrip<br>Share video kamu di akun Instagram yang dimiliki kemudian tag &amp; mention akun Instagram Vizitrip, sertakan caption dan tagar #LiburanJadiMudah #Vizitrip + (sertakan nama kota kamu). Contohnya #LiburanJadiMudah #VizitripJakarta<br>Video tidak mengandung SARA &amp; muatan politik<br><br><h3><b>Hadiah &amp; pemenang :</b></h3>Akan dipilih 1 (satu) orang pemenang utama berhak mendapatkan hadiah tour Bangkok 3D2N &amp; 2 (dua) pemenang favorit berhak mendapatkan tour Dieng Plateu<br>Periode pendaftaran video dimulai dari 28 Mei 2018 hingga 27 Juni 2018, pengumuman pemenang pada 4 Juli 2018.<br>Pertanyaan seputar kompetisi ini dapat diajukan pada Facebook Vizitrip dan Instagram Vizitrip<br>Pemenang akan dihubungi lebih lanjut<br>Keputusan juri bersifat mutlak dan tidak dapat diganggu gugat<br>Syarat dan ketentuan dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu<br><br><p><b>Kapan lagi bisa liburan gratis? Yuk buruan ceritakan mengapa liburan sekarang semakin mudah dan nggak ribet menurut versi kamu dan menangkan liburan ke Bangkok!</b></p><p><br></p><div><div><b>Info dan kontak :</b></div><b>Instagram: @vizitrip<br></b><b>Website:&nbsp;vizitrip.com/competition/video-competition</b></div>', '2019-08-13', 'Vizitrip-Video-Competition-LiburanJadiMudah-berhadiah-liburan-gratis-ke-Bangkok-Dieng-Plateu.jpg', 0),
(2, 2, 1, 3, 'Youth Speak Forum 2019', '<h3><b>Hey Jakarta!</b></h3><p><b>Youth Speak Forum hadir di kotamu tanggal 6 Juli 2019! Tapi tidak sampai situ saja, akan dilanjutkan Project Competition sampai tanggal 13 Juli!</b></p><p><b>Sudah siapkah kamu untuk #LevelUp dirimu dan mendapatkan sesi-sesi berharga dari para pembicara dan para mentor?</b></p><p><b>Daftarkan dirimu segera dengan membeli tiket di @eventeventapp!</b></p><p><b>Caranya hanya dengan search “Youth Speak Forum 2019” di eventevent app, pilih seat favoritmu, isi data dirimu, pilih cara pembayaran, bayar…dan selesai!</b></p><p><b>Jangan sampai kehabisan ya!</b></p><p><strong><br></strong></p><h2><strong>Konten Event :</strong><br></h2>#INSPIRE Session : Seminar from the experts<br>Tempat : Perpusnas, Ruang Serbaguna Lantai 4, Jl. Medan Merdeka Sel. No. 11, Jakarta Pusat<br><br>#ENGAGE Session : Workshop, FGD, Project Fair, Feedback Circle<br>Tempat : Perpusnas, Ruang Serbaguna Lantai 4, Jl. Medan Merdeka Sel. No. 11, Jakarta Pusat<br><br>#ACT Session to Realize the project in our village location mapping<br>Tempat : Multivision Tower 25thFloor, Jl. Kuningan Mulia Lot 9B, Jakarta.<br><br><h2><strong>Pembicara :</strong></h2><div>Anthony Reza Prasetya* (Co-Founder and CEO Indonesia at GetCraft)<br>Helga Angelina* (Co-Founder of Burgreens)<br>Arief Ambiya (Director Business Stevland Bridge)<br>Gary Evano (Head of Operations and Business Development on PUYO)<br>Gracia Billy (Founder and CEO Kitong Bisa)<br>Evita Martha (Presidnet of Student Catlayst Jakarta)<br>Greatia Sidabutar (MCVP IR AIESEC in Indonesia 17/18)<br>Naina Chopra Kapoor (Head of People Analysis Greenhouse.co)<br>*) Still to be confirmed</div><div><br><div><strong>Pendaftaran :</strong></div><div><b><br></b></div><div><b>Biaya Pendaftaran : Rp 100.000</b></div><br><div><b>Fasilitas&nbsp;</b></div><b>3 Sessions :</b><br>#INSPIRE Session : Seminar from the experts<br>#ENGAGE Session : Workshop, FGD, Project Fair, Feedback Circle<br>#ACT Session to Realize the project in our village location mapping<br>Your own journey Book<br>Seminar Kit<br>Certificate<br>Lunch &amp; Snack<br>Vouchers<br>And So Much More<br>Link Pendaftaran :&nbsp;<a rel=\"nofollow\" target=\"_blank\" href=\"http://bit.ly/youthspeak2019\">http://bit.ly/youthspeak2019</a><br><br></div><div><div><strong>More Information :</strong></div><div>Bella : 082283928887</div></div><p><strong>This Event Full Supported by EVENTJAKARTA</strong></p>', '2019-06-10', 'MP-YouthSpeak-Forum-2019-AIESEC-Copy.jpg', 0),
(3, 3, 1, 2, 'Creatalk 2.0 : Lomba Video Kreatif', '<h3>Hi, kalian para konten kreator!</h3><p>Creatalk atau Creative Talk kembali hadir untuk kalian yang berjiwa kreatif dan inovatif. Kali ini Creatalk 2.0 memberikan kesempatan berupa lomba video kreatif yang bertemakan “Nasionalisme Jaman Now”</p><p>Yuk, segera daftarkan video kreatif kalian dan menangkan total hadiah puluhan juta rupiah!</p><h2><br><strong>Tema :&nbsp;Nasionalisme Jaman Now</strong></h2><strong><br></strong><h3><strong>Timeline :</strong></h3>Pendaftaran : 25 Mei – 2 Agustus 2019<br>Batas Unggah Video : 17 Agustus 2019<br>Proses Seleksi Video : 24 Agustus 2019<br>Pengumuman 5 Besar : 31 Agustus 2019<br>Hari Penganugerahan Dan Talkshow : 14 September 2019<br><br><h3><strong>Syarat dan Ketentuan :</strong></h3>Peserta adalah pelajar SMA / Sederajat dan Mahasiswa / Umum<br>Beranggota maksimal 3 orang<br>Durasi video 2 – 4 menit<br>Merupakan karya asli (original) dan bleum pernah dipublish<br>Tidak mengandung unsur sara, kekerasan, pornografi<br>Video diunggah kea kun youtube masing – masing<br><h3><br><strong>Pendaftaran :</strong></h3>Tanggal Pendaftaran : 25 Mei – 2 Agustus 2019<br>Link Pendaftaran :&nbsp;<a rel=\"nofollow\" target=\"_blank\" href=\"http://bit.ly/creatalk2019\">http://bit.ly/creatalk2019</a><br><br><strong>More Information :</strong><div>Salwan : 0878 8844 9568<br>Tantan : 0857 1943 8082<br>Instagram :&nbsp;<a rel=\"nofollow\" target=\"_blank\" href=\"http://instagram.com/sigmatvunj\">sigmatvunj<br></a>Twitter :&nbsp;<a rel=\"nofollow\" target=\"_blank\" href=\"http://twitter.com/sigmatvunj\">sigmatvunj<br></a>Facebook : Sigma TV UNJ<br>Youtube : sigmatvaction</div><p><strong>This Event Full Supported by EVENTJAKARTA</strong></p>', '2019-07-16', 'MP-Creatalk-2_0-Sigma-TV-UNJ-Copy.jpg', 0),
(4, 4, 1, 1, 'Lomba Video Mukbang Sirup Kurnia Berhadiah 5 Juta Rupiah!', '<h3><b>TEMA</b></h3><h3><b>&nbsp;Lomba Video Mukbang Sirup Kurnia</b></h3><p>Pada Bulan Juli ini, tren mukbang sudah sangat ramai di social media dan menjadi salah satu tren yang diminati di kalangan netizen.</p><p>Untuk itu, Ayo! ikuti Lomba Video Mukbang Sirup Kurnia yang akan berlangsung hingga 24 Juli. Ada hadiah Total 5 Juta Rupiah! .</p><h3><br>Segera ikutan Lomba Video Mukbang Sirup Kurnia dengan simak mekanisme lombanya :</h3><div><span class=\"wysiwyg-color-red\">Follow IG&nbsp;@sirup_kurnia</span><br><span class=\"wysiwyg-color-red\">Bikin Video saat kamu makan makanan apa saja dengan tema mukbang ditemani dengan minum Sirup Kurnia ( Botol Sirup Kurnia harus ada di dalam Video )</span><br><span class=\"wysiwyg-color-red\">Video berdurasi minimal 1 menit</span><br><span class=\"wysiwyg-color-red\">Unggah ke instagram dan Ceritakan pengalaman seru kamu saat mencoba makan dengan tema mukbang di caption</span><br><span class=\"wysiwyg-color-red\">Tag teman kamu / keluarga dan tag Instagram&nbsp;@sirup_kurnia</span><br><span class=\"wysiwyg-color-red\">Gunakan hastag&nbsp;#Sirupkurnia #MukbangKurnia #BersamaKurnia</span></div>', '2019-06-09', 'Lomba-Video-Mukbang-Sirup-Kurnia-Berhadiah-5-Juta-Rupiah.png', 3),
(6, 5, 1, 4, 'DWP 2020', 'HATJEP HATJEP AMER', '2019-10-12', 'DWP1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `judul_forum` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `isi_forum` longtext NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_forum`, `nama`, `judul_forum`, `tanggal`, `isi_forum`, `gambar`, `rating`) VALUES
(2, 'Muhammed Hilman', '6 Video Editing Gratis Dan Terbaik', '2019-05-30', 'Kebanyakan vloggers membutuhkan editor video.\r\nKarena sebagian besar editor video gratis membatasi fitur mereka untuk mengiklankan versi profesional mereka, Anda mungkin menemukan penghalang pandang yang menghentikan Anda melakukan suntingan lanjutan. Bagi editor dengan lebih banyak fitur, tapi itu tidak gratis, lihat perangkat lunak video digital tingkat menengah atau program pengeditan video profesional terbaik ini.\r\n1) OpenShot (Windows, Mac, and Linux)\r\n2) VideoPad (Windows &amp; Mac), 3) Freemake Video Converter (Windows), 4) VSDC Free Video Editor (Windows), 5) iMovie (Mac) TERAKHIR&nbsp;Movie Maker (Windows). Menurut gue sih itu aja kalau dari kalian ada lagi gak ? SHARE DI KOLOM KOMENTAR YA :))', 'best-free-video-editing-software-programs-4128924_FINAL1-5bfd7100c9e77c0051baa16f.png', 0),
(3, 'Aris Nandar', 'Kisah Singkat Inspiratif Dari Youtuber Tara Arts Indonesia', '2019-06-03', 'Awalnya ia hanya mengunggah video untuk promosi toko sulapnya, iseng-iseng berhadiah namun ketika mendapatkan pesan dari David Spates, perwakilan YouTube di Los Angeles, Amerika Serikat. Isi pesan: YouTube mengajak Diwantara sebagai pemilik kanal YouTube “Tara Arts Movie” untuk menjadi mitra langsung. Tara sendiri langsung loncat-loncat seperti Spiderman tanpa jaring kegirangan.\r\n\r\nMendapat tawaran itu, pria yang baru kuliah satu semester di Universitas Negeri Jakarta tersebut memutuskan berhenti kuliah, dan memilih lebih serius menjadi YouTuber.\r\n\r\nKemudian, Tarapun memamerkan tawaran itu kepada adiknya, Gema Cita Andika. Dua pemuda inipun bekerja sama menjadi Tara Arts Indonesia, bahkan penghasilannya dalam media youtube ini terendah menghasilkan US$ 1.500 dan tertinggi hampir US$ 10 ribu,” sungguh luar biasa. Kalau kalian siapa yang menginspirasi sampe kalian mau jadi YOUTUBER TERKENAL ? SHARE DI KOLOM KOMENTAR YA !!<br>', '9235218_20180205045604.png', 0),
(4, 'saefullah', ' Membahas Sobat Hape : YouTuber Review Gadget Terkocak Saat Ini', '2019-07-02', 'Seperti yang kita tau, Sobat Hape ini seringkali menamai sesi konten mereka dengan nama yang agak nyeleneh seperti contoh kayak JaNDa (Jadul Nan Menggoda) guna membahas gadget-gadget lawas tapi masih lumayan menggoda buat dibeli, lalu BOKer (Buat Orang Kere) guna membahas gadget-gadget yang ramah di kantong tapi kualitasnya tetap jempolan, terus ada lagi NgeTeh (Ngebahas Tehnologi) guna membahas seputar perkembangan teknologi smartphone, dan masih ada lagi nama sesi kocak lainnya yang tak bisa saya sebutkan dan jelaskan satu persatu.\r\n\r\nDisamping punya nama sesi yang kocak, konten review Sobat Hape ini kadang gak kalah kocaknya. COBA SHARE SINGKATAN KATA YANG KOCAK MENURUT KALIAN TULIS DI KOLOM KOMENTAR YA HEHE!!!', '8393957_20190323030610.jpg', 0),
(5, 'Rima Hadi Ismail', 'Youtuber PUBG Mobile !! Dari Yang Paling Jago Sampai Yang Paling Nuub !!', '2019-07-08', 'Mau tau siapa yang kalian suka dengan youtuber gaming terutama pubg setuju gak kalo gue urutin nih hehe \r\n\r\n1) BangPen\r\n2) Benny Moza\r\n3) Bang Alex\r\n\r\nyuk share siapa youtuber gaming favorit kalian nih??? tulis di kolom komentar ya hehe', '9089354_20190712125145.jpg', 5),
(6, 'dnl', 'dwdw', '2019-07-12', '<p><em>djwkwkkdw</em></p>', 'dnl5.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Kuliner', '2019-10-10 08:55:56', '2019-10-10 10:43:20', 0),
(2, 'Sport', '2019-10-10 09:11:51', '2019-10-11 05:24:50', 0),
(3, 'Videografi', '2019-10-10 09:14:46', '2019-10-11 05:25:08', 0),
(4, 'Musik', '2019-10-10 09:15:56', '2019-10-11 05:25:17', 0),
(5, 'Teknologi', '2019-10-10 09:16:04', '2019-10-11 05:25:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_forum`
--

CREATE TABLE `komentar_forum` (
  `id_komentar_forum` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `isi_komentar` longtext NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `id_parent_komentar_forum` int(11) NOT NULL,
  `status_komentar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_forum`
--

INSERT INTO `komentar_forum` (`id_komentar_forum`, `nama`, `id_forum`, `isi_komentar`, `waktu`, `id_parent_komentar_forum`, `status_komentar`) VALUES
(1, 'dnl', 6, '<p><strong>wdwdw</strong></p>', '14/07/2019 18:48:37', 0, 0),
(2, 'dnl', 6, '<p><strong>dwdwdw</strong></p>', '14/07/19 18:48:52', 1, 0),
(3, 'ndo', 4, '<p>tes</p>', '17/07/2019 10:43:08', 0, 0),
(4, 'ndo', 4, '<p>balaas</p>', '17/07/19 10:43:21', 3, 0),
(5, 'saefullah', 4, '<p>balas lagi</p>', '17/07/19 10:44:15', 3, 0),
(6, 'saefullah', 4, '<p>tulis komen</p>', '17/07/2019 10:44:26', 0, 0),
(7, 'ndo', 4, '<p>balas saeful</p>', '17/07/19 10:45:16', 6, 0),
(8, 'ndo', 5, '<p>efefeer</p>', '21/07/2019 13:09:09', 0, 0),
(9, 'ndo', 5, '<p>drefdvdf</p>', '21/07/19 13:09:24', 8, 0),
(10, 'ndo', 4, '<p>ayolah</p>', '20/10/2019 15:18:15', 0, 0),
(11, 'dnl', 4, '<p>tulis komentar</p>', '30/11/2019 10:52:48', 0, 1),
(12, 'dnl', 4, '<p>bala komentar</p>', '30/11/19 10:53:44', 11, 1),
(13, 'dnl', 4, '<p>ini baru dibalas</p>', '30/11/19 11:07:41', 11, 1),
(14, 'dnl', 4, '<p>tulis komentar kedua</p>', '30/11/2019 11:08:08', 0, 1),
(15, 'dnl', 4, '<p>balas komentar kedua</p>', '30/11/19 11:08:44', 14, 1),
(16, 'dnl', 4, '<p>ayo komen</p>', '30/11/2019 11:11:06', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_project`
--

CREATE TABLE `komentar_project` (
  `id_komentar_project` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_project` int(11) NOT NULL,
  `isi_komentar` longtext NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `id_parent_komentar_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_project`
--

INSERT INTO `komentar_project` (`id_komentar_project`, `nama`, `id_project`, `isi_komentar`, `waktu`, `id_parent_komentar_project`) VALUES
(1, 'dnl', 3, '<p>kkl</p>', '15/07/2019 -- 04:50:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_channel` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `isi_project` longtext NOT NULL,
  `video` varchar(128) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_admin`, `nama_channel`, `tanggal`, `isi_project`, `video`, `rating`) VALUES
(2, 1, 'ar is', '2019-07-02', '<h3>MENTAL HOSPITAL IV</h3>HELLO GAMERS!!<br>terimakasih telah menonton video ini tapi jangan lupa klik tombol SUBSCRIBE, like &amp; share ???? Di video kali saya bermain game MENTAL HOSPITAL IV. Game merupakan game horror terbaru yg yg bisa kalian dawnload di playstore Link ? <a rel=\"nofollow\" target=\"_blank\" href=\"https://www.youtube.com/redirect?v=3Rbj-l20bpo&amp;redir_token=7ASuNdg4RvcIodPHl8ZkJoMAlot8MTU2MzAyNjIwMkAxNTYyOTM5ODAy&amp;event=video_description&amp;q=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.agaming.mentalhospitaliv\">https://play.google.com/store/apps/de...</a>&nbsp;Suport terus chennel ini dengan cara L<b>IKE, SUBSCRIBE &amp; SHARE</b> ok ? Follow juga...<br><br><b>INSTAGRAM&nbsp;</b><br><a rel=\"nofollow\" target=\"_blank\" href=\"https://www.youtube.com/redirect?v=3Rbj-l20bpo&amp;redir_token=7ASuNdg4RvcIodPHl8ZkJoMAlot8MTU2MzAyNjIwMkAxNTYyOTM5ODAy&amp;event=video_description&amp;q=https%3A%2F%2Fwww.instagram.com%2Farismunandar7495%2F\">https://www.instagram.com/arismunanda...</a>&nbsp;Thanks for watching ????????', 'https://youtube.com/embed/3Rbj-l20bpo', 0),
(3, 1, 'MH Project', '2019-06-14', '<h3>AYAT AYAT CINTA - ROSSA (COVER) CICA DARYANTI</h3><span><br>Ga tau kenapa kita sama-sama Grogi bawain lagu ini. Hahaahaha. Over All Alhamdulillah jadi juga rekamannya. Semoga Kalian Suka !!!! ????\r\n\r\nThanks All buat dukungannya ke Channel ini. Kalo kalian suka jangan lupa <b>Like, Comment &amp; Sabskreb.</b> Jangan ragu karena Sabskreb itu gratizz tizz tizz. Hahahaa\r\n\r\nAyat Ayat Cinta - Rossa\r\nCover by Cica Daryanti\r\n\r\nKepoin juga..<br><br><b>INSTAGRAM @cica.daryanti\r\n@muhammedhilman\r\n\r\nThank Youuuu</b></span>', 'https://youtube.com/embed/cP5vsGfjFNE', 4),
(5, 1, 'Rima Hadi Ismail', '2019-05-30', '<h3>Cara menjahit gorden smokering | membuat gorden smokering sendiri dari bahan lokal.</h3><br>Di video kali ini saya perlihatkan bagai mana cara membuat gorden smokering sendiri dari bahan lokal.\r\n\r\n<a rel=\"nofollow\" target=\"_blank\" href=\"https://www.youtube.com/results?search_query=%23fadilahjayagorden\">#fadilahjayagorden</a><br>', 'https://youtube.com/embed/BV52ubJabFg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_event`
--

CREATE TABLE `rating_event` (
  `id_ratingevent` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_event`
--

INSERT INTO `rating_event` (`id_ratingevent`, `id_event`, `id_anggota`, `rating`) VALUES
(1, 4, 19, 4),
(2, 4, 7, 1),
(7, 4, 11, 5),
(21, 3, 19, 3),
(23, 4, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rating_forum`
--

CREATE TABLE `rating_forum` (
  `id_ratingforum` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating_project`
--

CREATE TABLE `rating_project` (
  `id_ratingproject` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_project`
--

INSERT INTO `rating_project` (`id_ratingproject`, `id_project`, `id_anggota`, `rating`) VALUES
(1, 5, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rating_training`
--

CREATE TABLE `rating_training` (
  `id_ratingtraining` int(11) NOT NULL,
  `id_training` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id_training` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_training` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `isi_training` longtext NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id_training`, `id_admin`, `nama_training`, `tanggal`, `isi_training`, `gambar`, `rating`) VALUES
(5, 1, 'Creator Camp\'18', '2018-12-05', '<h3>EFFION CREATOR CAMP</h3><p>KAMU MAU JADI CONTENT CREATOR? (YouTuber, Instagrammer, Video Editor, Film Maker, Influencer, dsb) ???????????????????? Tetapi.... ????????????<br>- Ga punya alat multimedia<br>- Ga bisa ngedit<br>- Ga ada teman collab<br>- Ga ada support<br>- Bingung bikin konten apa<br>- Ga ada mentor<br><br>INFO LEBIH LANJUT ATAU MAU DAFTAR KLIK TOMBOL DAFTAR VIA WHATSAPP YA GUYS!!</p>', 'cc1.jpg', 4),
(6, 1, 'Creator Camp\'19!', '2019-07-16', '<h3>EFFION CREATOR CAMP SEASON 2</h3>KAMU MAU JADI CONTENT CREATOR? (YouTuber, Instagrammer, Video Editor, Film Maker, Influencer, dsb) ???????????????????? Tetapi.... ????????????<br>- Ga punya alat multimedia<br>- Ga bisa ngedit<br>- Ga ada teman collab<br>- Ga ada support<br>- Bingung bikin konten apa<br>- Ga ada mentor<br><br>????????????????<br>KLIK TOMBOL DAFTAR ATAU MAU NANYA INFO LEBIH LANJUT YA GUYS!!<br>', 'cc2.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `unggah_karya`
--

CREATE TABLE `unggah_karya` (
  `id_karya` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_channel` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `isi_karya` longtext NOT NULL,
  `video` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unggah_karya`
--

INSERT INTO `unggah_karya` (`id_karya`, `id_anggota`, `nama_channel`, `tanggal`, `isi_karya`, `video`) VALUES
(1, 6, 'ar is', '2019-06-19', 'Terimakasih telah menonton vidio ini tapi jangan lupa klik tombol SUBSCRIBE nya guys karna SUBSCRIBE itu gratiss guyss gratisss gak ada ruginya lo klik tombol SUBSCRIBE nya guys selamat menonton enjoyy ???? \r\n\r\nFollow INSTAGRAM saya @arismunandar7495\r\nhttps://www.instagram.com/arismunanda...', 'https://youtube.com/embed/L_b6b-5OxkQ'),
(2, 7, 'K.L.N FILM', '2019-06-10', 'ASALAMUALAIKUM \r\n\r\nHallo temen temen, film ini dibuat dengan mengkolaborasikan beladiri yang berbeda-beda. Semata mata hanya untuk mengexplore kemampuan dan pengetahuan beladiri masing-masing. \r\n\r\nBila ada kekurangan, mohon kritik dan saran nya dikolom komentar.\r\n\r\nSupport trus chanel kami, agar tetap semangat untuk berkarya. \r\n\r\nLike, comment, share and subscribe. \r\n', 'https://youtube.com/embed/QxpC-2IMDoI'),
(4, 9, 'Rima Hadi Ismail', '2019-07-07', 'Jumpa lagi sahabat youtube....kali ini saya share video bagaimana cara membuat gorden kombinasi warna dengan baik dan benar. dan disini saya jelaskan secara rinci bagai mana cara dari membuat gorden kawat tersebut. maka dari itu disimak sampai selesai sahabat youtube agar video cara membuat gorden dari bahan lokal ini dapat dimengerti dan di pahami dengan baik hingga bisa dipratekkan ditempat sahabat youtube masing2. tak lupa seperti biasa mohon untuk selalu mendukung chanel ini dengan cara like,komen,dan SUBSCRIBEnya...ok,terimakasih. See you youtube friends ... this time I share a video on how to make the color combination curtains properly and correctly. and here I explain in detail how to make these wire curtains. so that it is listened to until the youtube friend finishes so that the video on how to make curtains from local material can be understood and understood so that it can be prerecorded at the place of each YouTube friend. Don\'t forget as usual, please always support this channel by means of likes, comments and SUBSCRIBE ... ok, thanks.', 'https://youtube.com/embed/zrtxBax7QXU'),
(5, 8, 'MH Project', '2019-07-07', 'Yang kenal tag orangnya !!! Kereeeeeeen Pisan !!!!', 'https://youtube.com/embed/DOYziYwPaN0'),
(6, 11, 'dde', '2019-07-17', '<p>dwdwdw</p>', 'https://youtube.com/embed/3Rbj-l20bpo'),
(7, 19, 'ndo channel', '2018-10-11', '<p>tentang karyaku</p>', 'https://youtube.com/embed/33cEehSVDs0'),
(9, 19, 'ice Juga Manusia | Froyonion Meets', '2019-08-17', '<p>Membahas dan menggugat topik lokal yang bahkan banyak orang lokal belum tahu, Vice Indonesia berhasil membangun diskusi bagi para penontonnya. Banyak yang bertanya-tanya bagaimana mereka bekerja dan bagaimana proses sebuah konten ini hingga berhasil dibuat.</p>', 'https://youtube.com/embed/7Xjoq3u8JoU'),
(10, 19, 'KIAT SUKSES MEMBUAT TRANSISI DALAM KAMERA | DUO KENDOR', '2019-11-11', '<p>Kalau kamu nonton ini mungkin bisa sekeren abang KOLD. kali ini Duo Kendor akan sharing ilmu tentang tansisi, agar supaya.</p>', 'https://youtube.com/embed/jRFEwef6OFQ'),
(11, 19, 'HIP HOP KEMBALI BERJAYA MESKI BEDA ERA', '2019-11-15', '<p>Sweet Martabak, mendengar namanya mungkin anak zaman sekarang banyak yang tidak tahu. Grup musik hip-hop 90an ini cukup galak pada zamannya. Walau di era digital mereka tidak banyak terdengar tetapi karyanya masih nempel dikuping anak 90an. Menurut Civilion gimana perkembangan musik hip-hop dari era 90 hingga sekarang?</p>', 'https://youtube.com/embed/CVoghbATVnQ'),
(12, 7, 'Ma\'mum parodi | short movie', '2019-11-02', '<p>asalamualaikum kawan kln untuk sementara saya upload vidio selingan dikarnakan vidio2 lainya blom selesai kami edit dan ada yg belom selesai shoot</p>', 'https://youtube.com/embed/UBBrVPK-hkc'),
(13, 6, 'RANK UP TO LEGENDS CALL OF DUTY MOBILE GARENA no facecam', '2019-11-04', '<p>Yang mau mabar bareng coment cuy</p>', 'https://youtube.com/embed/K5G7zLbCLB0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_user` (`id_admin`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  ADD PRIMARY KEY (`id_komentar_forum`),
  ADD KEY `id_forum` (`id_forum`);

--
-- Indexes for table `komentar_project`
--
ALTER TABLE `komentar_project`
  ADD PRIMARY KEY (`id_komentar_project`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `rating_event`
--
ALTER TABLE `rating_event`
  ADD PRIMARY KEY (`id_ratingevent`),
  ADD UNIQUE KEY `id_event` (`id_event`,`id_anggota`);

--
-- Indexes for table `rating_forum`
--
ALTER TABLE `rating_forum`
  ADD PRIMARY KEY (`id_ratingforum`),
  ADD UNIQUE KEY `id_forum` (`id_forum`,`id_anggota`);

--
-- Indexes for table `rating_project`
--
ALTER TABLE `rating_project`
  ADD PRIMARY KEY (`id_ratingproject`),
  ADD UNIQUE KEY `id_project` (`id_project`,`id_anggota`);

--
-- Indexes for table `rating_training`
--
ALTER TABLE `rating_training`
  ADD PRIMARY KEY (`id_ratingtraining`),
  ADD UNIQUE KEY `id_training` (`id_training`,`id_anggota`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `unggah_karya`
--
ALTER TABLE `unggah_karya`
  ADD PRIMARY KEY (`id_karya`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  MODIFY `id_komentar_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `komentar_project`
--
ALTER TABLE `komentar_project`
  MODIFY `id_komentar_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating_event`
--
ALTER TABLE `rating_event`
  MODIFY `id_ratingevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rating_forum`
--
ALTER TABLE `rating_forum`
  MODIFY `id_ratingforum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_project`
--
ALTER TABLE `rating_project`
  MODIFY `id_ratingproject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating_training`
--
ALTER TABLE `rating_training`
  MODIFY `id_ratingtraining` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unggah_karya`
--
ALTER TABLE `unggah_karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `project` (`id_admin`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  ADD CONSTRAINT `komentar_forum_ibfk_1` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_project`
--
ALTER TABLE `komentar_project`
  ADD CONSTRAINT `komentar_project_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Constraints for table `rating_event`
--
ALTER TABLE `rating_event`
  ADD CONSTRAINT `rating_event_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `unggah_karya`
--
ALTER TABLE `unggah_karya`
  ADD CONSTRAINT `unggah_karya_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
