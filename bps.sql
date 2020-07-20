-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2020 pada 08.19
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bc_quran`
--

CREATE TABLE `bc_quran` (
  `id` int(11) NOT NULL,
  `id_user` int(128) NOT NULL,
  `awal_surah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_ayat` int(128) NOT NULL,
  `akhir_surah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akhir_ayat` int(128) NOT NULL,
  `baris_kolom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bc_quran`
--

INSERT INTO `bc_quran` (`id`, `id_user`, `awal_surah`, `awal_ayat`, `akhir_surah`, `akhir_ayat`, `baris_kolom`) VALUES
(14, 4, 'Albaqarah', 1, 'Albaqarah', 3, '13'),
(24, 4, 'Al-Fatihah', 7, 'Al-Kahf', 1, '22'),
(25, 4, 'Al-Fatihah', 1, 'Al-Qamar', 54, '23'),
(27, 4, 'Al-Fatihah', 1, 'Al-Baqarah', 1, '12'),
(28, 1, 'Al-Fatihah', 1, 'Al-Baqarah', 6, '11'),
(29, 1, 'Al-Hijr', 1, 'At-Tur', 1, '86');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_kelas`
--

CREATE TABLE `daftar_kelas` (
  `id` int(11) NOT NULL,
  `tingkat` int(3) NOT NULL,
  `fakultas` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_kelas`
--

INSERT INTO `daftar_kelas` (`id`, `tingkat`, `fakultas`, `jurusan`, `prodi`, `kelas`, `semester`) VALUES
(1, 1, 'TEKNIK', '', '', '', 'Ganjil'),
(2, 2, 'TEKNIK', 'Pendidikan Teknik Elektro', '', '', 'Ganjil'),
(3, 2, 'TEKNIK', 'Pendidikan Teknologi Pertanian', '', '', 'Ganjil'),
(4, 3, 'TEKNIK', 'Pendidikan Teknik Elektro', 'Pendidikan Teknik Infomatika dan Komputer (S1)', '', 'Ganjil'),
(5, 1, 'MIPA', '', '', '', 'Ganjil'),
(8, 1, 'BAHASA DAN SASTRA', '', '', '', 'Ganjil'),
(9, 2, 'MIPA', 'Pendidikan Matematika', '', '', 'Ganjil'),
(10, 3, 'MIPA', 'Pendidikan Matematika', 'Pendidikan Matematika (S1)', '', ''),
(11, 4, 'MIPA', 'Pendidikan Matematika', 'Pendidikan Matematika (S1)', 'MTK D', ''),
(12, 4, 'MIPA', 'Pendidikan Matematika', 'Pendidikan Matematika (S1)', 'MTK B', ''),
(14, 4, 'TEKNIK', 'Pendidikan Teknik Elektro', 'Pendidikan Teknik Infomatika dan Komputer (S1)', 'PTIK A', 'Ganjil'),
(15, 4, 'TEKNIK', 'Pendidikan Teknik Elektro', 'Pendidikan Teknik Infomatika dan Komputer (S1)', 'PTIK B', 'Ganjil'),
(19, 3, 'TEKNIK', 'Pendidikan Teknologi Pertanian', 'Pendidikan Teknologi Pertanian (S1)', '', 'Genap'),
(21, 2, 'BAHASA DAN SASTRA', 'Pendidikan Bahasa Inggris', '', '', 'Ganjil'),
(22, 3, 'BAHASA DAN SASTRA', 'Pendidikan Bahasa Inggris', 'Pendidikan Bahasa Inggris (S1)', '', 'Ganjil'),
(27, 2, 'TEKNIK', 'Pendidikan Teknik Elektronika', '', '', ''),
(28, 3, 'TEKNIK', 'Pendidikan Teknik Elektronika', 'Teknik Elektronika (DIII)', '', 'Ganjil'),
(29, 3, 'TEKNIK', 'Pendidikan Teknik Elektronika', 'Pendidikan Teknik Elektronika (S1)', '', 'Ganjil'),
(30, 3, 'TEKNIK', 'Pendidikan Teknik Elektro', 'Pendidikan Teknik Elektro (S1)', '', 'Ganjil'),
(31, 3, 'TEKNIK', 'Pendidikan Teknik Elektro', 'Teknik Elektro (DIII)', '', 'Ganjil'),
(32, 2, 'TEKNIK', 'Pendidikan Otomotif', '', '', ''),
(33, 3, 'TEKNIK', 'Pendidikan Otomotif', 'Teknik Otomotif (DIII)', '', 'Ganjil'),
(34, 3, 'TEKNIK', 'Pendidikan Otomotif', 'Pendidikan Teknik Otomotif (S1)', '', 'Ganjil'),
(35, 2, 'TEKNIK', 'Teknik Komputer', '', '', ''),
(36, 3, 'TEKNIK', 'Teknik Komputer', 'Teknik Komputer (S1)', '', 'Genap'),
(39, 1, 'SENI', '', '', '', ''),
(44, 4, 'TEKNIK', 'Pendidikan Teknik Elektro', 'Pendidikan Teknik Infomatika dan Komputer (S1)', 'PTIK C', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dosen`
--

CREATE TABLE `data_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_dosen`
--

INSERT INTO `data_dosen` (`id`, `id_user`, `nip`, `nama`, `telp`, `alamat`) VALUES
(4, 48, 123, 'Kordosen', '089965414582', 'Kabupaten Gowa'),
(12, 56, 111, 'Dosen', '1111', 'gowa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_halaqah`
--

CREATE TABLE `data_halaqah` (
  `id` int(11) NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tutor` int(255) NOT NULL,
  `tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_halaqah`
--

INSERT INTO `data_halaqah` (`id`, `id_kelas`, `level`, `jk`, `id_tutor`, `tahun`) VALUES
(1, '14', 'A', 'P', 5, 2020),
(2, '14', 'B', 'P', 3, 2020),
(3, '14', 'A', 'L', 2, 2020),
(4, '14', 'B', 'L', 4, 2020),
(5, '12', 'sal', 'L', 0, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_quran`
--

CREATE TABLE `data_quran` (
  `id` int(11) NOT NULL,
  `no_surah` int(128) NOT NULL,
  `nama_surah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_ayat` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_quran`
--

INSERT INTO `data_quran` (`id`, `no_surah`, `nama_surah`, `jumlah_ayat`) VALUES
(1, 1, 'Al-Fatihah', 7),
(2, 2, 'Al-Baqarah', 286),
(3, 3, 'Al-Imran', 200),
(4, 4, 'An-Nisa', 176),
(5, 5, 'Al-Maidah', 120),
(6, 6, 'Al-An\'am', 165),
(7, 7, 'Al-A\'raf', 206),
(8, 8, 'Al-Anfal', 75),
(9, 9, 'At-Taubah', 129),
(10, 10, 'Yunus', 109),
(11, 11, 'Hud', 123),
(12, 12, 'Yusuf', 111),
(13, 13, 'Ar-Ra\'d', 43),
(14, 14, 'Ibrahim', 52),
(15, 15, 'Al-Hijr', 99),
(16, 16, 'An-Nahl', 128),
(17, 17, 'Al-Isra', 111),
(18, 18, 'Al-Kahf', 110),
(19, 19, 'Maryam', 98),
(20, 20, 'Taha', 135),
(21, 21, 'Al-Anbiya', 112),
(22, 22, 'Al-Hajj', 78),
(23, 23, 'Al-Mu\'minun', 118),
(24, 24, 'An-Nur', 64),
(25, 25, 'Al-Furqan', 77),
(26, 26, 'Asy-Syu\'ara', 227),
(27, 27, 'An-Naml', 93),
(28, 28, 'Al-Qasas', 88),
(29, 29, 'Al-\'Ankabut', 69),
(30, 30, 'Ar-Rum', 60),
(31, 31, 'Luqman', 34),
(32, 32, 'As-Sajdah', 30),
(33, 33, 'Al-Ahzab', 73),
(34, 34, 'Saba\'', 54),
(35, 35, 'Fatir', 45),
(36, 36, 'Yasin', 83),
(37, 37, 'As-Saffat', 182),
(38, 38, 'Sad', 88),
(39, 39, 'Az-Zumar', 75),
(40, 40, 'Gafir', 85),
(41, 41, 'Fussilat', 54),
(42, 42, 'Asy-Syura', 53),
(43, 43, 'Az-Zukhruf', 89),
(44, 44, 'Ad-Dukhan', 59),
(45, 45, 'Al-Jasiyah', 34),
(46, 46, 'Al-Ahqaf', 35),
(47, 47, 'Muhammad', 38),
(48, 48, 'Al-Fath', 29),
(49, 49, 'Al-Hujarat', 18),
(50, 50, 'Qaf', 45),
(51, 51, 'Az-Zariyat', 60),
(52, 52, 'At-Tur', 49),
(53, 53, 'An-Najm', 62),
(54, 54, 'Al-Qamar', 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tutor`
--

CREATE TABLE `data_tutor` (
  `id` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `nama` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(99) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_halaqah` int(99) NOT NULL,
  `id_user` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_tutor`
--

INSERT INTO `data_tutor` (`id`, `nim`, `nama`, `telp`, `id_prodi`, `alamat`, `id_halaqah`, `id_user`) VALUES
(2, 1629041033, 'korbps_ikhwah', '089965414582', 0, 'Kabupaten Gowa', 0, 52),
(3, 0, 'korbps_akhwat', '', 4, '', 0, 53),
(4, 0, 'korfak_ikhwah', '', 4, '', 0, 54),
(5, 123, 'korfak_akhwat', '', 4, '', 0, 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` int(128) NOT NULL,
  `id_kelas` int(120) NOT NULL,
  `id_halaqah` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `telp`, `jk`, `angkatan`, `id_kelas`, `id_halaqah`) VALUES
(1, '1629041033', 'Abdussalam', '0899', 'L', 2020, 14, 3),
(2, '1629042031', 'fulanah', '0899', 'P', 2020, 14, 1),
(3, '1629041033', 'fulan', '99982', 'L', 2020, 14, 3),
(4, '1829042031', 'fifi', '1111', 'P', 2020, 14, 2),
(5, '1233', 'alam', '', 'L', 2020, 14, 3),
(7, '1', 'abdus salam', '213', 'L', 2020, 14, 4),
(8, '99', 'kakak', '', 'L', 2020, 14, 4),
(9, '123', 'Salam', '999', 'L', 2020, 15, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sains`
--

CREATE TABLE `nilai_sains` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(255) NOT NULL,
  `pre_test` int(10) NOT NULL,
  `tugas` int(10) NOT NULL,
  `kehadiran` int(10) NOT NULL,
  `mid` int(10) NOT NULL,
  `final_test` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_sains`
--

INSERT INTO `nilai_sains` (`id`, `id_mahasiswa`, `pre_test`, `tugas`, `kehadiran`, `mid`, `final_test`) VALUES
(1, 2, 89, 0, 0, 0, 0),
(2, 1, 92, 0, 0, 0, 0),
(3, 4, 0, 0, 0, 0, 0),
(4, 7, 0, 80, 79, 77, 70),
(5, 8, 0, 90, 80, 90, 0),
(6, 3, 44, 90, 90, 90, 90),
(7, 5, 85, 0, 0, 0, 0),
(8, 9, 91, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `jk`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'admin', 'L', 'admin', 'salamabdus072@gmail.com', 'WIN_20191210_07_38_56_Pro.jpg', '$2y$10$oaFIxxdl2RHUBiVOSFWwiOOe8Wu8pl8FO457C3eqDMORaWcCXbGPq', 1, 1, 1591800123),
(48, 'Kordosen', 'L', 'kordosen', 'kordosen@gmail.com', 'default.jpg', '$2y$10$HUI5NnuFWoLe34I.sc/mYOdBmIFOZl1V4PxPJJl02sALN6XgjxOOy', 2, 1, 1592231747),
(52, 'korbps_ikhwah', 'L', 'korbps_ikhwah', 'korbps_ikhwah@gmail.com', 'default.jpg', '$2y$10$oaZtdJltP7wbwjm6MlMwVuptZXkJYAp195E6pdk45YQL/RU2.InhW', 3, 1, 1592232084),
(53, 'korbps_akhwat', 'P', 'korbps_akhwat', 'korbps_akhwat@gmail.com', 'defaultp.jpg', '$2y$10$F8DkG48cWy/ybXa/PlIj9eLRl95tjgS7XHBlcPyjwEI9k2MjVXluq', 3, 1, 1592232118),
(54, 'korfak_ikhwah', 'L', 'korfak_ikhwah', 'korfak_ikhwah@gmail.com', 'default.jpg', '$2y$10$ukyIBzuqxwml7B/0jyuZvOqom9Z2qgLIjTcsnpuibjwjabk13vkOO', 7, 1, 1592232252),
(55, 'korfak_akhwat', 'P', 'korfak_akhwat', 'korfak_akhwat@gmail.com', 'defaultp.jpg', '$2y$10$zUPzkExlNSIeOQqUYiZrvumlB9PcO2lELo8ji0D6MfxCbchzGh8.i', 7, 1, 1592232288),
(56, 'Dosen', 'L', 'dosen', 'dosen@gmail.com', 'default.jpg', '$2y$10$s3jgCEhfDCcZ2AmyT1qWB.HCLKL3cVjWZ8Fpycc/kcCr1JFub5hLG', 6, 1, 1592232781);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(7, 8, 2),
(8, 8, 4),
(24, 1, 2),
(26, 7, 6),
(30, 2, 9),
(31, 2, 7),
(32, 3, 6),
(33, 3, 7),
(34, 3, 8),
(35, 3, 9),
(38, 4, 9),
(40, 5, 6),
(41, 5, 7),
(42, 5, 8),
(43, 5, 9),
(44, 6, 9),
(45, 7, 8),
(46, 5, 3),
(47, 2, 3),
(48, 3, 3),
(49, 4, 3),
(50, 6, 3),
(51, 7, 3),
(52, 2, 6),
(54, 1, 10),
(55, 1, 3),
(56, 1, 6),
(57, 1, 7),
(58, 1, 8),
(59, 1, 9),
(60, 7, 7),
(61, 6, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu'),
(3, 'User'),
(6, 'Ujian'),
(7, 'Administrasi'),
(8, 'Binaan'),
(9, 'Nilai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Kordinator Mata Kuliah Agama'),
(3, 'Kordinator BPS UNM'),
(4, 'Kordinator Dosen Fakultas'),
(5, 'Pengurus BPS UNM'),
(6, 'Dosen'),
(7, 'Kordinator Fakultas SAINS'),
(8, 'Tutor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Menu', 'menu', 'fas fa-fw fa-folder', 1),
(4, 2, 'Sub Menu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 3, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(8, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Daftar User', 'admin/daftaruser', 'fas fa-fw fa-user', 1),
(11, 7, 'Daftar Kelas', 'administrasi', 'fas fa-fw fa-building', 1),
(12, 7, 'Daftar Dosen', 'dosen', 'fas fa-fw fa-user-tie', 1),
(13, 7, 'Daftar Tutor', 'tutor', 'fas fa-fw fa-chalkboard-teacher', 1),
(16, 7, 'Daftar Halaqah', 'halaqah', 'fas fa-fw fa-chalkboard', 1),
(17, 6, 'Ujian SAINS', 'ujian', 'fas fa-fw fa-book-open', 1),
(18, 8, 'Halaqah Binaan', 'Binaan', 'fas fa-fw fa-book-reader', 1),
(19, 9, 'Data Nilai', 'nilai', 'fas fa-fw fa-clipboard', 1),
(20, 10, 'Baca Qur\'an', 'quran', 'fas fa-fw fa-book-open', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'salamabdus072@gmail.com', 'ZdNjWjZT1ajSknT49KInzuA3hspo27Cn2u4Kajj386M=', 1592816897),
(2, 'salamabdus072@gmail.com', 'NbKEtimImkJKPF6amiH/0NI/gy/VS8wMOm89hHevlb4=', 1592816914),
(3, 'salamabdus072@gmail.com', 'A3oXKLM1U53fGWgjk6EbEYWll+uIMf3khxROHF7nslQ=', 1592817267),
(4, 'salamabdus072@gmail.com', 'k2cX0/cn6xMJZGLeMHgw1aXCQL4Pls3yesqtYeei1D4=', 1593754392);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bc_quran`
--
ALTER TABLE `bc_quran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_halaqah`
--
ALTER TABLE `data_halaqah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_quran`
--
ALTER TABLE `data_quran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tutor`
--
ALTER TABLE `data_tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_sains`
--
ALTER TABLE `nilai_sains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bc_quran`
--
ALTER TABLE `bc_quran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `data_dosen`
--
ALTER TABLE `data_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_halaqah`
--
ALTER TABLE `data_halaqah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_quran`
--
ALTER TABLE `data_quran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `data_tutor`
--
ALTER TABLE `data_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nilai_sains`
--
ALTER TABLE `nilai_sains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
