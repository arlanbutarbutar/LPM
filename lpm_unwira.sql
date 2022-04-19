-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2021 pada 10.44
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
-- Database: `lpm_unwira`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'FAKULTAS EKONOMI DAN BISNIS'),
(2, 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN'),
(3, 'FAKULTAS TEKNIK'),
(4, 'FAKULTAS ILMU SOSIAL DAN ILMU POLITIK'),
(5, 'FAKULTAS HUKUM'),
(6, 'FAKULTAS FILSAFAT'),
(7, 'FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM'),
(8, 'PROGRAM MAGISTER'),
(9, 'UNIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpm_data1_doc`
--

CREATE TABLE `lpm_data1_doc` (
  `id_data1` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `data_doc` varchar(100) NOT NULL,
  `date_created` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpm_data2_doc`
--

CREATE TABLE `lpm_data2_doc` (
  `id_data2` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `data_doc` varchar(100) NOT NULL,
  `date_created` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lpm_data2_doc`
--

INSERT INTO `lpm_data2_doc` (`id_data2`, `id_user`, `id_doc`, `data_doc`, `date_created`) VALUES
(18, 2, 1, '1_0_Peraturan BAN-PT No. 5 Tahun 2019- Instrumen APS.pdf', 'Sunday, 18 Jul 2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpm_doc`
--

CREATE TABLE `lpm_doc` (
  `id_doc` int(11) NOT NULL,
  `documen` varchar(150) NOT NULL,
  `dns` varchar(100) NOT NULL,
  `id_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lpm_doc`
--

INSERT INTO `lpm_doc` (`id_doc`, `documen`, `dns`, `id_access`) VALUES
(1, 'Peraturan Pemerintah', 'Peraturan-Pemerintah', 1),
(2, 'Peraturan Yayasan', 'Peraturan-Yayasan', 1),
(3, 'Pedoman - SK Rektor', 'Pedoman-SK-Rektor', 1),
(4, 'Lembar Kinerja Program Studi dan PT', 'Lembar-Kinerja-Program-Studi-dan-PT', 2),
(5, 'Lembar Evaluasi Diri PS dan PT', 'Lembar-Evaluasi-Diri-PS-dan-PT', 2),
(6, 'Beban Kinerja Dosen', 'Beban-Kinerja-Dosen', 2),
(7, 'Laporan Kinerja Pegawai', 'Laporan-Kinerja-Pegawai', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpm_doc_access`
--

CREATE TABLE `lpm_doc_access` (
  `id_access` int(11) NOT NULL,
  `access` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lpm_doc_access`
--

INSERT INTO `lpm_doc_access` (`id_access`, `access`) VALUES
(1, 'Bukan Prodi (Program Studi)'),
(2, 'Prodi (Program Studi)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `prodi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `prodi`) VALUES
(1, 1, 'Ekonomi Pembangunan'),
(2, 1, 'Manajemen'),
(3, 1, 'Akuntansi'),
(4, 2, 'Bimbingan dan Konseling'),
(5, 2, 'Pendidikan Bahasa Inggris'),
(6, 2, 'Pendidikan Matematika'),
(7, 2, 'Pendidikan Biologi'),
(8, 2, 'Pendidikan Kimia'),
(9, 2, 'Pendidikan Fisika'),
(10, 2, 'Pendidikan Musik'),
(11, 3, 'Teknik Sipil'),
(12, 3, 'Arsitektur'),
(13, 3, 'Ilmu Komputer'),
(14, 4, 'Ilmu Pemerintahan'),
(15, 4, 'Administrasi Publik'),
(16, 4, 'Ilmu Komunikasi'),
(17, 5, 'Hukum'),
(18, 6, 'Ilmu Filsafat'),
(19, 7, 'Kimia'),
(20, 7, 'Biologi'),
(21, 8, 'Konsentrasi Manajemen Sumber Daya Manusia'),
(22, 8, 'Konsentrasi Manajemen Keuangan Perusahaan'),
(23, 8, 'Konsentrasi Manajemen Pemasaran'),
(24, 8, 'Konsentrasi Manajemen Pendidikan'),
(25, 8, 'Konsentrasi Keuangan Daerah'),
(26, 8, 'Konsentrasi Manajemen Rumah Sakit'),
(27, 9, 'LPM'),
(28, 9, 'LPPM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `schedule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 4,
  `id_active` int(11) NOT NULL DEFAULT 2,
  `id_access` int(11) NOT NULL DEFAULT 1,
  `id_prodi` int(11) NOT NULL,
  `nidn` int(25) NOT NULL,
  `img` varchar(75) NOT NULL DEFAULT 'default.png',
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_active`, `id_access`, `id_prodi`, `nidn`, `img`, `username`, `email`, `password`, `date_created`) VALUES
(2, 1, 1, 1, 27, 23118036, 'default.png', 'Sahala Zakaria Recardo Butar Butar', 'arlan270899@gmail.com', '$2y$10$hA7DjwZemlDff92Z6nGGVO8e4pMjAXrfwo9bEXdx07ej/o.q5klQi', 'Tuesday, 27 Apr 2021'),
(6, 1, 1, 1, 27, 1, 'default.png', 'admin', 'admin@gmail.com', '$2y$10$Kx7ksyqF.igB6RcIG/FWaeSm4hku9p/H2g32D.Iey8FrO.zYIC7l6', 'Thursday, 20 May 2021'),
(7, 2, 1, 1, 27, 2, 'default.png', 'pegawai lpm', 'lpm@gmail.com', '$2y$10$zDaUOxefaHyRNaWZz8KuEedXgsPQpSvs2kPnNTLqTEoHXYHLpHM3C', 'Thursday, 20 May 2021'),
(8, 3, 1, 1, 13, 3, 'default.png', 'dosen', 'dosen@gmail.com', '$2y$10$vVo.UDPYtaLa9Fkb3BFQtezvzn7S2HOfj4iGviSZBZpksEPDIw5AO', 'Thursday, 20 May 2021'),
(9, 4, 1, 1, 17, 4, 'default.png', 'user', 'user@gmail.com', '$2y$10$hKiGKJCu3MQma.SP0uGDJ.5ydqkU42ldlU9O60bbNJpk2rNcRhauC', 'Thursday, 20 May 2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_access`
--

CREATE TABLE `users_access` (
  `id_access` int(11) NOT NULL,
  `access` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_access`
--

INSERT INTO `users_access` (`id_access`, `access`) VALUES
(1, 'Access'),
(2, 'Not Access');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_active`
--

CREATE TABLE `users_active` (
  `id_active` int(11) NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_active`
--

INSERT INTO `users_active` (`id_active`, `active`) VALUES
(1, 'Active'),
(2, 'Not Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pegawai LPM'),
(3, 'Dosen/Pegawai'),
(4, 'Users');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `lpm_data1_doc`
--
ALTER TABLE `lpm_data1_doc`
  ADD PRIMARY KEY (`id_data1`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lpm_data2_doc`
--
ALTER TABLE `lpm_data2_doc`
  ADD PRIMARY KEY (`id_data2`),
  ADD KEY `id_doc` (`id_doc`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lpm_doc`
--
ALTER TABLE `lpm_doc`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `access` (`id_access`);

--
-- Indeks untuk tabel `lpm_doc_access`
--
ALTER TABLE `lpm_doc_access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_access` (`id_access`),
  ADD KEY `id_active` (`id_active`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `users_access`
--
ALTER TABLE `users_access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `users_active`
--
ALTER TABLE `users_active`
  ADD PRIMARY KEY (`id_active`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `lpm_data1_doc`
--
ALTER TABLE `lpm_data1_doc`
  MODIFY `id_data1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `lpm_data2_doc`
--
ALTER TABLE `lpm_data2_doc`
  MODIFY `id_data2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `lpm_doc`
--
ALTER TABLE `lpm_doc`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `lpm_doc_access`
--
ALTER TABLE `lpm_doc_access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users_access`
--
ALTER TABLE `users_access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_active`
--
ALTER TABLE `users_active`
  MODIFY `id_active` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lpm_data1_doc`
--
ALTER TABLE `lpm_data1_doc`
  ADD CONSTRAINT `lpm_data1_doc_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lpm_data1_doc_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `lpm_doc` (`id_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lpm_data1_doc_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lpm_data2_doc`
--
ALTER TABLE `lpm_data2_doc`
  ADD CONSTRAINT `lpm_data2_doc_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `lpm_doc` (`id_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lpm_data2_doc_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lpm_doc`
--
ALTER TABLE `lpm_doc`
  ADD CONSTRAINT `lpm_doc_ibfk_1` FOREIGN KEY (`id_access`) REFERENCES `lpm_doc_access` (`id_access`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_access`) REFERENCES `users_access` (`id_access`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `users_active` (`id_active`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
