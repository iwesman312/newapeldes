-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2023 pada 15.52
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `nama_dusun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `nama_dusun`) VALUES
(1, 'Menturus'),
(2, 'Menturus 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `nama`, `ukuran`, `tipe`, `status`) VALUES
(1, 'lil4.png', 9846, 'image/png', 'selesai'),
(2, 'lil3.png', 139264, 'image/png', NULL),
(3, 'lil2.jpg', 17002, 'image/jpeg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin@e-suratdesa.com', '*4ACFE3202A5FF5CF467898FC58AAB1D', 'admin'),
(2, 'Kepala Desa', 'kades', 'kepaladesa@desa.id', '0cfa66469d25bd0d9e55d7ba583f9f2f', 'kades'),
(3, 'Hoerudin', 'hoerudin', 'Hoerudin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(4, 'iwes', 'iwes', 'iwes@gmail.com', '7dc7ec3f45533901b77c61f12a5b6849', 'admin'),
(5, 'admin1', 'Administrator1', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat_desa`
--

CREATE TABLE `pejabat_desa` (
  `id_pejabat_desa` int(11) NOT NULL,
  `nama_pejabat_desa` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pejabat_desa`
--

INSERT INTO `pejabat_desa` (`id_pejabat_desa`, `nama_pejabat_desa`, `jabatan`) VALUES
(1, 'M Irfan Sahrizal', 'Kepala Desa'),
(2, 'HOERUDIN S.Pd', 'KASI PELAYANAN DESA ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `pend_kk` varchar(20) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `pend_ditempuh` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `status_dlm_keluarga` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
(99, '3201132906000012', 'Waisul Kurni', 'Bogor', '2000-06-29', 'Laki-laki', 'Islam', 'Kp. Duren baru No.32', 'Susukan', '004', '006', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', '320113290600011', 'SD/SEDERAJAT', 'SLTP/SEDERAJAT', 'HIDUP', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Hoerudin', 'Sami'),
(100, '3201132906000112', 'Wais', 'Bogor', '2000-06-20', 'Laki-laki', 'Islam', 'Kp. Duren baru No.32', 'Susukan', '004', '006', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', '320113290600011', 'SD/SEDERAJAT', 'SLTP/SEDERAJAT', 'HIDUP', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Hoerudin', 'Sami'),
(102, '3517112233440023', 'waisul', 'Jombang', '1997-12-14', 'Laki-laki', 'Islam', 'Jl. KH. Hasyim Asy\'ari No. 15', 'Menturus', '002', '003', 'Menturus', 'Kudu', 'Kabupaten Jombang', '3517112233449999', 'SD/SEDERAJAT', 'SLTP/SEDERAJAT', 'PINDAH', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihah'),
(103, '3517112233440037', 'VEA Sayida', 'Bogor', '1997-12-14', 'Perempuan', 'Islam', 'Jl. KH. Hasyim Asy\'ari No. 15', 'Menturus', '002', '003', 'Menturus', 'Kudu', 'Kabupaten Jombang', '3517112233449999', 'SD/SEDERAJAT', 'SLTP/SEDERAJAT', 'DATANG', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihah'),
(107, '3517112233440010', 'waisul', 'Bogor', '2000-06-12', 'Laki-laki', 'Islam', 'Jl. KH. Hasyim Asy\'ari No. 15', 'Menturus', '002', '003', 'Menturus', 'Kudu', 'Kabupaten Jombang', '3517112233449999', 'SD/SEDERAJAT', 'SLTP/SEDERAJAT', 'HIDUP', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihah'),
(114, '3517112233440002', 'Adi Fahrian Hidayatt', 'Jombang', '1997-12-14', 'Laki-laki', 'Islam', 'Jl. KH. Hasyim Asy\'ari No. 15', 'Menturus', '002', '003', 'Menturus', 'Kudu', 'Kabupaten Jombang', '3517112233449999', 'SD/SEDERAJAT', 'SLTP/SEDERAJAT', 'PINDAH', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihah'),
(115, '3517112233440003', 'Adi Fahrian Hidayattt', 'Jombang', '1997-12-14', 'Laki-laki', 'Islam', 'Jl. KH. Hasyim Asy\'ari No. 15', 'Menturus', '002', '003', 'Menturus', 'Kudu', 'Kabupaten Jombang', '3517112233449999', 'SD/SEDERAJAT', 'SLTP/SEDERAJAT', 'MATI', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Haryono', 'Nasihah'),
(118, '', 'Vea Sayida Zanet', 'Bogor', '2022-08-21', 'Perempuan', 'Islam', 'Duren baru no.32', '', '004', '006', 'Susukan', 'Bojonggede', 'Kabupaten Bogor', '323222031321', '-', '-', 'Lahir', '-', 'Belum Menikah', 'Anak', 'WNI', 'Hoerudin', 'Sami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindah`
--

CREATE TABLE `pindah` (
  `id_penduduk` int(11) NOT NULL,
  `nik` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `agama` varchar(15) CHARACTER SET latin1 NOT NULL,
  `jalan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dusun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `rt` varchar(5) CHARACTER SET latin1 NOT NULL,
  `rw` varchar(5) CHARACTER SET latin1 NOT NULL,
  `desa` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kecamatan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_kk` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pend_kk` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pend_terakhir` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pend_ditempuh` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status_perkawinan` varchar(20) CHARACTER SET latin1 NOT NULL,
  `status_dlm_keluarga` varchar(20) CHARACTER SET latin1 NOT NULL,
  `kewarganegaraan` varchar(5) CHARACTER SET latin1 NOT NULL,
  `nama_ayah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_ibu` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id_profil_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kode_pos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_desa`
--

INSERT INTO `profil_desa` (`id_profil_desa`, `nama_desa`, `alamat`, `no_telpon`, `kecamatan`, `kota`, `provinsi`, `kode_pos`) VALUES
(1, 'SUSUKAN', 'Sekretariat : Jln H. Kaman Bin Burak Rt.003/005 Desa Susukan \r\n', '087781162072', 'Bojonggede', 'Kabupaten Bogor', 'JAWA BARAT', '16920');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan`
--

CREATE TABLE `surat_keterangan` (
  `id_sk` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(137, 'Surat Keterangan', '11', '3517112233440001', 'Persyaratan Melamar Pekerjaan', '2019-12-14 04:00:59', 1, 'SELESAI', 1),
(138, 'Surat Keterangan', '000012312', '3517112233440001', 'Persyaratan Melamar Pekerjaan', '2019-12-14 04:01:06', 1, 'SELESAI', 1),
(139, 'Surat Keterangan', '50001/VII/2022', '3201132906000012', 'Laporan aja', '2022-07-23 19:55:19', 1, 'SELESAI', 1),
(140, 'Surat Keterangan', '50002/VII/2022', '3201132906000012', 'buat', '2022-07-23 20:09:18', 2, 'SELESAI', 1),
(141, 'Surat Keterangan', '50004/VII/2022', '3201132906000012', 'Laporan aja2', '2022-07-23 20:17:54', 2, 'SELESAI', 1),
(142, 'Surat Keterangan', NULL, '3201132906000012', 'asd', '2022-07-24 12:42:50', NULL, 'PENDING', 1),
(143, 'Surat Keterangan', NULL, '3201132906000012', 'www', '2022-07-31 16:27:30', NULL, 'PENDING', 1),
(144, 'Surat Keterangan', '301/VIII/2022/200', '3201132906000012', 'Melaporkan Tempat Tinggal', '2022-08-08 10:52:29', 2, 'SELESAI', 1),
(145, 'Surat Keterangan', '474.4/200/VIII/2022', '3201132906000012', 'kuliah', '2022-08-10 21:18:27', 1, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_berkelakuan_baik`
--

CREATE TABLE `surat_keterangan_berkelakuan_baik` (
  `id_skbb` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keterangan_berkelakuan_baik`
--

INSERT INTO `surat_keterangan_berkelakuan_baik` (`id_skbb`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(6, 'Surat Keterangan Berkelakuan Baik', '22', '3517112233440001', 'Persyaratan Melamar Pekerjaan', '2019-12-14 04:01:17', 2, 'SELESAI', 1),
(7, 'Surat Keterangan Berkelakuan Baik', NULL, '3517112233440001', 'Persyaratan Melamar Pekerjaan', '2019-12-14 04:01:22', NULL, 'PENDING', 1),
(8, 'Surat Keterangan Berkelakuan Baik', '50003/VII/2022', '3201132906000012', 'ss', '2022-07-23 20:11:32', 1, 'SELESAI', 1),
(9, 'Surat Keterangan Berkelakuan Baik', '400/9892/VII/2022', '3201132906000012', 'Coba2', '2022-08-01 01:40:19', 2, 'SELESAI', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_domisili`
--

CREATE TABLE `surat_keterangan_domisili` (
  `id_skd` int(11) NOT NULL,
  `jenis_surat` varchar(200) NOT NULL,
  `no_surat` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `alamat2` varchar(200) NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` varchar(200) NOT NULL,
  `status_surat` varchar(200) NOT NULL,
  `id_profil_desa` varchar(200) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `sejak` varchar(20) NOT NULL,
  `no` varchar(20) NOT NULL,
  `nama1` varchar(200) NOT NULL,
  `tanggal3` varchar(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `hub1` varchar(20) NOT NULL,
  `no2` varchar(20) NOT NULL,
  `nama2` varchar(200) NOT NULL,
  `tanggal4` varchar(20) NOT NULL,
  `jk2` varchar(20) NOT NULL,
  `hub2` varchar(20) NOT NULL,
  `no3` varchar(20) NOT NULL,
  `nama3` varchar(200) NOT NULL,
  `tanggal5` varchar(20) NOT NULL,
  `jk3` varchar(20) NOT NULL,
  `hub3` varchar(20) NOT NULL,
  `no4` varchar(20) NOT NULL,
  `nama4` varchar(200) NOT NULL,
  `tanggal6` varchar(20) NOT NULL,
  `jk4` varchar(20) NOT NULL,
  `hub4` varchar(20) NOT NULL,
  `no5` varchar(20) NOT NULL,
  `nama5` varchar(200) NOT NULL,
  `tanggal7` varchar(20) NOT NULL,
  `jk5` varchar(20) NOT NULL,
  `hub5` varchar(20) NOT NULL,
  `no6` varchar(20) NOT NULL,
  `nama6` varchar(200) NOT NULL,
  `tanggal8` varchar(20) NOT NULL,
  `jk6` varchar(20) NOT NULL,
  `hub6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keterangan_domisili`
--

INSERT INTO `surat_keterangan_domisili` (`id_skd`, `jenis_surat`, `no_surat`, `nik`, `alamat2`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `tanggal`, `sejak`, `no`, `nama1`, `tanggal3`, `jk`, `hub1`, `no2`, `nama2`, `tanggal4`, `jk2`, `hub2`, `no3`, `nama3`, `tanggal5`, `jk3`, `hub3`, `no4`, `nama4`, `tanggal6`, `jk4`, `hub4`, `no5`, `nama5`, `tanggal7`, `jk5`, `hub5`, `no6`, `nama6`, `tanggal8`, `jk6`, `hub6`) VALUES
(1, 'Surat Keterangan Domisili', '33323123222', '3201132906000012', 'www', 'Contoh', '2022-08-27 12:53:42', '1', 'SELESAI', '1', '27-08-2022', '01-08-2022', '2', 'Waisul Kurni', 'bogor, 29 Juni 2022', 'L', 'Kepala keluarga', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Surat Keterangan Domisili', '320/VIII/2022', '3201132906000012', 'Di duren baru deket Masjid', 'Melengkapi Surat Tinggal', '2022-08-27 15:30:39', '1', 'SELESAI', '1', '27-08-2022', '01-08-2022', '1', 'Waisul Kurni', 'bogor, 29 Juni 2022', 'L', 'Kepala keluarga', '2', 'Vea', 'Bogor, 13 September', 'P', 'ADIK', '3', '', '', '', '', '4', '', '', '', '', '5', '', '', '', '', '', '', '', '', ''),
(3, 'Surat Keterangan Domisili', '', '3201132906000012', 'www', 'Contoh', '2022-08-28 18:36:35', '', 'PENDING', '1', '27/08/2022', '01-08-2022', '1', '', '', '', '', '2', '', '', '', '', '3', '', '', '', '', '4', '', '', '', '', '5', '', '', '', '', '', '', '', '', ''),
(4, 'Surat Keterangan Domisili', '', '3201132906000012', 'Di duren baru deket Masjid', 'Contoh', '2022-08-28 18:37:15', '', 'PENDING', '1', '27-08-2022', '01-08-2022', '1', 'Waisul Kurni', 'bogor, 29 Juni 2022', 'L', 'Kepala keluarga', '2', '', '', '', '', '3', '', '', '', '', '4', '', '', '', '', '5', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_domisili_tempat_tinggal`
--

CREATE TABLE `surat_keterangan_domisili_tempat_tinggal` (
  `id_skdtt` int(11) NOT NULL,
  `jenis_surat` varchar(200) NOT NULL,
  `no_surat` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `alamat2` varchar(200) NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` varchar(200) NOT NULL,
  `status_surat` varchar(200) NOT NULL,
  `id_profil_desa` varchar(200) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `sejak` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keterangan_domisili_tempat_tinggal`
--

INSERT INTO `surat_keterangan_domisili_tempat_tinggal` (`id_skdtt`, `jenis_surat`, `no_surat`, `nik`, `alamat2`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `tanggal`, `sejak`) VALUES
(1, 'Surat Keterangan Domisili Tempat Tinggal', '', '3201132906000012', 'Duren baru rt 06 rw 06 desa susukan kec. Bojonggede', 'Pindah', '2022-08-07 23:16:42', '', 'PENDING', '1', '8 agustus 2022', '8 agustus 2022'),
(2, 'Surat Keterangan Domisili Tempat Tinggal', '33323123', '3201132906000012', 'www', 'Contoh', '2022-08-27 12:37:58', '2', 'SELESAI', '1', '27/08/2022', '01/08/2022'),
(3, 'Surat Keterangan Domisili Tempat Tinggal', '', '3201132906000012', 'asd', 'Contohasdas', '2022-08-27 12:38:24', '', 'PENDING', '1', '27-08-2022', '01-08-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

CREATE TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor` (
  `id_skkkb` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `roda` varchar(20) NOT NULL,
  `merk_type` varchar(30) DEFAULT NULL,
  `jenis_model` varchar(30) DEFAULT NULL,
  `tahun_pembuatan` varchar(30) DEFAULT NULL,
  `cc` varchar(30) DEFAULT NULL,
  `warna_cat` varchar(30) NOT NULL,
  `no_rangka` varchar(30) NOT NULL,
  `no_mesin` varchar(30) NOT NULL,
  `no_polisi` varchar(30) NOT NULL,
  `no_bpkb` varchar(30) NOT NULL,
  `atas_nama_pemilik` varchar(30) NOT NULL,
  `alamat_pemilik` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

INSERT INTO `surat_keterangan_kepemilikan_kendaraan_bermotor` (`id_skkkb`, `jenis_surat`, `no_surat`, `nik`, `roda`, `merk_type`, `jenis_model`, `tahun_pembuatan`, `cc`, `warna_cat`, `no_rangka`, `no_mesin`, `no_polisi`, `no_bpkb`, `atas_nama_pemilik`, `alamat_pemilik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(4, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', '42', '3517112233440001', '', 'honda', 'sepeda motor', '2015', '125', 'merah-putih', 'MH1JFP113FK367341', 'JFP1E1375858', 'S 5503ZW', 'L-12009674', 'adi fahrian hidayat', 'Jl. KH. Hasyim Asy\'ari No. 15, RT001/RW002, Dusun Menturus,\r\nDesa Menturus, Kecamatan Kudu, Jombang', 'Kelengkapan Persyaratan Pengajuan Modal Usaha', '2019-12-14 04:04:27', 2, 'SELESAI', 1),
(5, 'Surat Keterangan Kepemilikan Kendaraan Bermotor', NULL, '3517112233440001', '', 'honda', 'sepeda motor', '2015', '125', 'merah-putih', 'MH1JFP113FK367341', 'JFP1E1375858', 'S 5503ZW', 'L-12009674', 'adi fahrian hidayat', 'Jl. KH. Hasyim Asy\'ari No. 15, RT001/RW002, Dusun Menturus,\r\nDesa Menturus, Kecamatan Kudu, Jombang', 'Kelengkapan Persyaratan Pengajuan Modal Usaha', '2019-12-14 04:04:51', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_perhiasan`
--

CREATE TABLE `surat_keterangan_perhiasan` (
  `id_skp` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_perhiasan` varchar(20) NOT NULL,
  `nama_perhiasan` varchar(50) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `toko_perhiasan` varchar(50) NOT NULL,
  `lokasi_toko_perhiasan` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keterangan_perhiasan`
--

INSERT INTO `surat_keterangan_perhiasan` (`id_skp`, `jenis_surat`, `no_surat`, `nik`, `jenis_perhiasan`, `nama_perhiasan`, `berat`, `toko_perhiasan`, `lokasi_toko_perhiasan`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(5, 'Surat Keterangan Perhiasan', '51', '3517112233440001', 'Emas', 'cincin', '3', 'sumber emas', 'pasar legi', 'penjualan perhiasan', '2019-12-14 04:05:23', 1, 'SELESAI', 1),
(6, 'Surat Keterangan Perhiasan', NULL, '3517112233440001', 'Emas', 'cincin', '3', 'sumber emas', 'pasar legi', 'penjualan perhiasan', '2019-12-14 04:05:35', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_tidak_mampu`
--

CREATE TABLE `surat_keterangan_tidak_mampu` (
  `id_sktm` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `nik` varchar(250) NOT NULL,
  `keperluan` varchar(250) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` varchar(10) NOT NULL,
  `status_surat` varchar(20) NOT NULL,
  `id_profil_desa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keterangan_tidak_mampu`
--

INSERT INTO `surat_keterangan_tidak_mampu` (`id_sktm`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(1, 'Surat Keterangan Tidak Mampu', '', '3201132906000012', 'pembuatan BPJS', '0000-00-00 00:00:00', '', 'PENDING', '1'),
(2, 'Surat Keterangan Tidak Mampu', '', '3201132906000012', 'Daftar Sekolah', '0000-00-00 00:00:00', '', 'PENDING', '1'),
(3, 'Surat Keterangan Tidak Mampu', '305/50006/VII/2022', '3201132906000012', 'nyuoba', '2022-07-31 16:28:35', '2', 'SELESAI', '1'),
(4, 'Surat Keterangan Tidak Mampu', '305/50007/VII/2022', '3201132906000012', 'Laporan aja', '2022-07-31 12:06:25', '2', 'SELESAI', '1'),
(5, 'Surat Keterangan Tidak Mampu', '474.4/100/VIII/2022', '3201132906000012', 'masuk sekolah', '2022-08-01 01:45:33', '2', 'SELESAI', '1'),
(6, 'Surat Keterangan Tidak Mampu', '000012312231', '3201132906000012', 'buat laporan', '2022-08-06 23:06:27', '2', 'SELESAI', '1'),
(7, 'Surat Keterangan Tidak Mampu', '', '3201132906000012', 'baruuu', '2022-08-06 23:08:33', '', 'PENDING', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_usaha`
--

CREATE TABLE `surat_keterangan_usaha` (
  `id_sku` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `usaha` varchar(30) DEFAULT NULL,
  `alamat_usaha` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keterangan_usaha`
--

INSERT INTO `surat_keterangan_usaha` (`id_sku`, `jenis_surat`, `no_surat`, `nik`, `usaha`, `alamat_usaha`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(6, 'Surat Keterangan Usaha', '62', '3517112233440001', 'Toko Bangunan', 'Jl. KH. Hasyim Asy\'ari No. 15, RT001/RW002, Dusun Menturus, Desa Menturus, Kecamatan Kudu, Jombang', 'Kelengkapan Persyaratan Pengajuan Modal Usaha', '2019-12-14 04:06:00', 2, 'SELESAI', 1),
(7, 'Surat Keterangan Usaha', NULL, '3517112233440001', 'Toko Bangunan', 'Jl. KH. Hasyim Asy\'ari No. 15, RT001/RW002, Dusun Menturus, Desa Menturus, Kecamatan Kudu, Jombang', 'Kelengkapan Persyaratan Pengajuan Modal Usaha', '2019-12-14 04:06:09', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_kk`
--

CREATE TABLE `surat_kk` (
  `id_skk` int(11) NOT NULL,
  `jenis_surat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_surat` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nama` varchar(200) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `rt` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `kdpos` varchar(50) CHARACTER SET latin1 NOT NULL,
  `desa` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kec` varchar(20) CHARACTER SET latin1 NOT NULL,
  `kab` varchar(20) CHARACTER SET latin1 NOT NULL,
  `prov` varchar(20) CHARACTER SET latin1 NOT NULL,
  `no1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `jk1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `hub1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tempat1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tanggal1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `negara1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `status1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `agama1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `darah1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `wnri1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `asing1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `pend1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `latin1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `arab1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `lain1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `kerja1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `mulai1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `asal1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ortu1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `nopen1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `kb1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cacat1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ket1` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tanggal_surat` datetime DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) CHARACTER SET latin1 NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `nik` varchar(255) NOT NULL,
  `no2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `jk2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `hub2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tempat2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tanggal2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `negara2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `status2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `agama2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `darah2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `wnri2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `asing2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `pend2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `latin2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `arab2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `lain2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `kerja2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `mulai2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `asal2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ortu2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `nopen2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `kb2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cacat2` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ket2` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_kk`
--

INSERT INTO `surat_kk` (`id_skk`, `jenis_surat`, `no_surat`, `nama`, `alamat`, `rt`, `kdpos`, `desa`, `kec`, `kab`, `prov`, `no1`, `nama1`, `jk1`, `hub1`, `tempat1`, `tanggal1`, `negara1`, `status1`, `agama1`, `darah1`, `wnri1`, `asing1`, `pend1`, `latin1`, `arab1`, `lain1`, `kerja1`, `mulai1`, `asal1`, `ortu1`, `nopen1`, `kb1`, `cacat1`, `ket1`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `nik`, `no2`, `nama2`, `jk2`, `hub2`, `tempat2`, `tanggal2`, `negara2`, `status2`, `agama2`, `darah2`, `wnri2`, `asing2`, `pend2`, `latin2`, `arab2`, `lain2`, `kerja2`, `mulai2`, `asal2`, `ortu2`, `nopen2`, `kb2`, `cacat2`, `ket2`) VALUES
(1, 'Surat KK', NULL, 'fnama', 'falamat', 'frt', 'fkdpos', 'fdesa', 'fkec', 'fkab', 'fprov', 'fno1', 'fnama1', 'fjk1', 'fhub1', 'ftempat1', 'ftanggal1', 'fnegara1', 'fstatus1', 'fagama1', 'fdarah1', 'fwnri1', 'fasing1', 'fpend1', 'flatin1', 'farab1', 'flain1', 'fkerja1', 'fmulai1', 'fasal1', 'fortu1', 'fnopen1', 'fkb1', 'fcacat1', 'fket1', '2022-08-28 12:46:14', NULL, 'PENDING', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Surat KK', NULL, 'Waisul Kurni', 'Kp. Duren baru No.32', '004', '16920', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', 'Jawa Barat', '1', 'Waisul Kurni', 'L', 'Kepala keluarga', 'Bogor', '29/06/2000', 'Indonesia', 'Belum Menikah', 'Islam', 'B-', '-', '-', '', ' ', ' ', '?', 'Karyawan Swasta', '20/08/2022', 'DEPOK', 'HOERUDIN/SAMI', '-', ' ', ' ', '-', '2022-08-28 12:51:42', NULL, 'PENDING', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Surat KK', NULL, 'Waisul Kurni', 'Kp. Duren baru No.32', '004', '16920', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', 'Jawa Barat', '1', 'Waisul Kurni', 'L', 'Kepala keluarga', 'Bogor', '29/06/2000', 'Indonesia', 'Belum Menikah', 'Islam', 'B-', '-', '-', '', ' ', ' ', 'v;', 'Karyawan Swasta', '20/08/2022', 'DEPOK', 'HOERUDIN/SAMI', '-', ' ', ' ', '-', '2022-08-28 18:31:30', NULL, 'PENDING', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Surat KK', NULL, 'Waisul Kurni', 'Kp. Duren baru No.32', '004', '16920', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', 'Jawa Barat', '1', 'Waisul Kurni', 'L', 'Kepala keluarga', 'Bogor', '29/06/2000', 'Indonesia', 'Belum Menikah', 'Islam', 'B-', '-', '-', '', ' ', ' ', 'v;', 'Karyawan Swasta', '20/08/2022', 'DEPOK', 'HOERUDIN/SAMI', '-', ' ', ' ', '-', '2022-08-28 18:40:31', NULL, 'PENDING', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Surat KK', '3222/28/VIII/2022', 'Waisul Kurni', 'Kp. Duren baru No.32', '004', '16920', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', 'Jawa Barat', '1', 'Waisul Kurni', 'L', 'Kepala keluarga', 'Bogor', '29/06/2000', 'Indonesia', 'Belum Menikah', 'Islam', 'B-', '-', '-', '', ' ', ' ', 'v;', 'Karyawan Swasta', '20/08/2022', 'DEPOK', 'HOERUDIN/SAMI', '-', ' ', ' ', '-', '2022-08-28 18:42:36', 1, 'SELESAI', 1, '3201132906000012', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Surat KK', '2400/9892/VII/2022', 'Waisul Kurni', 'Kp. Duren baru No.32', '004', '16920', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', 'Jawa Barat', '1', 'waisul kurni', 'L', 'kepala keluarga', 'bogor', '29/06/2000', 'indonesia', 'belum menikah', 'islam', 'b-', '', '', 'Strata 1', ' ', '', 'v', 'Karyawan Swasta', '20/08/2022', 'DEPOK', 'HOERUDIN/SAMI', '---', '-', '-', '-', '2022-09-11 08:10:32', 2, 'SELESAI', 1, '3201132906000012', '2', 'Vea S.Z', 'P', 'Adik', 'Bogor', '09/09/2013', 'Indonesia', 'Belum Menikah', 'Islam', 'B-', '-', '-', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Surat KK', NULL, 'Waisul Kurni', 'Kp. Duren baru No.32', '004', '16920', 'SUSUKAN', 'Bojonggede', 'Kabupaten Bogor', 'Jawa Barat', '1', 'waisul kurni', 'L', 'kepala keluarga', 'bogor', '29/06/2000', 'indonesia', 'belum menikah', 'islam', 'b-', '-', '-', '', ' ', ' ', ' ', 'wiraswasta', '01/02/2022', 'depok', 'hoerudin/sami', '-', ' ', ' ', '-', '2022-09-11 08:11:27', NULL, 'PENDING', 1, '3201132906000012', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_ktp`
--

CREATE TABLE `surat_ktp` (
  `id_sktp` int(11) NOT NULL,
  `jenis_surat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_surat` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET latin1 NOT NULL,
  `bukti_ktp` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `bukti_kk` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `keperluan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `masa_berlaku` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_surat` datetime DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) CHARACTER SET latin1 NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_ktp`
--

INSERT INTO `surat_ktp` (`id_sktp`, `jenis_surat`, `no_surat`, `nik`, `bukti_ktp`, `bukti_kk`, `keperluan`, `keterangan`, `masa_berlaku`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(3, 'Surat Pengantar KTP', '', '3201132906000012', '', '320113290600011', '', '', NULL, '2022-08-16 16:53:16', 2, 'SELESAI', 1),
(4, 'Surat Pengantar KTP', '33323123', '3201132906000012', '', '320113290600011', '', '', NULL, '2022-08-17 08:03:34', 2, 'SELESAI', 1),
(5, 'Surat Pengantar KTP', NULL, '3201132906000012', '', '320113290600011', '', '', NULL, '2022-08-28 11:44:30', NULL, 'PENDING', 1),
(6, 'Surat Pengantar KTP', NULL, '3201132906000012', '', '320113290600011', '', '', NULL, '2022-09-11 07:51:23', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_lapor_hajatan`
--

CREATE TABLE `surat_lapor_hajatan` (
  `id_slh` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bukti_ktp` varchar(30) DEFAULT NULL,
  `bukti_kk` varchar(30) DEFAULT NULL,
  `jenis_hajat` varchar(30) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_hiburan` varchar(50) NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `alamat_pemilik` varchar(200) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_lapor_hajatan`
--

INSERT INTO `surat_lapor_hajatan` (`id_slh`, `jenis_surat`, `no_surat`, `nik`, `bukti_ktp`, `bukti_kk`, `jenis_hajat`, `hari`, `tanggal`, `jenis_hiburan`, `pemilik`, `alamat_pemilik`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(4, 'Surat Lapor Hajatan', '71', '3517112233440001', '3517000000000001', '', 'Pernikahan', 'Minggu', '2019-12-15 00:00:00', 'Dangdutan', 'Suwono', 'jl. soto no. 13, rt002/rw003, dusun menturus, desa menturus, kecamatan kudu, kabupaten jombang', '2019-12-14 04:06:40', 1, 'SELESAI', 1),
(5, 'Surat Lapor Hajatan', NULL, '3517112233440001', '3517000000000001', '', 'Pernikahan', 'Minggu', '2019-12-15 00:00:00', 'Dangdutan', 'Suwono', 'jl. soto no. 13, rt002/rw003, dusun menturus, desa menturus, kecamatan kudu, kabupaten jombang', '2019-12-14 04:06:57', NULL, 'PENDING', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pengantar_skck`
--

CREATE TABLE `surat_pengantar_skck` (
  `id_sps` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bukti_ktp` varchar(30) DEFAULT NULL,
  `bukti_kk` varchar(30) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `masa_berlaku` varchar(20) DEFAULT NULL,
  `tanggal_surat` datetime DEFAULT current_timestamp(),
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_pengantar_skck`
--

INSERT INTO `surat_pengantar_skck` (`id_sps`, `jenis_surat`, `no_surat`, `nik`, `bukti_ktp`, `bukti_kk`, `keperluan`, `keterangan`, `masa_berlaku`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`) VALUES
(4, 'Surat Pengantar SKCK', '82', '3517112233440001', '3517000000000001', '', 'Permohonan SKCK', 'Persyaratan Melamar Pekerjaan', NULL, '2019-12-14 04:07:20', 2, 'SELESAI', 1),
(5, 'Surat Pengantar SKCK', NULL, '3517112233440001', '3517000000000001', '', 'Permohonan SKCK', 'Persyaratan Melamar Pekerjaan', NULL, '2019-12-14 04:07:28', NULL, 'PENDING', 1),
(6, 'Surat Pengantar SKCK', '303/50005/VII/2022', '3201132906000012', '3201132906000012', '', 'Permohonan SKCK', 'Pembuatan SKCK', '30 Hari', '2022-07-31 13:23:06', 2, 'SELESAI', 1),
(7, 'Surat Pengantar SKCK', '304/50005/VII/2022', '3201132906000012', '3201132906000012', '321', 'Permohonan Pembuatan SKCK', 'Terlampir', NULL, '2022-07-31 14:18:17', 2, 'SELESAI', 1),
(8, 'Surat Pengantar SKCK', NULL, '3201132906000012', '3201132906000012', '321', 'Permohonan Pembuatan SKCK', 'Melamar Pekerjaan', NULL, '2022-07-31 12:05:50', NULL, 'PENDING', 1),
(9, 'Surat Pengantar SKCK', '11111', '3201132906000012', '3201132906000012', '', 'Permohonan Pembuatan SKCK', 'www', NULL, '2022-08-06 23:11:35', 2, 'SELESAI', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  ADD PRIMARY KEY (`id_pejabat_desa`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`,`nik`),
  ADD KEY `idx_id_penduduk` (`id_penduduk`);

--
-- Indeks untuk tabel `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indeks untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id_profil_desa`);

--
-- Indeks untuk tabel `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  ADD PRIMARY KEY (`id_skbb`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indeks untuk tabel `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  ADD PRIMARY KEY (`id_skd`);

--
-- Indeks untuk tabel `surat_keterangan_domisili_tempat_tinggal`
--
ALTER TABLE `surat_keterangan_domisili_tempat_tinggal`
  ADD PRIMARY KEY (`id_skdtt`);

--
-- Indeks untuk tabel `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  ADD PRIMARY KEY (`id_skkkb`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indeks untuk tabel `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  ADD PRIMARY KEY (`id_skp`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indeks untuk tabel `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indeks untuk tabel `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  ADD PRIMARY KEY (`id_sku`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- Indeks untuk tabel `surat_kk`
--
ALTER TABLE `surat_kk`
  ADD PRIMARY KEY (`id_skk`);

--
-- Indeks untuk tabel `surat_ktp`
--
ALTER TABLE `surat_ktp`
  ADD PRIMARY KEY (`id_sktp`),
  ADD UNIQUE KEY `id_sktp` (`id_sktp`),
  ADD KEY `id_profil_desa` (`id_profil_desa`),
  ADD KEY `id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  ADD PRIMARY KEY (`id_slh`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_nik` (`nik`);

--
-- Indeks untuk tabel `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  ADD PRIMARY KEY (`id_sps`),
  ADD KEY `idx_nik` (`nik`),
  ADD KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  ADD KEY `idx_id_profil_desa` (`id_profil_desa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pejabat_desa`
--
ALTER TABLE `pejabat_desa`
  MODIFY `id_pejabat_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id_profil_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  MODIFY `id_skbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_domisili_tempat_tinggal`
--
ALTER TABLE `surat_keterangan_domisili_tempat_tinggal`
  MODIFY `id_skdtt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  MODIFY `id_skkkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  MODIFY `id_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_kk`
--
ALTER TABLE `surat_kk`
  MODIFY `id_skk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_ktp`
--
ALTER TABLE `surat_ktp`
  MODIFY `id_sktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  MODIFY `id_slh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  MODIFY `id_sps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD CONSTRAINT `surat_keterangan_ibfk_1` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  ADD CONSTRAINT `surat_keterangan_berkelakuan_baik_ibfk_1` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keterangan_berkelakuan_baik_ibfk_2` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  ADD CONSTRAINT `surat_keterangan_kepemilikan_kendaraan_bermotor_ibfk_1` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  ADD CONSTRAINT `surat_keterangan_perhiasan_ibfk_1` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  ADD CONSTRAINT `surat_keterangan_usaha_ibfk_1` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keterangan_usaha_ibfk_2` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `surat_ktp`
--
ALTER TABLE `surat_ktp`
  ADD CONSTRAINT `surat_ktp_ibfk_1` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_ktp_ibfk_2` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`);

--
-- Ketidakleluasaan untuk tabel `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  ADD CONSTRAINT `surat_lapor_hajatan_ibfk_1` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_lapor_hajatan_ibfk_2` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  ADD CONSTRAINT `surat_pengantar_skck_ibfk_1` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
