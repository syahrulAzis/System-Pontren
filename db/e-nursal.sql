-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Mar 2022 pada 18.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-nursal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_santri`
--

CREATE TABLE `bank_santri` (
  `id_transaksi` varchar(255) NOT NULL,
  `tipe_kas` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `user_bank` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` int(255) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_santri`
--

INSERT INTO `bank_santri` (`id_transaksi`, `tipe_kas`, `nisn`, `user_bank`, `kelas`, `keterangan`, `nominal`, `tgl_transaksi`) VALUES
('29032022-1486', 'masuk', '123323', 'Ilham Ahmadi', '10', 'Pemasukan Tes', 300000, '2022-03-29 00:00:00'),
('29032022-9482', 'masuk', '123325', 'Raudhatul Fatihah2019', '10', 'Pemasukan Tes', 300000, '2022-03-29 00:00:00');

--
-- Trigger `bank_santri`
--
DELIMITER $$
CREATE TRIGGER `after_bank_santri_insert` AFTER INSERT ON `bank_santri` FOR EACH ROW BEGIN
	DECLARE id_jurnal INT;
         INSERT INTO jurnal(id_transaksi,nisn,user_bank,kelas, keterangan,tgl_transaksi)
        VALUES(NEW.id_transaksi,NEW.nisn,NEW.user_bank,NEW.kelas,NEW.keterangan,NEW.tgl_transaksi);
				

    select id INTO id_jurnal
    from jurnal where id_transaksi=NEW.id_transaksi;
		
    IF NEW.tipe_kas = 'keluar' THEN
		 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,NEW.nominal,0);
				ELSE
				 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,0,NEW.nominal);
		END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `user_bank` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id`, `nisn`, `id_transaksi`, `user_bank`, `kelas`, `keterangan`, `tgl_transaksi`) VALUES
(23, '123323', '29032022-1486', 'Ilham Ahmadi', '10', 'Pemasukan Tes', '2022-03-29 00:00:00'),
(24, '123325', '29032022-9482', 'Raudhatul Fatihah2019', '10', 'Pemasukan Tes', '2022-03-29 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id` int(11) NOT NULL,
  `id_jurnal` varchar(255) NOT NULL,
  `kredit` int(255) NOT NULL,
  `debit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurnal_detail`
--

INSERT INTO `jurnal_detail` (`id`, `id_jurnal`, `kredit`, `debit`) VALUES
(23, '23', 0, 300000),
(24, '24', 0, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_syahriah`
--

CREATE TABLE `pembayaran_syahriah` (
  `id` int(11) NOT NULL,
  `nisn` varchar(128) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `total_tagihan` varchar(125) NOT NULL,
  `batas_pembayaran` varchar(125) NOT NULL,
  `total_telah_dibayar` varchar(125) NOT NULL,
  `sisa_tagihan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran_syahriah`
--

INSERT INTO `pembayaran_syahriah` (`id`, `nisn`, `user_id`, `kelas`, `total_tagihan`, `batas_pembayaran`, `total_telah_dibayar`, `sisa_tagihan`) VALUES
(44, '123322', 'Desa Jaya', '10', '750000', '2022-03-26', '750000', 'Telah dibayar'),
(45, '123322', 'Desa Jaya', '10', '750000', '2022-03-26', '750000', 'Telah dibayar'),
(46, '123325', 'Raudhatul Fatihah', '10', '750000', '2022-03-29', '750000', 'Telah dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `nisn`, `kelas`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(14, 'Syahrul Azis', 'stafflp3m@gmail.com', 123321, '10', 'default.png', '$2y$10$06JadP6o7RhpHgn5QvP48uNyScWKbZRZ2Vmxaj9h7ECJeHOzlNPj.', 1, 1, 1648300569),
(15, 'Siti Nurfadilah', 'desajaya2020@gmail.com', 123322, '10', 'default.png', '$2y$10$W/5/oN9CrjRE.xXNJ4Cp4.5r8ft6/3iruDira6JK4OdduKsXoM26a', 2, 1, 1648300702),
(16, 'Ilham Ahmadi', 'iam.ilhamhadi@gmail.com', 123323, '10', 'default.png', '$2y$10$kdLiORUYDWyS9/Vhv4KSO.kdyI0Wv1SawTHCFoClbmEWVgepTbnZe', 2, 1, 1648457842),
(17, 'Azis Syahrul', 'syahrulazis278@gmail.com', 123324, '10', 'default.png', '$2y$10$VGYGxG5rfOGFKN757lQTC.EHCUwasTWCWLDWI4l4sv1Ojf7OTNYvK', 2, 1, 1648457875),
(18, 'Raudhatul Fatihah2019', 'syahrulazis2018@yahoo.com', 123325, '10', 'Azis.png', '$2y$10$xDDVFb/OXknqL30NzwVyTeGr0gMNuRVn0akchVcvpa38bAEXj9Ihy', 2, 1, 1648457914);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(16, 5, 2),
(17, 5, 3),
(19, 2, 15),
(23, 1, 16),
(24, 1, 3),
(25, 1, 2),
(27, 1, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(15, 'Finance'),
(16, 'Admin_Finance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(12, 1, 'Role', 'admin/role', 'fas fa-fw fa-list-alt', 1),
(17, 15, 'Pembayaran Syahriah', 'finance', 'fas fa-fw fa-hand-holding-usd', 1),
(18, 16, 'Management Syahriah', 'adminFinance', 'fas fa-fw fa-money', 1),
(21, 15, 'Bank Santri', 'finance/bankSantri', 'fas fa-fw fa-wallet', 1),
(22, 16, 'Bank Santri Management', 'adminFinance/bankSantriManagement', 'fas fa-fw fa-donate', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_santri`
--
ALTER TABLE `bank_santri`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_syahriah`
--
ALTER TABLE `pembayaran_syahriah`
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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_syahriah`
--
ALTER TABLE `pembayaran_syahriah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
