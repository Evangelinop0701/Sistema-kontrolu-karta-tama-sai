-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2024 pada 05.07
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_diresaun`
--

CREATE TABLE `t_diresaun` (
  `id_diresaun` int(11) NOT NULL,
  `diresaun` text NOT NULL,
  `chefe_diresaun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_diresaun`
--

INSERT INTO `t_diresaun` (`id_diresaun`, `diresaun`, `chefe_diresaun`) VALUES
(1, 'Diresaun Finansas', 'Cristiano Ronaldo'),
(2, 'Diresaun Logistic', 'Clarinho Fernandes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_funsionario`
--

CREATE TABLE `t_funsionario` (
  `id_funsionario` int(11) NOT NULL,
  `naran_fun` varchar(150) NOT NULL,
  `sexu` enum('Mane','Feto') NOT NULL,
  `data_moris` date NOT NULL,
  `no_tlf` char(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_posisaun` int(11) NOT NULL,
  `departemetu` varchar(100) NOT NULL,
  `data_hahu_ser` date NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_suku` int(11) NOT NULL,
  `status_servisu` varchar(50) NOT NULL,
  `enderesu` varchar(250) NOT NULL,
  `estadu_sivil` varchar(50) NOT NULL,
  `albilidade_lite` text NOT NULL,
  `perfil_servisu` text NOT NULL,
  `areas_formasaun` text NOT NULL,
  `salrio` varchar(30) NOT NULL,
  `esperensia_servisu` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_funsionario`
--

INSERT INTO `t_funsionario` (`id_funsionario`, `naran_fun`, `sexu`, `data_moris`, `no_tlf`, `email`, `id_posisaun`, `departemetu`, `data_hahu_ser`, `id_periodo`, `id_suku`, `status_servisu`, `enderesu`, `estadu_sivil`, `albilidade_lite`, `perfil_servisu`, `areas_formasaun`, `salrio`, `esperensia_servisu`, `foto`) VALUES
(7, 'Evangelino Soares Saldanha', 'Mane', '2001-08-02', '77777777', 'example@gmail.com', 1, 'PAM', '2024-08-05', 1, 1, 'Ativo', 'erewrew', 'Kassadu', 'fdfsfsfsd', 'Permanente', 'fdsfsf', '43434', 'cxvxvxcv', '66c408265329d-WhatsApp Image 2024-07-29 at 13.05.2'),
(10, 'Maria Fernandes', 'Mane', '1998-08-03', '77777777', 'ferrosbrifalia@gmail.com', 8, 'PAM', '2024-07-28', 1, 1, 'Ativo', '', '', '', '', '', '', '', ''),
(11, 'Geonaldino Fernandes', 'Mane', '2001-07-31', '77777777', 'ferrosbrifalia@gmail.com', 4, 'PAM', '2024-08-10', 1, 2, 'Ativo', '', '', '', '', '', '', '', ''),
(12, 'Paulino Riveiro', 'Mane', '1985-08-10', '77777777', 'ferrosbrifalia@gmail.com', 3, 'PAM', '2024-08-03', 1, 2, 'Ativo', '', '', '', '', '', '', '', ''),
(13, 'Mario Viana Riveiro', 'Mane', '1989-07-31', '77777777', 'ferrosbrifalia@gmail.com', 2, 'PAM', '2024-08-10', 1, 2, 'Ativo', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karta_sai`
--

CREATE TABLE `t_karta_sai` (
  `id_karta_sai` int(11) NOT NULL,
  `data_karta_sai` date NOT NULL,
  `titlu_karta` varchar(200) NOT NULL,
  `no_reff_sai` varchar(20) NOT NULL,
  `asuntu` text NOT NULL,
  `id_diresaun` int(11) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `id_funsionairo` int(11) NOT NULL,
  `status_karta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_karta_sai`
--

INSERT INTO `t_karta_sai` (`id_karta_sai`, `data_karta_sai`, `titlu_karta`, `no_reff_sai`, `asuntu`, `id_diresaun`, `obs`, `id_funsionairo`, `status_karta`) VALUES
(2, '2024-08-28', 'Tdfdfsf', '123/vff/2024', 'hgfhgf', 2, '', 10, ''),
(3, '2024-01-08', 'Karta Sirkular', '123/vff/2024', 'jdhfak', 2, '', 10, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karta_tama`
--

CREATE TABLE `t_karta_tama` (
  `id_karta_tama` int(11) NOT NULL,
  `data_karta_tama` date NOT NULL,
  `data_karta` date NOT NULL,
  `no_ref` varchar(225) NOT NULL,
  `husi_instituisaun` text NOT NULL,
  `id_diresaun` int(11) NOT NULL,
  `asuntu` text NOT NULL,
  `id_tipu` int(11) NOT NULL,
  `id_funsionario` int(11) NOT NULL,
  `data_despaiso` date DEFAULT NULL,
  `data_arquivo` date DEFAULT NULL,
  `status_karta_des` varchar(225) DEFAULT NULL,
  `status_karta_arkivu` varchar(100) DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_karta_tama`
--

INSERT INTO `t_karta_tama` (`id_karta_tama`, `data_karta_tama`, `data_karta`, `no_ref`, `husi_instituisaun`, `id_diresaun`, `asuntu`, `id_tipu`, `id_funsionario`, `data_despaiso`, `data_arquivo`, `status_karta_des`, `status_karta_arkivu`, `obs`) VALUES
(2, '2024-07-28', '2024-08-01', '192/LIQ/VII/2024', 'Finansas', 1, 'Salario Funsionario', 1, 7, '2024-08-04', '2024-08-04', 'despaiso', 'arquivado', 'Diresaun Logistic'),
(5, '2024-08-02', '2024-08-01', '192/LIQ/VII/2024', 'Postu Likisa', 1, 'sfjijfsfs fsfs fewtreq', 1, 7, '2024-08-04', '2024-08-04', 'despaiso', 'arquivado', 'Diresaun Logistic'),
(6, '2024-08-03', '2024-08-01', '193/LIQ/VII/2024', 'Maubara', 1, 'hau ahai alha hfau kahuae', 1, 7, '2024-08-08', '0000-00-00', 'despaiso', '', 'Diresaun Logistic'),
(10, '2024-08-02', '2024-08-08', '195/LIQ/VII/2024', 'Maubara', 1, 'Funsionario', 2, 7, '2024-08-06', '0000-00-00', 'despaiso', '', 'Diresaun Logistic'),
(15, '2024-08-10', '2024-08-06', 'Reff: 06050/vii/2024', 'Saude', 1, 'fdsfss', 3, 10, '2024-08-08', '0000-00-00', 'despaiso', '', 'Diresaun Logistic'),
(16, '2024-01-04', '2024-08-10', '06050/vii/2024', 'Saude', 2, 'rrwrwr', 2, 10, '0000-00-00', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mun`
--

CREATE TABLE `t_mun` (
  `id_mun` int(11) NOT NULL,
  `naran_mun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_mun`
--

INSERT INTO `t_mun` (`id_mun`, `naran_mun`) VALUES
(1, 'Liquisa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_periodo`
--

CREATE TABLE `t_periodo` (
  `id_periodo` int(11) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `status_periodo` varchar(2) NOT NULL,
  `data_periodo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_periodo`
--

INSERT INTO `t_periodo` (`id_periodo`, `periodo`, `status_periodo`, `data_periodo`) VALUES
(1, '2024-2028', 'Y', '2024-08-07'),
(3, '2028-2029', '', '2024-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_posisaun`
--

CREATE TABLE `t_posisaun` (
  `id_posisaun` int(11) NOT NULL,
  `posisaun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_posisaun`
--

INSERT INTO `t_posisaun` (`id_posisaun`, `posisaun`) VALUES
(1, 'Resepsionista'),
(2, 'Xefe Gabinete'),
(3, 'Presidente Autoridade Munisipal'),
(4, 'Apoio Tekniku'),
(6, 'Asesor Juridiku PAM'),
(7, 'Ofisial  Finansas GAT-PAM'),
(8, 'Sekretaria Gabinete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_postu`
--

CREATE TABLE `t_postu` (
  `id_postu` int(11) NOT NULL,
  `postu` varchar(100) NOT NULL,
  `id_mun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_postu`
--

INSERT INTO `t_postu` (`id_postu`, `postu`, `id_mun`) VALUES
(1, 'Liquisa', 1),
(2, 'Bazartete', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_suku`
--

CREATE TABLE `t_suku` (
  `id_suku` int(11) NOT NULL,
  `suku` varchar(100) NOT NULL,
  `id_postu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_suku`
--

INSERT INTO `t_suku` (`id_suku`, `suku`, `id_postu`) VALUES
(1, 'Lauhata', 1),
(2, 'Maumeta', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tipo_karta`
--

CREATE TABLE `t_tipo_karta` (
  `id_tipo` int(11) NOT NULL,
  `tipo_karta` varchar(100) NOT NULL,
  `deskrisaun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_tipo_karta`
--

INSERT INTO `t_tipo_karta` (`id_tipo`, `tipo_karta`, `deskrisaun`) VALUES
(1, 'Konvite', 'Hello world'),
(2, 'Proposta', '-'),
(3, 'Karta Enkaminamentu', '-'),
(4, 'Karta Akompanhamentu', '-'),
(5, 'Karta Notifikasaun', 'gdgdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `id_funsionario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pas1` varchar(60) NOT NULL,
  `pass2` varchar(60) NOT NULL,
  `data_login` date NOT NULL,
  `level_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `id_funsionario`, `username`, `pas1`, `pass2`, `data_login`, `level_user`) VALUES
(1, 7, 'Evangelino', '$2y$10$YCf9kmUTF5z8..RG0PVSI.Kh7j0fD6QZUt8XX9zk8nsKVGldibbq6', 'password', '2024-08-02', 'Resepsionista'),
(2, 10, 'Maria', '$2y$10$n.EbzOmCQO5vUvq8/XhJ5.bU.hI52K0XB7IPCFuF2t3EuIHsYddce', 'password', '2024-08-03', 'Sekretatria'),
(3, 11, 'Geonaldino', '$2y$10$HtIOt6TTDz8yr3TgMPTiwuHMbNUvZNOcGoWRf95NaffyBBFnSeaba', 'password', '2024-08-03', 'Arkivador'),
(4, 12, 'Paulino', '$2y$10$IOfqaAmFjeMTTAByc8oHCezoH0y3GneHqrJMZnm3a2tgD2erYGqnO', 'password', '2024-08-03', 'Presidente'),
(5, 13, 'Mario', '$2y$10$qcchvp8U12XUZvD.4O1gWOQGivo9GOZIeJpfDeNjxZAcvG73KlnMi', 'password', '2024-08-03', 'Xefe gabinete');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_diresaun`
--
ALTER TABLE `t_diresaun`
  ADD PRIMARY KEY (`id_diresaun`);

--
-- Indeks untuk tabel `t_funsionario`
--
ALTER TABLE `t_funsionario`
  ADD PRIMARY KEY (`id_funsionario`),
  ADD KEY `id_posisaun` (`id_posisaun`),
  ADD KEY `id_periodo` (`id_periodo`),
  ADD KEY `id_suku` (`id_suku`);

--
-- Indeks untuk tabel `t_karta_sai`
--
ALTER TABLE `t_karta_sai`
  ADD PRIMARY KEY (`id_karta_sai`),
  ADD KEY `id_diresaun` (`id_diresaun`),
  ADD KEY `id_funsionairo` (`id_funsionairo`);

--
-- Indeks untuk tabel `t_karta_tama`
--
ALTER TABLE `t_karta_tama`
  ADD PRIMARY KEY (`id_karta_tama`),
  ADD KEY `id_diresaun` (`id_diresaun`),
  ADD KEY `id_tipu` (`id_tipu`),
  ADD KEY `id_funsionario` (`id_funsionario`);

--
-- Indeks untuk tabel `t_mun`
--
ALTER TABLE `t_mun`
  ADD PRIMARY KEY (`id_mun`);

--
-- Indeks untuk tabel `t_periodo`
--
ALTER TABLE `t_periodo`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indeks untuk tabel `t_posisaun`
--
ALTER TABLE `t_posisaun`
  ADD PRIMARY KEY (`id_posisaun`);

--
-- Indeks untuk tabel `t_postu`
--
ALTER TABLE `t_postu`
  ADD PRIMARY KEY (`id_postu`),
  ADD KEY `id_mun` (`id_mun`);

--
-- Indeks untuk tabel `t_suku`
--
ALTER TABLE `t_suku`
  ADD PRIMARY KEY (`id_suku`),
  ADD KEY `id_postu` (`id_postu`);

--
-- Indeks untuk tabel `t_tipo_karta`
--
ALTER TABLE `t_tipo_karta`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `t_user_ibfk_1` (`id_funsionario`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_diresaun`
--
ALTER TABLE `t_diresaun`
  MODIFY `id_diresaun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_funsionario`
--
ALTER TABLE `t_funsionario`
  MODIFY `id_funsionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_karta_sai`
--
ALTER TABLE `t_karta_sai`
  MODIFY `id_karta_sai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_karta_tama`
--
ALTER TABLE `t_karta_tama`
  MODIFY `id_karta_tama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_mun`
--
ALTER TABLE `t_mun`
  MODIFY `id_mun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_periodo`
--
ALTER TABLE `t_periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_posisaun`
--
ALTER TABLE `t_posisaun`
  MODIFY `id_posisaun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_postu`
--
ALTER TABLE `t_postu`
  MODIFY `id_postu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_suku`
--
ALTER TABLE `t_suku`
  MODIFY `id_suku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_tipo_karta`
--
ALTER TABLE `t_tipo_karta`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_funsionario`
--
ALTER TABLE `t_funsionario`
  ADD CONSTRAINT `t_funsionario_ibfk_1` FOREIGN KEY (`id_posisaun`) REFERENCES `t_posisaun` (`id_posisaun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_funsionario_ibfk_2` FOREIGN KEY (`id_periodo`) REFERENCES `t_periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_funsionario_ibfk_3` FOREIGN KEY (`id_suku`) REFERENCES `t_suku` (`id_suku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_karta_sai`
--
ALTER TABLE `t_karta_sai`
  ADD CONSTRAINT `t_karta_sai_ibfk_1` FOREIGN KEY (`id_diresaun`) REFERENCES `t_diresaun` (`id_diresaun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_karta_sai_ibfk_2` FOREIGN KEY (`id_funsionairo`) REFERENCES `t_funsionario` (`id_funsionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_karta_tama`
--
ALTER TABLE `t_karta_tama`
  ADD CONSTRAINT `t_karta_tama_ibfk_1` FOREIGN KEY (`id_diresaun`) REFERENCES `t_diresaun` (`id_diresaun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_karta_tama_ibfk_2` FOREIGN KEY (`id_tipu`) REFERENCES `t_tipo_karta` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_karta_tama_ibfk_3` FOREIGN KEY (`id_funsionario`) REFERENCES `t_funsionario` (`id_funsionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_postu`
--
ALTER TABLE `t_postu`
  ADD CONSTRAINT `t_postu_ibfk_1` FOREIGN KEY (`id_mun`) REFERENCES `t_mun` (`id_mun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_suku`
--
ALTER TABLE `t_suku`
  ADD CONSTRAINT `t_suku_ibfk_1` FOREIGN KEY (`id_postu`) REFERENCES `t_postu` (`id_postu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`id_funsionario`) REFERENCES `t_funsionario` (`id_funsionario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
