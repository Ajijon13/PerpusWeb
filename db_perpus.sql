-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 05:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpuspro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `gambar_admin`) VALUES
(1, 'perpustakaan', 'samuderailmu', 'perpus smp ', 'logoperpus.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `keterangan` longtext NOT NULL,
  `gambar_berita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `keterangan`, `gambar_berita`) VALUES
(4, 'aaaaaaaaaaaaaaa', 'index.jpg'),
(5, 'aaaaaaaaaaaaaaaaaaaaaaa', '500018100731_44914.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku_paket`
--

CREATE TABLE `buku_paket` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tempatdanpenerbit` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `jumlahhalaman` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `file_buku` varchar(255) NOT NULL,
  `gambar_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_paket`
--

INSERT INTO `buku_paket` (`id`, `judul`, `pengarang`, `tempatdanpenerbit`, `isbn`, `jumlahhalaman`, `kategori`, `file_buku`, `gambar_buku`) VALUES
(1, 'Bahasa Indonesia Kelas IX Semester Ganjil', 'MGMP Bahasa Indonesia', 'jakarta / Erlangga ', '98756432889', '270 hlm', '800 Sastra', 'CHEK LIST SKMT CALON PENERIMA TPG GPAI 2019.pdf', 'Undangan SKMT beserta lampirannya.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `data_ebook`
--

CREATE TABLE `data_ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tempatdanpenerbit` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `jumlahhalaman` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `file_ebook` varchar(255) NOT NULL,
  `gambar_ebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ebook`
--

INSERT INTO `data_ebook` (`id`, `judul`, `pengarang`, `tempatdanpenerbit`, `isbn`, `jumlahhalaman`, `kategori`, `file_ebook`, `gambar_ebook`) VALUES
(87, 'Laskar Pelangi', 'Andrea Hirata', 'Erlangga / Jakarta', '19876548765', '150 hlm', '800 Sastra', 'CHEK LIST SKMT CALON PENERIMA TPG GPAI 2019.pdf', 'IMG-20200525-WA0003.jpg'),
(90, 'Hati Suhita', 'Nur Laila', 'Cahaya Media / Solo', '985437907123', '120 hlm', '800 Sastra', 'CHEK LIST SKMT CALON PENERIMA TPG GPAI 2019.pdf', 'IMG-20200711-WA0002.jpg'),
(91, 'Pendidikan Anak Usia Dini', 'Adji Saputra', 'Mentari Book / Surabaya', 't876580995432', '92 hlm', '300 Ilmu-ilmu Sosial', 'CHEK LIST SKMT CALON PENERIMA TPG GPAI 2019.pdf', 'rafa.png'),
(93, 'Kiat-kiat Menjadi Sukses', 'Achmad Ahsan', 'Buku Kita / Bandung', '98765438765', '97 hlm', '100 Filsafat', 'CHEK LIST SKMT CALON PENERIMA TPG GPAI 2019.pdf', 'foto guru.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `gambar_galeri` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `gambar_galeri`, `keterangan`) VALUES
(8, 'IMG-20200730-WA0001.jpg', 'Bocah Sangar Sak Deso'),
(9, 'rafa.png.jpg', 'Woy Apa Lihat Lihat');

-- --------------------------------------------------------

--
-- Table structure for table `inov_layanan`
--

CREATE TABLE `inov_layanan` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_inovasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inov_layanan`
--

INSERT INTO `inov_layanan` (`id`, `keterangan`, `gambar_inovasi`) VALUES
(1, 'Layanan IT', 'mosque-banner-marhaban-ya-ramadhan_57801-80.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `koleksi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tambahan` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id`, `tgl_input`, `koleksi`, `keterangan`, `jumlah`, `tambahan`, `total`) VALUES
(3, '2021-02-25', 'Cetak', 'aaaaaa', '1', '11', '1'),
(4, '2021-02-25', 'Non Cetak', 'janajha', '1', '1', '1'),
(5, '2021-02-25', 'Cetak', 'aaaaa', '1', '1', '5'),
(6, '2021-03-01', 'Non Cetak', 'fxfgxjfjg', '1', '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `g_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `keterangan`, `g_layanan`) VALUES
(3, 'Tokoh Anak Kecil', 'rafa.png.png');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar_prestasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `keterangan`, `gambar_prestasi`) VALUES
(1, 'Juara I Makan Se Jawa Timur Dalam Ajang Olimpiade Makan Se Indonesia', '500018100731_44914.jpg'),
(2, 'Juara II Makan Krupuk Se Jawa Timur Dalam Ajang Olimpiade Makan Se Indonesia', 'IMG-20200730-WA0001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `namaperpus` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kec` varchar(255) NOT NULL,
  `kab` varchar(255) NOT NULL,
  `prov` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `webe` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sk` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `npsn` varchar(255) NOT NULL,
  `luas` varchar(255) NOT NULL,
  `no_i` varchar(255) NOT NULL,
  `namaks` varchar(255) NOT NULL,
  `namakp` varchar(255) NOT NULL,
  `nosk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `namaperpus`, `alamat`, `kec`, `kab`, `prov`, `nomor`, `webe`, `status`, `sk`, `tahun`, `npsn`, `luas`, `no_i`, `namaks`, `namakp`, `nosk`) VALUES
(1, 'Samudera Ilmu', 'Komplek Pondok Pesantern Sunan Drajad', 'Paciran', 'Paciran', 'Lamongan', '1793479174', 'www.smpn2paciran.sch.id/samuderaillmu0@gmail.com', 'Aktif', '38648916', '2003', '186891698e6189', '971e6137 18t3et', '78t2718t871t', 'sujono', 'sugio', '8183ey8913');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id`, `keterangan`, `gambar`) VALUES
(1, 'struktur', 'struktur.png');

-- --------------------------------------------------------

--
-- Table structure for table `studibanding`
--

CREATE TABLE `studibanding` (
  `id` int(11) NOT NULL,
  `kunjungan` longtext NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar_studi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studibanding`
--

INSERT INTO `studibanding` (`id`, `kunjungan`, `keterangan`, `gambar_studi`) VALUES
(1, 'masuk', 'SMP 22 Surabaya', 'post.png'),
(6, 'masuk', 'qqqqqqqqqqqqqqqqqqqq', 'Picture1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tatatertib`
--

CREATE TABLE `tatatertib` (
  `id` int(11) NOT NULL,
  `t_tertib` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tatatertib`
--

INSERT INTO `tatatertib` (`id`, `t_tertib`) VALUES
(1, '1. tidak boleh melanggar peraruran\r\n2. tidak boleh membawa buku\r\n3. harus tenang dan diam');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id`, `visi`, `misi`) VALUES
(10, 'Terwujudnya Perpustakaan Sekolah yang Representative, Berkualitas, Berdaya Guna  dan Menyenangkan', '-Menumbuh kembangkan minat baca warga sekolah\r\n-Memberikan pelayanan yang cepat, mudah dan ramah\r\n-Menyediakan sumber informasi dan ilmu pengetahuan yang up to date dan lengkap dalam berbagai bentuk (buku, koleksi digital, akses internet)\r\n-Mendukung keberhasilan kegiatan proses belajar mengajar dan seluruh program kerja sekolah.\r\n-Membantu menumbuh kembangkan seluruh bakat dan minat para peserta didik\r\n-Menyediakan sarana dan prasarana penunjang untuk meningkatkan pelayanan kepada pmustaka\r\n-Merancang dan melaksanakan program kerja yang kratif, inofatif, edukatif dan rekreatif\r\n-Meningkatkan kualitas SDM pengelola perpustakaan dengan pengikut sertaan pengelola dalam setiap even kegiatan kepustakawanan\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_paket`
--
ALTER TABLE `buku_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ebook`
--
ALTER TABLE `data_ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inov_layanan`
--
ALTER TABLE `inov_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studibanding`
--
ALTER TABLE `studibanding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tatatertib`
--
ALTER TABLE `tatatertib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `buku_paket`
--
ALTER TABLE `buku_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_ebook`
--
ALTER TABLE `data_ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `inov_layanan`
--
ALTER TABLE `inov_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studibanding`
--
ALTER TABLE `studibanding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tatatertib`
--
ALTER TABLE `tatatertib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
