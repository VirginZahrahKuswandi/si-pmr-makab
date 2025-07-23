-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Jun 2025 pada 11.15
-- Versi server: 8.0.30
-- Versi PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_si_pmr_makab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwal_sekolah_id` bigint UNSIGNED NOT NULL,
  `jumlah_siswa_hadir` int NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','acc','tolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_fasilitator`
--

CREATE TABLE `absensi_fasilitator` (
  `id` bigint UNSIGNED NOT NULL,
  `absensi_id` bigint UNSIGNED NOT NULL,
  `fasilitator_id` bigint UNSIGNED NOT NULL,
  `status` enum('belum_absen','sudah_absen') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_absen',
  `status_verifikasi` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_foto`
--

CREATE TABLE `absensi_foto` (
  `id` bigint UNSIGNED NOT NULL,
  `absensi_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `konten`, `slug`, `gambar`, `user_id`, `status`, `published_at`, `kategori`, `created_at`, `updated_at`) VALUES
(10, 'JUMPA BAKTI GEMBIRA (JUMBARA) DI BUMI PERKEMAHAN RAGUNAN', 'JAKARTA — Kegiatan tahunan Jumpa Bakti Gembira (JUMBARA) sukses digelar di Bumi Perkemahan Ragunan pada tanggal 18-20 Oktober 2024. Kegiatan JUMBARA adalah kegiatan Pelantikan dan Perlombaan Palang Merah Remaja (PMR) yang diikuti oleh berbagai sekolah. Salah satunya adalah SMP Negeri 115 Jakarta. Adapun kami mengikuti perlombaan Pertolongan Pertama, Perawatan Keluarga, Kepalangmerahan, Ayo Siaga Bencana, Kepemimpinan, Halang rintang, Mading, Tari Kreasi Nusantara, Cipta dan Baca Puisi.\r\n   Dimulai dari lomba Pertolongan Pertama. Lomba Pertolongan Pertama adalah lomba yang melatih tindakan pertolongan yang bisa dilakukan oleh orang yang sudah terlatih atau memiliki kemampuan medis dasar. Lomba ini memiliki kasus yang harus diselesaikan oleh penolong. Seperti patah tulang, pendarahan, pingsan, dan lain sebagainya. Dalam lomba ini, penolong harus cepat dan tepat dalam memberikan Pertolongan Pertama.\r\n   Lalu, terdapat lomba Kepemimpinan yang bertujuan untuk melatih sikap Kepemimpinan para peserta. Dalam lomba kepemimpinan ini, peserta harus mendorong kerja sama antar individu melalui games Pesan Berantai. Teknis lomba ini adalah memerintahkan peserta untuk menyampaikan pesan dengan cara berlari secara bergantian. \r\n  Di lomba Kepalangmerahan, peserta akan menjawab setiap soal seputar sejarah Gerakan Palang Merah dan Bulan Sabit Merah Internasional serta 7 Materi Pokok PMR melalui aplikasi Quizizz. Poin akan dihitung berdasarkan ketepatan jawaban dan waktu yang mereka gunakan.\r\n  Selain perlombaan, pihak penyelenggara juga mengadakan acara berkemah. Seluruh peserta lomba diharapkan untuk berkemah disana sambil menikmati indahnya langit malam. Tidak hanya berkemah, pihak penyelenggara memberikan beberapa pertunjukkan seperti musik, modern dance, dan tarian. Dan pihak penyelenggara juga menyediakan berbagai stand makanan yang menggugah selera. \r\n  Pada hari terakhir JUMBARA, kami melakukan upacara penutupan dan hal yang paling ditunggu-tunggu ialah pengumuman lomba. Lalu, kami memenangkan juara 2 di Tari Kreasi Nusantara. Pengumuman lomba berakhir dengan suasana yang beragam. Ada yang menangis, terharu, dan senang. Untuk para pemenang, mereka akan membawa perasaan yang senang dan terus ingin mempertahankannya. Dan untuk yang belum bisa menggapai kemenangan, mereka pulang dengan rasa semangat untuk menggapai segala tujuan mereka di perlombaan selanjutnya.', 'jumpa-bakti-gembira-jumbara-di-bumi-perkemahan-ragunan', 'images/jh7UcWmLpEWAmChUWneOTXQbBUeOVitmwGQ76oyX.png', 9, 1, '2025-06-20 02:27:14', 'umum', '2025-06-20 02:27:14', '2025-06-20 02:32:58'),
(11, 'Latihan Gabungan Kebencanaan SMA Dewi Sartika', 'Jakarta, 1 Juni 2025 — SMA Dewi Sartika sukses menggelar kegiatan Lomba dan Latihan Gabungan Kebencanaan pada Sabtu (31/5), yang diikuti oleh pelajar SMP dari berbagai sekolah di DKI Jakarta dan sekitarnya. Kegiatan ini menjadi ajang edukatif sekaligus kompetitif bagi para peserta untuk mengenal lebih dekat dunia kesiapsiagaan bencana melalui pendekatan yang menyenangkan dan penuh tantangan.\r\n\r\nMengusung semangat “Be Ready, Be Safe, and Be the Hero,” acara ini tidak hanya menyuguhkan lomba-lomba menarik, tetapi juga membangun kesadaran pentingnya peran generasi muda dalam menghadapi situasi darurat. Seluruh peserta diajak untuk terlibat aktif dalam berbagai cabang kegiatan, seperti:\r\n\r\n* 🩹 Pertolongan Pertama\r\n* 🏥 Perawatan Keluarga\r\n* 🟥 Kepalangmerahan dan Ayo Siaga Bencana\r\n* 🧠 Pendidikan Remaja Sebaya (dengan materi tentang kesetaraan gender)\r\n* 💪 Halang Rintang (mengangkat korban ke tandu, melewati tembok tinggi, dan lorong sempit)\r\n* 📸 Lomba Fotografi bertema Be Ready, Be Safe, and Be the Hero\r\n\r\nDalam sesi Halang Rintang, peserta ditantang melewati rintangan fisik yang mensimulasikan kondisi nyata saat evakuasi bencana. Mereka harus cepat, sigap, dan kompak—membawa korban melalui jalur sempit, mengangkat tandu, hingga memanjat tembok tinggi.\r\n\r\nSalah satu momen yang paling mencuri perhatian adalah lomba fotografi, di mana peserta diberi kebebasan mengabadikan momen-momen aksi dan solidaritas selama kegiatan berlangsung. Hasil-hasil fotonya tak hanya estetik, tapi juga menggambarkan nilai-nilai kemanusiaan dan kepedulian.\r\n\r\nSementara itu, dalam sesi Pendidikan Remaja Sebaya, peserta diajak berdiskusi soal kesetaraan gender dalam konteks kesiapsiagaan. Diskusi berlangsung interaktif, dengan peserta menyampaikan pendapatnya tentang pentingnya kerja sama tanpa memandang gender dalam situasi darurat.\r\n\r\nAcara ini juga semakin bermakna dengan hadirnya pemateri dari \"Forum Pengurangan Risiko Bencana (FPRB)\" yang memberikan sharing session tentang bagaimana menghadapi bencana secara strategis dan terorganisir. Dengan pendekatan yang sederhana dan dekat dengan kehidupan sehari-hari remaja, materi ini menjadi salah satu bagian paling diapresiasi peserta.\r\n\r\n> “Ternyata jadi siaga bencana tuh bisa dipelajari dengan cara yang fun. Aku jadi lebih siap, dan makin semangat buat ikut kegiatan seperti ini lagi,” ungkap salah satu peserta dari SMPN 115 Jakarta.\r\n\r\nKegiatan ditutup dengan suasana yang meriah dan penuh semangat, terutama saat pengumuman para pemenang lomba. Sorak sorai terdengar saat nama-nama sekolah diumumkan sebagai juara di berbagai cabang. Para peserta yang menerima piala dan penghargaan naik ke panggung dengan wajah sumringah, membawa pulang lebih dari sekadar trofi—tapi juga pengalaman, kebanggaan, dan semangat baru untuk terus belajar menjadi generasi yang tangguh dan peduli.\r\n\r\n“Seneng banget bisa bawa piala buat sekolah, tapi yang paling berkesan tuh prosesnya—kerja sama bareng tim, ketawa-tawa pas latihan, sampai akhirnya bisa berhasil juga,” ujar salah satu peserta usai menerima piala.\r\n\r\nMomen ini menjadi penutup yang hangat dari seluruh rangkaian kegiatan, sekaligus bukti bahwa belajar siaga bencana bisa dilakukan dengan cara yang seru, membangun, dan penuh makna.\r\n\r\nLewat kegiatan ini, SMA Dewi Sartika tidak hanya membuka ruang belajar bagi pelajar SMP, tapi juga menanamkan nilai-nilai siaga, empati, dan kerja sama yang akan sangat berguna di masa depan.', 'latihan-gabungan-kebencanaan-sma-dewi-sartika', 'images/eZvZygXdvgEwQLVkm3Raz5psqvcNN1FitcqyZr5G.jpg', 9, 1, '2025-06-20 02:31:11', 'latihan-gabungan', '2025-06-20 02:31:11', '2025-06-20 02:33:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel_foto`
--

CREATE TABLE `artikel_foto` (
  `id` bigint UNSIGNED NOT NULL,
  `artikel_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikel_foto`
--

INSERT INTO `artikel_foto` (`id`, `artikel_id`, `path`, `created_at`, `updated_at`) VALUES
(12, 11, 'galeri/ntlFdf1kHbErPDdT13eTg2RZvon6ZvbMrK9YEQk4.jpg', '2025-06-20 02:31:11', '2025-06-20 02:31:11'),
(13, 11, 'galeri/5zjbtEFoaAZz0ELUzGrQsUE7KcL0Gs47MMliCBSh.jpg', '2025-06-20 02:31:11', '2025-06-20 02:31:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitator`
--

CREATE TABLE `fasilitator` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelatihan_sertifikasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_anggota_pmi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_anggota_makab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_bergabung_makab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_rekening_bank_dki` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitator`
--

INSERT INTO `fasilitator` (`id`, `nama`, `pelatihan_sertifikasi`, `pendidikan_terakhir`, `nomor_anggota_pmi`, `nomor_anggota_makab`, `tahun_bergabung_makab`, `foto`, `created_at`, `updated_at`, `tempat_lahir`, `tanggal_lahir`, `nomor_rekening_bank_dki`, `alamat`, `telepon`, `npwp`) VALUES
(1, 'Muhammad Ihsan Hadi Tanoyo', 'Pendidikan dan Pelatihan Pelatih PMR', 'Universitas Negeri Jakarta - Teknik Sipil', '12345678', '24.003', '2024', 'fasilitator_foto/01JX18ASZPA7S0E138257C040S.JPG', NULL, '2025-06-05 16:55:28', 'Tempat', '2025-06-06', '123456789', 'Jl.', '08123456789', '123456789'),
(2, 'Maulana hafizd', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '23.001', '2025', 'fasilitator_foto/01JVJXG5TFQVPD7D9C673Q7WKA.png', NULL, '2025-05-18 17:01:06', '', NULL, NULL, '', '', ''),
(3, 'Virgin Zahrah Kuswandi', 'Pendidikan dan Pelatihan Pelatih PMR 2020', 'Sekolah Tinggi Teknologi Terpadu Nurul Fikri', '317409100522006', '17.001', '2017', 'fasilitator_foto/01JWNJPHVT99H8E0XX3JEQ8941.png', NULL, '2025-06-01 04:08:02', 'Jakarta', '2002-07-20', '123121312312', 'Jl. Anggrek', '089636904049', '463794914689123'),
(4, 'Antika Mila Saskia', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '24.001', '2024', 'fasilitator_foto/01JVJXJN3SSV7ADQ0KDYQ4R22D.png', NULL, '2025-05-18 17:02:27', '', NULL, NULL, '', '', ''),
(5, 'Nanda Amelia Putri', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '21.001', '2021', 'fasilitator_foto/01JVJXMGX9AA8T97F3G5P9XE64.png', NULL, '2025-05-18 17:03:28', '', NULL, NULL, '', '', ''),
(6, 'Nawla Suci Syawalia', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '21.002', '2021', 'fasilitator_foto/01JVJXN23C65PYR8N0FR04MYH4.png', NULL, '2025-05-18 17:03:46', '', NULL, NULL, '', '', ''),
(7, 'Wardah Hanifah', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '24.005', '2025', 'fasilitator_foto/01JVJXM1NBEPS9WC3GC75HWX17.png', NULL, '2025-05-18 17:03:13', '', NULL, NULL, '', '', ''),
(8, 'Intan Nurhaida', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.003', '2025', 'fasilitator_foto/01JVJXNJDN68JES0NR49WEXCFC.png', NULL, '2025-05-18 17:04:03', '', NULL, NULL, '', '', ''),
(9, 'Anggun Islami', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.002', '2022', 'fasilitator_foto/01JVJXP4RXS274JSZ5N59HQMNK.png', NULL, '2025-05-18 17:04:21', '', NULL, NULL, '', '', ''),
(10, 'Sabrina azzahra', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.006', '2024', 'fasilitator_foto/01JVJXPQGV9A8JH8C1W8PC2W8Q.png', NULL, '2025-05-18 17:04:41', '', NULL, NULL, '', '', ''),
(11, 'Muhammad Hazaril Pramana', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.004', '2022', 'fasilitator_foto/01JVJXR5JD412NGEBBPTNYW86K.png', NULL, '2025-05-18 17:05:28', '', NULL, NULL, '', '', ''),
(12, 'Syifa Nur Azizah', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '21.004', '2022', 'fasilitator_foto/01JVJXRPTDWFY28R91KAXKKN8N.png', NULL, '2025-05-18 17:05:45', '', NULL, NULL, '', '', ''),
(13, 'Febby Debora Marie Simaremare', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '24.002', '2024', 'fasilitator_foto/01JVJXS98M856GRKKRJWN9EGKD.png', NULL, '2025-05-18 17:06:04', '', NULL, NULL, '', '', ''),
(14, 'Violetta Ramadhani', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '06.001', '2025', 'fasilitator_foto/01JVJXSW8T1Y7ND5NKKN2JKZTF.png', NULL, '2025-05-18 17:06:24', '', NULL, NULL, '', '', ''),
(15, 'Shila Widi Pangesti', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '21.003', '2021', 'fasilitator_foto/01JVJXTES3WS6W3D1TMB6DYGHT.png', NULL, '2025-05-18 17:06:43', '', NULL, NULL, '', '', ''),
(16, 'Zaky Septiananda Anggara', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.008', '2023', 'fasilitator_foto/01JVJXWMABQE488WAG2KYAKCHW.png', NULL, '2025-05-18 17:07:54', '', NULL, NULL, '', '', ''),
(17, 'Muhamad Febrian Yaputra', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '23.002', '2023', 'fasilitator_foto/01JVJXX6CXE07ZMX095H6E3S3H.png', NULL, '2025-05-18 17:08:12', '', NULL, NULL, '', '', ''),
(18, 'Nasya Ainunisa', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '19.002', '2022', 'fasilitator_foto/01JVJXXPQH0PHHAZTYC2QHVR1R.png', NULL, '2025-05-18 17:08:29', '', NULL, NULL, '', '', ''),
(19, 'Dimas Rangga Prianto', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '19.001', '2022', 'fasilitator_foto/01JVJXYMXA07QAGMERX72F6M51.png', NULL, '2025-05-18 17:09:00', '', NULL, NULL, '', '', ''),
(20, 'Tri Hilmiyati Salam', 'Pendidikan dan Pelatihan Pelatih PMR', 'Universitas Negeri Jakarta - Pendidikan Masyarakat', '317409100321008', '23.004', '2023', 'fasilitator_foto/01JVJXZ6C5BM0PQY58A2RNTEM4.png', NULL, '2025-05-18 17:09:18', '', NULL, NULL, '', '', ''),
(21, 'Akbar Kurnia Fatier', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.001', '2022', 'fasilitator_foto/01JVJXZVT4X81TEFKACZFHNFMH.png', NULL, '2025-05-18 17:09:40', '', NULL, NULL, '', '', ''),
(22, 'Wulan Apriliana Putri', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.007', '2025', 'fasilitator_foto/01JVJY0HVENZ0N6AB54W96XY6T.png', NULL, '2025-05-18 17:10:02', '', NULL, NULL, '', '', ''),
(23, 'Rizal Adrian', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '23.003', '2025', 'fasilitator_foto/01JVJY3TRG3VHFZGMMN5MDM9QQ.png', NULL, '2025-05-18 17:11:50', '', NULL, NULL, '', '', ''),
(24, 'Rahmawati', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '22.005', '2022', 'fasilitator_foto/01JVJY7R48SPKF4V3S6KT7PBGF.png', NULL, '2025-05-18 17:13:58', '', NULL, NULL, '', '', ''),
(25, 'Sudrajat', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '24.004', '2024', 'fasilitator_foto/01JVJY8DE17K13QMTEKR166AC2.png', NULL, '2025-05-18 17:14:20', '', NULL, NULL, '', '', ''),
(26, 'Rysan Dwyantoro', 'Trainer P3K', 'Universitas Negeri Jakarta ', NULL, '4.001', '2004', 'fasilitator_foto/01JVJY8ZXXTCZTFJHHZ3SZ0YF5.png', '2025-05-15 00:28:15', '2025-05-18 17:14:39', '', NULL, NULL, '', '', ''),
(27, 'Dodhi Puryanto', 'Pendidikan dan Pelatihan Pelatih PMR', NULL, NULL, '8.001', '2008', 'fasilitator_foto/01JVJY9HFA63TP67H8H0W5RY38.png', '2025-05-15 00:38:53', '2025-05-18 17:14:57', '', NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_fasilitator`
--

CREATE TABLE `jadwal_fasilitator` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwal_sekolah_id` bigint UNSIGNED NOT NULL,
  `fasilitator_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_fasilitator`
--

INSERT INTO `jadwal_fasilitator` (`id`, `jadwal_sekolah_id`, `fasilitator_id`, `created_at`, `updated_at`) VALUES
(5, 3, 3, NULL, NULL),
(6, 3, 21, NULL, NULL),
(7, 3, 11, NULL, NULL),
(8, 6, 3, NULL, NULL),
(9, 6, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_sekolah`
--

CREATE TABLE `jadwal_sekolah` (
  `id` bigint UNSIGNED NOT NULL,
  `sekolah_id` bigint UNSIGNED NOT NULL,
  `fasilitator_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_pj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_pembina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_sekolah`
--

INSERT INTO `jadwal_sekolah` (`id`, `sekolah_id`, `fasilitator_id`, `tanggal`, `jam_mulai`, `jam_selesai`, `deskripsi`, `penanggungjawab`, `kontak_pj`, `pembina`, `kontak_pembina`, `created_at`, `updated_at`) VALUES
(3, 27, NULL, '2025-05-19', '13:00:00', '15:00:00', 'Latihan Rutin', 'Febby Debora Marie Simaremare', '082114699656', 'Ibu Angel Cano', '087835427215', '2025-05-16 13:25:32', '2025-05-16 13:26:45'),
(4, 8, NULL, '2025-05-19', '15:00:00', '17:00:00', 'Libur', 'Rysan Dwiyantoro', '082116076071', 'Dewita Zuryati S.sos, M.Pd', '085693435024', '2025-05-16 13:33:24', '2025-06-01 04:33:51'),
(5, 5, NULL, '2025-05-19', '15:00:00', '17:00:00', 'Latihan Rutin', 'Antika Mila Saskia ', '089525008806', 'Pak Heru', '085959618896', '2025-05-16 13:36:25', '2025-05-16 13:36:25'),
(6, 28, NULL, '2025-05-19', '10:15:00', '13:15:00', 'Latihan Rutin', 'Febby Debora Marie Simaremare', '082114699656', ' Ibu Hidayati', '081281891305', '2025-05-16 13:40:14', '2025-05-16 13:40:14'),
(7, 15, NULL, '2025-05-20', '12:30:00', '14:00:00', 'Latihan Rutin', 'Antika Mila Saskia ', '089525008806', 'Afifah Nu Adawiyah', '081290626018', '2025-05-16 13:45:25', '2025-05-18 16:34:03'),
(8, 1, NULL, '2025-05-20', '15:30:00', '17:00:00', 'Latihan Rutin', 'Rahma Fusilat ', '081383956595 ', 'Shinta Pradita, S.Pd. Gr', '081383848480', '2025-05-18 16:58:39', '2025-05-18 17:44:56'),
(9, 13, NULL, '2025-05-20', '14:00:00', '15:00:00', 'Latihan Rutin', 'Tri Hilmiyati Salam', '0895639034519', 'Ibu Supriyah', '081211493133', '2025-05-18 17:46:40', '2025-05-18 17:46:40'),
(10, 6, NULL, '2025-05-20', '15:00:00', '17:00:00', 'Latihan Rutin', 'Syifa Nur Azizah', '08997999080', 'Maisarah, S.Pd', '082111745902', '2025-05-18 17:48:21', '2025-05-18 17:48:21'),
(11, 7, NULL, '2025-05-20', '15:00:00', '17:00:00', 'Latihan Rutin', 'Muhammad Ihsan Hadi Tanoyo', '089637543313', 'Pak Defan', '085772516278', '2025-05-18 17:49:46', '2025-05-18 17:49:46'),
(12, 20, NULL, '2025-05-20', '11:00:00', '12:30:00', 'Latihan Rutin', 'Muhammad Ihsan Hadi Tanoyo', '089637543313', 'Bu Novi', '089636423635', '2025-05-18 17:52:17', '2025-05-18 17:52:17'),
(13, 21, NULL, '2025-05-21', '13:00:00', '16:00:00', 'Latihan Rutin', 'Nasya Ainunisa', '085718642051', 'Pak Kosasih S.Pd', '081311154073', '2025-05-18 17:55:24', '2025-05-18 17:55:24'),
(14, 9, NULL, '2025-05-21', '15:00:00', '17:00:00', 'Latihan Rutin', 'Shila Widi Pangesti', '081281972305', 'Bu Cinthia Puji Bhintarti', '081315746494', '2025-05-18 17:56:49', '2025-05-18 17:56:49'),
(15, 3, NULL, '2025-05-21', '15:30:00', '16:30:00', 'Latihan Rutin', 'Muhammad Hazaril Pramana', '083899049925', 'Nurma Hisin, S.Sos', '082320257644', '2025-05-18 17:59:29', '2025-05-18 17:59:29'),
(16, 16, NULL, '2025-05-22', '12:30:00', '14:00:00', 'Latihan Rutin', 'Antika Mila Saskia ', '089525008806', 'Bu Dian Safitri', '087887405446', '2025-05-18 19:10:14', '2025-05-18 19:10:14'),
(17, 11, NULL, '2025-05-22', '15:30:00', '17:00:00', 'Latihan Rutin', 'Tri Hilmiyati Salam', '08963934519', 'Pak Rusman', '081222304023', '2025-05-18 19:11:38', '2025-05-18 19:11:38'),
(18, 23, NULL, '2025-05-22', '13:00:00', '15:00:00', 'Latihan Rutin', 'Nasya Ainunisa', '085718642051', 'Ira Suciati S.Pd', '08567668101', '2025-05-18 19:13:16', '2025-05-18 19:13:16'),
(19, 14, NULL, '2025-05-23', '14:00:00', '15:00:00', 'Latihan Rutin', 'Tri Hilmiyati Salam', '089639034519', 'Ibu Ita', '085797181816', '2025-05-18 19:15:07', '2025-05-18 19:15:07'),
(20, 12, NULL, '2025-05-23', '09:30:00', '11:00:00', 'Latihan Rutin', 'Tri Hilmiyati Salam', '089639034519', 'Ibu Livia', '081399187853', '2025-05-18 19:17:36', '2025-05-18 19:17:36'),
(21, 4, NULL, '2025-05-23', '13:00:00', '15:00:00', 'Latihan Rutin', 'Antika Mila Saskia ', '089525008806', 'Anah Rohanah, S.KM', '087848990125', '2025-05-18 20:30:29', '2025-05-18 20:30:43'),
(22, 22, NULL, '2025-05-23', '13:00:00', '14:00:00', 'Latihan Rutin', 'Nasya Ainunisa', '085718642051', 'Alie Murtadho S.Pd', '085777527691', '2025-05-18 20:33:42', '2025-05-18 20:33:42'),
(23, 17, NULL, '2025-05-24', '08:00:00', '09:30:00', 'Latihan Rutin', 'Antika Mila Saskia ', '089525008806', 'Sudestriyantini', '085156145378', '2025-05-18 20:37:17', '2025-05-18 20:37:17'),
(24, 26, NULL, '2025-05-24', '09:00:00', '11:00:00', 'Latihan Rutin', 'Syifa Nur Azizah', '08997999080', 'Choerunisaa S.Pd', '081292377406', '2025-05-18 20:39:46', '2025-05-18 20:39:46'),
(25, 25, NULL, '2025-05-24', '13:00:00', '15:00:00', 'Latihan Rutin', 'Nawla', '089517325418', 'Nur Rachmadiah, S.Pd', '081295545247', '2025-05-18 20:41:33', '2025-05-18 20:41:33'),
(26, 24, NULL, '2025-05-24', '10:00:00', '12:00:00', 'Latihan Rutin', 'Nawla', '089517325418', 'Mohammad khatami S.H S.Pd', '081382141843', '2025-05-18 20:43:23', '2025-05-18 20:43:23'),
(27, 10, NULL, '2025-05-24', '10:00:00', '12:00:00', 'Latihan Rutin', 'Shila Widi Pangesti', '081281972305', 'Diyah Krisnandari, S.E., S.Pd', '087877706286', '2025-05-18 20:46:06', '2025-05-18 20:46:06'),
(28, 4, NULL, '2025-05-24', '10:00:00', '15:00:00', 'Latihan Tambahan', 'Antika Mila Saskia ', '089525008806', 'Anah Rohanah, S.KM', '087848990125', '2025-05-23 09:56:01', '2025-05-23 09:56:01'),
(29, 6, NULL, '2025-05-24', '08:00:00', '11:00:00', 'Latihan Tambahan', 'Syifa Nur Azizah', '08997999080', 'Maisarah, S.Pd', '082111745902', '2025-05-23 09:58:33', '2025-05-23 09:58:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint UNSIGNED NOT NULL,
  `artikel_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_08_101049_create_sekolah_table', 1),
(5, '2025_05_08_103324_create_siswa_table', 1),
(6, '2025_05_08_104940_create_fasilitator_table', 1),
(7, '2025_05_08_111455_create_absensi_table', 1),
(8, '2025_05_08_111514_create_jadwal_fasilitator_table', 1),
(9, '2025_05_08_112638_create_absensi_fasilitator_table', 1),
(10, '2025_05_13_082602_create_fasilitator_table', 2),
(11, '2025_05_13_082914_create_absensi_table', 2),
(12, '2025_05_13_082931_create_jadwal_fasilitator_table', 2),
(13, '2025_05_13_082941_create_absensi_fasilitator_table', 2),
(14, '2025_05_15_074252_create_jadwal_sekolah_table', 3),
(15, '2025_05_15_080401_create_jadwal_sekolah_table', 4),
(16, '2025_05_15_080626_create_jadwal_sekolah_table', 5),
(17, '2025_05_15_085328_create_users_table', 6),
(18, '2025_05_15_085759_create_users_table', 7),
(19, '2025_05_15_090338_create_users_table', 8),
(20, '2025_05_15_094157_create_jadwal_sekolah_table', 9),
(21, '2025_05_15_095300_create_jadwal_sekolah_table', 10),
(22, '2025_05_15_104223_create_jadwal_fasilitator_table', 11),
(23, '2025_05_17_095141_create_absensi_table', 12),
(24, '2025_05_17_095148_create_absensi_fasilitator_table', 12),
(25, '2025_05_17_095829_create_absensi_fasilitator_table', 13),
(26, '2025_05_17_100122_create_absensi_table', 14),
(27, '2025_05_17_100125_create_absensi_fasilitator_table', 14),
(28, '2025_05_17_111728_create_absensi_table', 15),
(29, '2025_05_17_111734_create_absensi_foto_table', 15),
(30, '2025_05_17_111742_create_absensi_fasilitator_table', 15),
(31, '2025_06_01_120212_create_artikel_table', 16),
(32, '2025_06_05_093753_create_artikel_foto_table', 17),
(33, '2025_06_05_094746_create_artikel_table', 18),
(34, '2025_06_05_094758_create_artikel_foto_table', 18),
(35, '2025_06_26_092438_create_komentar_table', 19),
(36, '2025_06_26_092647_create_komentar_table', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('virginzk242@gmail.com', '$2y$12$/uYKphf9D0wgbxoElrwdgOKYzYrkighftuXs63gWI5xGOmluW3flq', '2025-06-26 02:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_berdiri_pmr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_pj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_pembina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `alamat`, `tahun_berdiri_pmr`, `penanggungjawab`, `kontak_pj`, `pembina`, `kontak_pembina`, `created_at`, `updated_at`, `latitude`, `longitude`) VALUES
(1, 'SMAN 70 JAKARTA', 'Jl. Bulungan Blok C No.1, RT.11/RW.7, Kramat Pela, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12130', '1984', 'Rahma Fusilat ', '081383956595 ', 'Shinta Pradita, S.Pd. Gr', '081383848480', '2025-05-12 01:34:04', '2025-05-17 05:46:33', -6.24164640, 106.79423190),
(2, 'SDN Bintaro 04 Pagi', 'Jalan Rawa Papan No.1, RT.12/RW.6, Bintaro, Pesanggrahan, RT.5/RW.6, Bintaro, Kec. Pesanggrahan, Kota Jakarta Selatan', '2025', 'Nasya ainunisa', '+62 857-1864-2051', 'Alie Murtadho', '+62 857-7752-7691', '2025-05-12 01:37:39', '2025-05-17 05:42:53', -6.27009140, 106.75502600),
(3, 'SMA Dewi Sartika', 'Jl. Tebet Barat Dalam Raya No.39-41, Tebet Bar., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810', '2023', 'Muhammad Hazaril Pramana', '083899049925', 'Nurma Hisin, S.Sos', '082320257644', NULL, '2025-05-17 05:45:03', -6.23788350, 106.84492440),
(4, 'SMP Negeri 115 Jakarta', 'Jl. KH Abdullah Syafei No.8, RT.8/RW.2, Bukit Duri, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12840', '1991', 'Antika Mila Saskia', '089525008806', 'Anah Rohanah, S.KM', '087848990125', NULL, '2025-05-18 20:53:33', -6.22515660, 106.85178640),
(5, 'SMK Bina Putra Jakarta', 'Jl. Kemang Timur No.50, RT.8/RW.3, Bangka, Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12730', '2023', 'Antika Mila Saskia', '089525008806', 'Pak Heru', '085959618896', NULL, '2025-05-18 20:55:02', -6.26543350, 106.81890900),
(6, 'SMK Negeri 20 Jakarta', 'Jl. Melati No.24 13, RT.13/RW.10, Cilandak Bar., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', '1984', 'Syifa Nur Azizah', '08997999080', 'Maisarah, S.Pd', '082111745902', NULL, '2025-05-18 20:56:32', -6.28412320, 106.79137760),
(7, 'SMK Al-Fajar Jakarta', 'Jl. Sultan Iskandar Muda No.32, RT.4/RW.4, Kby. Lama Utara, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12240', '2024', 'Muhammad Ihsan Hadi Tanoyo', '089637543313', 'Pak Defan', '085772516278', NULL, '2025-05-18 20:57:13', -6.24468390, 106.77929260),
(8, 'SMK Negeri 28 Jakarta', 'Jl. Maritim No.26, RT.4/RW.10, Cilandak Bar., Kec.a Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', '1972', 'Rysan Dwiyantoro', '082116076071', 'Dewita Zuryati S.sos, M.Pd', '085693435024', NULL, '2025-05-18 20:57:48', -6.28449150, 106.79185120),
(9, 'SMP Labschool Kebayoran', 'Jl. KH Ahmad Dahlan no 14 Kebayoran Baru Jakarta Selatan', '2002', 'Shila Widi Pangesti', '081281972305', 'Cinthia Puji Bhintarti', '081315746494', NULL, '2025-05-18 20:58:52', -6.24499310, 106.78883460),
(10, 'SMPN 50 Jakarta', 'Kodam Jaya Cililitan II, Kramatjati, Jakarta Timur', '2000', 'Shila Widi Pangesti', '081281972305', 'Diyah Krisnandari, S.E., S.Pd', '087877706286', NULL, '2025-05-18 22:11:02', -6.26731490, 106.86652620),
(11, 'SDN Srengseng Sawah 11 Pagi', 'Jl. Binawarga No.73 8, RT.8/RW.7, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630', '2022', 'Tri Hilmiyati Salam', '08963934519', 'Pak Rusman', '081222304023', '2025-05-12 02:31:53', '2025-05-18 22:13:20', -6.35402310, 106.81629720),
(12, 'SDN Pejaten Timur 15 Pagi', 'Jl. Siaga Dharma, Jakarta, RT.13/RW.5, East Pejaten, Pasar Minggu, South Jakarta City, Jakarta 12510', '2023', 'Tri Hilmiyati Salam', '089639034519', 'Ibu Livia', '081399187853', NULL, '2025-05-18 22:14:00', -6.26958860, 106.84533360),
(13, 'SDN Cipedak 03', 'Jl. Timbul No.Rt. 007/ 05, RT.7/RW.5, Cipedak, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630', '2022', 'Tri Hilmiyati Salam', '0895639034519', 'Ibu Supriyah', '081211493133', NULL, '2025-05-18 16:53:57', -6.34917850, 106.80681490),
(14, 'SDIT Citra Sahabat', 'Jl. M. Kahfi II Gg. Masjid An-Nur No.8 2, RT.3/RW.8, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630', '2024', 'Tri Hilmiyati Salam', '089639034519', 'Ibu Ita', '085797181816', NULL, '2025-05-18 22:14:38', -6.34628880, 106.81324510),
(15, 'SDN JAGAKARSA 01 ', 'Jl. Jagakarsa I RT.007 RW 002', '2023', 'Antika Mila Saskia ', '089525008806', 'Afifah Nu Adawiyah', '081290626018', '2025-05-12 03:09:54', '2025-05-18 22:16:00', -6.32800860, 106.81783170),
(16, 'SDN JAGAKARSA 02', 'Jl. Sirsak No. 34 RT.8/RW.7', '2022`', 'Antika Mila Saskia ', '089525008806', 'Dian Safitri', '087887405446', '2025-05-12 03:25:05', '2025-05-18 22:16:52', -6.33443670, 106.81959670),
(17, 'SDN TANJUNG BARAT 05', 'Jl. Rancho Indah Tanjung Barat', '2021', 'Antika Mila Saskia ', '089525008806', 'Sudestriyantini', '085156145378', '2025-05-12 03:25:54', '2025-05-18 22:17:38', -6.30526280, 106.84849120),
(18, 'SMP Kesuma Bangsa Depok', 'Jl. Raya Tanah Baru KM 1,5, Kecamatan Beji, Kota Depok, Jawa Barat	 	 	', '2022', 'Muhamad Febrian Yaputra', '0895705021700', 'Sumintra Aditia, S.Pd', '085694620041', '2025-05-12 03:27:24', '2025-05-18 22:18:41', -6.38252620, 106.80774480),
(19, 'SMK Kesuma Bangsa 2 Depok	 	', 'Jl. Raya Tanah Baru KM 1,5, Kecamatan Beji, Kota Depok, Jawa Barat	 	 	', '2022', 'Muhamad Febrian Yaputra', '0895705021700', 'Indri Lestari, S.Pd', '085811969370', '2025-05-12 03:27:59', '2025-05-18 22:31:50', -6.37728450, 106.80810190),
(20, 'SD Negeri Cipulir 05', 'Jl. Cipulir 1 No.31, RT.14/RW.4, Cipulir, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12230', '2025', 'Muhammad Ihsan Hadi Tanoyo', '089637543313', 'Novi', '089636423635', '2025-05-12 04:03:42', '2025-05-18 22:19:57', -6.23687170, 106.77277270),
(21, 'SDN Bintaro 02', 'Jl. Bintaro Permai III No.1 2, RT.2/RW.9, Bintaro, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12330', '2023', 'Nasya Ainunisa', '085718642051', 'Kosasih S.Pd', '081311154073', NULL, '2025-05-18 22:20:32', -6.25738660, 106.76091590),
(22, 'SDN Bintaro 04', 'Jalan Rawa Papan No.1, RT.12/RW.6, Bintaro, Pesanggrahan, RT.5/RW.6, Bintaro, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12330', '2025', 'Nasya Ainunisa', '085718642051', 'Alie Murtadho S.Pd', '085777527691', NULL, '2025-05-18 22:21:01', -6.27009140, 106.75502600),
(23, 'SDN Ragunan 05 Pagi', 'Jl. Warung Jati Barat Rt. 002/01, RAGUNAN, Kec. Pasar Minggu, Kota Jakarta Selatan Prov.', '2023', 'Nasya Ainunisa', '085718642051', 'Ira Suciati S.Pd', '08567668101', NULL, '2025-05-18 22:21:30', -6.29253880, 106.81964440),
(24, 'MA MUHAMMADIYAH 1 DEPOK', 'Jl. Raya Sawangan No.112, Pancoran MAS, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16436', '2024', 'Nawla', '089517325418', 'Mohammad khatami S.H S.Pd', '081382141843', '2025-05-13 02:20:44', '2025-05-18 22:21:57', -6.39549200, 106.78603220),
(25, ' SMPN 20 DEPOK', 'Jl. Marthadinata 5, Rangkapan Jaya Baru, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16434', '2017', 'Nawla', '089517325418', 'Nur Rachmadiah, S.Pd', '081295545247', '2025-05-13 02:23:19', '2025-05-18 22:22:24', -6.38738580, 106.83134540),
(26, 'SMP Pattimura Jagakarsa', 'Jl. Raya jagakarsa Selatan No. 88 Rt.02/Rw.05 jagakarsa', '2002', 'Syifa Nur Azizah', '08997999080', 'Choerunisaa S.Pd', '081292377406', '2025-05-13 02:24:24', '2025-05-18 22:23:06', -6.32620060, 106.81582730),
(27, 'SMP Strada Marga Mulia Pasar Minggu', 'Jl. Pejaten Raya No.34 13, RT.13/RW.2, Jati Padang, Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12540', '1987', 'Febby Debora M S', '082114699656', 'Ibu Angel Cano', '087835427215', '2025-05-13 04:57:33', '2025-05-18 22:23:39', -6.28025140, 106.83134540),
(28, 'SDN Jagakarsa 05 Pagi', 'Jl. Sirsak No.67 1, RT.1/RW.2, Jagakarsa, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12620', '2025', 'Febby Debora M S', '082114699656', ' Ibu Hidayati', '081281891305', '2025-05-13 04:59:21', '2025-05-18 22:24:10', -6.33692550, 106.81822930);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GTiFRDVqsvZyy8KQAX84VqwnkG3lSOrxRol9l0ro', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicHJicUxNMXRqQUR3akdFM3VaemRvNzNTd3YwY3ZNUXYwalA0akRUZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1750933220),
('Spu7XQMxZa8y01n8o0pSRWfQfqgG6ThF2qaviKJL', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUVJeDFKOTZwY21SdURlUGtlcGZSUUd4bEZPTVFsaEM5blY0Z3k0TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcnRpa2VsL2p1bXBhLWJha3RpLWdlbWJpcmEtanVtYmFyYS1kaS1idW1pLXBlcmtlbWFoYW4tcmFndW5hbiI7fX0=', 1750931696);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_sekolah` bigint UNSIGNED NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `golongan_darah` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `id_sekolah`, `nis`, `nisn`, `nama_lengkap`, `nama_panggilan`, `kelas`, `no_telp`, `alamat`, `golongan_darah`, `created_at`, `updated_at`) VALUES
(1, 4, '201002000000', '0119709947', 'Aini Puspita Aprilia', 'Aini', '7C', '085881988594', 'jl. Tebet Dalam 4 no 9 rt 14 rw 01', 'O', NULL, NULL),
(2, 4, '16269', '0113260471', 'Namira Agara Wulan Purnama', 'Agara', '7C', '0895630333766', 'Jln, Tebet Barat no 67,RT 15 RW 001', 'A', NULL, NULL),
(3, 4, '16293', '0123228316', 'Made Anindita Putri Maharani', 'Made', '7D', '081383857105', 'Jl. Balai Pustaka Raya No.11', 'B', NULL, NULL),
(4, 4, '16370', '0116361082', 'Muhammad Ghaffar Sya’bani', 'Ghaffar', '7F', '081717458718', 'Jl.MESJID ANUR,GG.LANGGAR,RT/RW.004/002MENTENG DALAM, TEBET . JAKARTA SELATAN,DKI JAKARTA', 'A', NULL, NULL),
(5, 4, '16410', '0113419539', 'Marsela Kartika Putri', 'Marsela', '7G', '085695549573', 'balimatraman RT 07/RW 010 no 07', 'A', NULL, NULL),
(6, 4, '16419', '0118711412', 'Zahirah Asqia', 'Zahirah', '7G', '087785857318', 'Kp melayi kecil V no 6', 'B', NULL, NULL),
(7, 4, '16426', '3113125267', 'Amanda Callista Siti Nur\'aini', 'Amanda', '7H', '0881011099960', 'Jl.tebet utara 1 rt 005/010 no 19', 'O', NULL, NULL),
(8, 4, '16453', '0115271630', 'Seanna Raisya Windriya', 'Sena', '7H', '085219588271', 'Jalan Tebet Barat Trijaya 5,Rt 11,Rw 07,No,18', 'B', NULL, NULL),
(9, 4, '16470', '3116011612', 'Fahmara Aiza Kamila', 'Fahma', '7I', '08816828899', 'Jl. Mesjid 2 no.27, kampung Melayu Besar RT 007 RW 02, Kebon Baru, Tebet, Jaksel 12830', '', NULL, NULL),
(10, 4, '3121', '0115479194', 'Karina Gading Nur Umayanah', 'Karina', '7I', '085882920029', 'JL KP Melayu Barat', 'O', NULL, NULL),
(11, 4, '16476', '0101594720', 'Muhammad afsal khoiru insani', 'Afsal', '7I', '0881012613086', 'jln . Tebet Utara 1 no 5 . RT/RW . 006/010', 'A', NULL, NULL),
(12, 4, '16487', '0117489507', 'Siti Nur Indriwati', 'Indri', '7I', '089653714480', 'kampung Melayu barat RT 08 rw06', 'O', NULL, NULL),
(13, 4, '16119', '0101289694', 'Assifa', 'Syifa', '8B', '08561203831', 'Jl. Tebet Utara 1 Gang Staf IV RT 5 RW 10', 'O', NULL, NULL),
(14, 4, '15889', '0105635635', 'Sarish Tri Cahya', 'Sarish', '8B', '085754709383', 'Jl. dr Saharjo RT 4 RW 5, Kel Manggarai, Kec Tebet, Jakarta Selatan', 'O', NULL, NULL),
(15, 4, '15971', '0105862257', 'Aqeela Ramadhani Cordova', 'Aqeel', '8C', '085894010810', 'Jl. Palbatu 1 Nomor 17 RT 7 RW 4', 'A', NULL, NULL),
(16, 4, '15874', '0104234798', 'Khayru Humam Aidan', 'Khayru', '8C', '08179299396', 'Jl. Asembaris gang Q No 10 11/12', 'O', NULL, NULL),
(17, 4, '15994', '0106430769', 'Nawal', 'Nawal', '8C', '085782558882', 'Jl. P Nomor 50 RT 1 RW 11, Kebon Baru, Tebet, Jakarta Selatan', 'A', NULL, NULL),
(18, 4, '15995', '0096711922', 'Nayla Alifia Rizka', 'Nayla', '8C', '08981276080', 'Jl. Menteng Atas Selatan III Nomor 32', 'B', NULL, NULL),
(19, 4, '16041', '0103662174', 'Asmara Izzah Ramadhania', 'Nia', '8D', '081296167290', 'Jl. T Nomor 29', 'B', NULL, NULL),
(20, 4, '15829', '0102188373', 'Davian Raffa alfareza', 'Davian', '8D', '088291208965', 'Jl. Tebet Barat Gang Trijaya 4 RT 11 RW 7', 'A', NULL, NULL),
(21, 4, '15988', '3103917109', 'Khansa Haibah', 'Khansa', '8D', '085894038060', 'Tebet Dalam IV/14', 'O', NULL, NULL),
(22, 4, '16001', '0104375244', 'Zivana Nesha Salmiya', 'Zivana', '8D', '085880174621', 'Jl. Cipinang Pulo Maja', 'O', NULL, NULL),
(23, 4, '16037', '0115362389', 'Abyan Abrar Nugraha', 'Abyan', '8E', '082122185110', 'Tebet Utara III B Nomor 5', 'O', NULL, NULL),
(24, 4, '16011', '0107761839', 'Dya Khairunnisa Handayani', 'Sasa', '8E', '0081286325587', 'Jl. Sawo Kecik Raya Nomor 9 RT 15 RW 5', 'B', NULL, NULL),
(25, 4, '2183', '0103454953', 'Queency Bilqis Prabancana Lukito', 'Bilqis', '8E', '085893496938', 'Jl. Pembina 1, Jatinegara, Jakarta Timur', 'O', NULL, NULL),
(26, 4, '15967', '0104761961', 'Adara Revina Kayyasah', 'Adara', '8G', '085888272717', 'Gang Swadaya V Nomor 10 RT 6 RW 8, Kelurahan Manggarai, Kecamatan Tebet, Jakarta Selatan 12850', 'O', NULL, NULL),
(27, 4, '16027', '0107483888', 'Naajiah Rohadatul Aisy', 'Zeze', '8G', '085691503385', 'Jl. Kampung Melayu Barat RT 8 RW 6 Nomor 8, Bukit Duri, Tebet, Jakarta Selatan', 'AB', NULL, NULL),
(28, 4, '3237', '0102665107', 'Rara mediana putri', 'Rara', '8G', '087739796363', 'Gang Sawo Kecik V, Rt 15/Rw 6, Bukit Duri , KOTA JAKARTA SELATAN, TEBET, DKI JAKARTA', 'B', NULL, NULL),
(29, 4, '15965', '0106419819', 'Syifana Ramadhani', 'Syifana', '8G', '08882224969', 'Jl. Kampung Melayu Barat RT 12 RW 6', 'AB', NULL, NULL),
(30, 4, '16079', '0108351038', 'Bayu Pramudia Raysandi', 'Bayu', '8H', '081289215403', 'Taman Buaran Indah IV, Jl. Kebun Anggrek 3, La 2 Nomor 4', '', NULL, NULL),
(31, 4, '15881', '0114262572', 'Nabila Choirunnisa', 'Bibil', '8H', '081295349233', 'Jl.lapangan ros 3 No 2 Rt 16/Rw05', 'B', NULL, NULL),
(32, 4, '16035', '0101540971', 'Virly Syafa Alaya', 'Virly', '8H', '087841130100', 'Tebet Timur 4B nomor 5', 'O', NULL, NULL),
(33, 4, '15826', '0117427015', 'Azhima Setiyanindita Harmawan', 'Azhima', '8I', '087844081217', 'Gang UU Nomor 4 RT 10 RW 4, Johar Baru, Jakarta Pusat', 'B', NULL, NULL),
(34, 4, '15952', '0107699747', 'Nabila Safitri', 'Bebel', '8I', '088295197828', 'Jl. Tebet Dalam IV GG Keamanan IV RT 16 RW 1 Nomor 45A, Kelurahan Tebet Barat, Kecamatan Tebet, Jakarta Selatan 12810', 'AB', NULL, NULL),
(35, 4, '15954', '0108351038', 'Namira Ardiyani', 'Nami', '8I', '085695781675', 'Jl. Swadaya Nomor 45 RT 7 RW 11, Kelurahan Kebonbaru, Kecamatan Tebet, Jakarta Selatan, DKI Jakarta 12830', 'B', NULL, NULL),
(36, 7, '4817', '0089243081', 'Syifa Azizah', 'Azizah', '10', '089522849122', 'Kp kecil rt 013/001 no 1 sukabumi selatan, kebon jeruk, jakarta barat', 'O+', NULL, NULL),
(37, 7, '4790', '3080188978', 'Nadianovitaputri', 'NADIA', '10 pm 1', '085842615299', 'Jalan pandan 8 RT 12 RW 09', 'A', NULL, NULL),
(38, 7, '4790', '3080188979', 'Nadia Novita putri', 'Nadia', '10 pm 1', '085842615299', 'Jalan pandan 8 RT 12 RW 09', 'A', NULL, NULL),
(39, 7, '100530', '0096942166', 'Nur Ainnisa Handayani', 'Anisa', 'X AK(AKUNT', '087764443732', 'Komplek Kodam tanah kusir', 'O', NULL, NULL),
(40, 7, '26454', '0088084148', 'Vionita Dwi Pitaloka', 'Vio', 'X Mplb', '081381363398', 'Jl.makam no 74', NULL, NULL, NULL),
(41, 7, '4737', '0095903198', 'Aisyah Khoiriyah', 'Aisyah', 'X pm 2', '085133382445', 'Jl.Rawa Simprug lll No.56 Rt5 Rw5, Grogol Selatan, Kebayoran lama', NULL, NULL, NULL),
(42, 7, '4816', '0081207151', 'Syifa Alfadiza', 'Syifa', 'X', '085682025221', 'Jl. Ciputat raya gg sarmili', NULL, NULL, NULL),
(43, 7, '96138367', '0096138367', 'suci rahma', 'suci', '10 mplb', '081296374587', 'kbayoran lama Utara rt 8 rw 7', NULL, NULL, NULL),
(44, 7, '4763', '3090528581', 'julia kirana putri', 'julia', '10 mplb', '081218617487', 'jalan dwijaya 4 RT 12 RW 01 Gandaria Utara Kebayoran Baru Jakarta Selatan DKI Jakarta', NULL, NULL, NULL),
(45, 7, '83176096', '0083176096', 'Gendis Dwi Arianti', 'Gendis', 'X MPLB', '088212302138', 'jl kebun mangga 1 rt 04/07 no 27', 'O', NULL, NULL),
(46, 7, '4767', '0081852261', 'Khansa Zafira', 'Khansa', '10', '089667322900', 'Jl.kebon mangga IV no.32 kebayoran lama,jakarta selatan', NULL, NULL, NULL),
(47, 7, '4769', '0084361568', 'Kintan Makayla An\'nida', 'Kintan, Kayla', '10', '088212571015', 'Praja Dalam F, RT 009/002, Kebayoran Lama Selatan', NULL, NULL, NULL),
(48, 7, '4764', '0086053088', 'Juliah Kirana Putri', 'Juliah', 'X. MPLB', '085882378590', 'Jl. Kebon Mangga No. 97 RT 13 / RW 3, CIPULIR KEC. KEBAYORAN LAMA KOTA JAKARTA SELATAN 12230', NULL, NULL, NULL),
(49, 7, '4754', '3174074107091002', 'Hanifah Safara Maharani', 'Hanifah', 'X MPLB', '089603214514', 'Jalan Dwijaya IV rt 12 rw 01', 'O', NULL, NULL),
(50, 7, '4767', '0081852261', 'Khansa Zafira pengen', 'fira', 'X AK', '089667322900', 'Jl.kebon mangga IV no.32 Kebayoran lama  ,cipulir jakarta selatan', NULL, NULL, NULL),
(51, 9, '245472', '0096142378', 'Musyaffa Radhika Sani', 'Sani', '9', '08119998737', 'Discovery Eola blok E-16, Bintaro, parigi lama, pondok aren, kota tanggerang selatan', 'O', NULL, '2025-05-12 04:22:08'),
(52, 9, '2410208', '0112053304', 'Jasmine Aminah Adillaputri', 'Jasmine', '7', '081389706466', 'Jl. Barata Tama III/481, RT02/RW 07, Karang Tengah, Tangerang, 15157', 'B', NULL, NULL),
(53, 9, '2309987', '0115629435', 'Muhammad Dafi Al Hammam', 'Dafi', '8', '082122482277', 'Jl. Emeralda Vista VI Blok I No.16, Parigi, Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15227', 'O', NULL, NULL),
(54, 9, '2410216', '0117678098', 'Nayla Andaru Ahzavianti', 'Ayla', '7', '081218134266', 'Jl. Mampang Prapatan XV No 88 RT 02 RW 04 Tegal Mampang Mampang Prapatan Jakarta Selatan 12790', 'O', NULL, NULL),
(55, 9, '2209678', '0102196934', 'Adika faisal rizqi', 'Adika', '9', '087888802705', 'Jl tanjung blok g3 no 24 tanjung barat jagakarsa', 'B', NULL, NULL),
(56, 9, '2410225', '0125029956', 'Valannisa Olive Widyanto', 'Val', '7', '082122067762', 'Vila Cendana Blok G 2 Jl WR Supratman Kampung Utan Ciputat Timur Tangerang Selatan 15412', 'B', NULL, NULL),
(57, 9, '2410120', '0126811849', 'Quaneisha Kaniyabella Kusumah', 'Bella', '7', '081213134201', 'Jl isa no 19 Rt8 Rw5 kel sukabumi utara kec kebon jeruk jakarta barat', 'O', NULL, NULL),
(58, 9, '2309966', '102562511', 'Syaihan Aqila Radhani', 'Syaihan', '8', '081977101231', 'Citra Garden Puri Boulevard Kav. 01, ED/07 Cluster Elecio, RT.7/RW.9, Semanan, Kec. Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11850', 'O', NULL, NULL),
(59, 9, '2309993', '0119461007', 'Putu Ayu Ariendra Kirana Maharani', 'Ana', '8', '085781615006', 'Brilian Apartment Rawasari Unit 404, Jalan Pramuka Sari IV, RT.9/RW.5, Kelurahan Rawasari, Cempaka Putih', 'O', NULL, NULL),
(60, 9, '2309845', '0128640941', 'Aliya Syah Putri', 'Aliya', '8', '081399901095', 'BSD Nusa Loka, Jl. Watubela 1, Blok RD No. 12B, Tangerang Selatan', 'A', NULL, NULL),
(61, 9, '2309991', '0114709135', 'Nayla Maheswari Candra', 'Nayla', '8', '0811389898', 'jl. caman raya, taman bougenville estate b3 no 11, Jatibening, Bekasi', 'A', NULL, NULL),
(62, 9, '2309977', '0113232653', 'Calya Ramadhani Putri Darmawan', 'Putri', '8', '085960225371', 'Jl. Pondok Lakah Permai Blok D20 RT.003/RW.016, Paninggilan, Ciledug, Tangerang, Banten.', NULL, NULL, NULL),
(63, 9, '2309992', '0113423804', 'Noreen Dzikrina', 'Noreen', '8', '08119461411', 'Kebon Jeruk, Jakarta Barat', NULL, NULL, NULL),
(64, 9, '2309835', '0123802818', 'Naila Aulia Hernawan', 'Naila', '8', '08119007637', 'Perumahan Mega Cinere Depok, Jalan Bukit Tinggi Blok M No. 460, Cinere, Cinere', 'AB', NULL, NULL),
(65, 9, '2410153', '0122452654', 'Rafika Aulia Ramadhan', 'Rafika', '7', '085219443004', 'Jln. Dempo 1 no. 4 Kebayoran Baru, Jakarta Selatan, 12120', 'O', NULL, NULL),
(66, 9, '2309891', '0118669632', 'Khanza Nafeeza Putri Yuszarro', 'Khanza', '8', '08185505233', 'Jl. Yanatera 12 No 8 Komp. Bulog 1 Jatiwarna, Bekasi', 'O', NULL, NULL),
(67, 10, '11196', '0099631660', 'Thalita dwi anggraeni', 'Litaa', '8', '085697213043', 'kec. kramat jati jalan kumbang dalam Rt2 Rw5', NULL, NULL, NULL),
(68, 10, '11482', '3115163106', 'risalatu nabila', 'Nabila', '7', '085719829780', 'batu ampar RT 005/002', NULL, NULL, NULL),
(69, 10, '3175040403151007', '3110248011', 'muhammad syabil faiza', 'sabil', '7', '083875732168', 'gg.sarbini rt 01/04', NULL, NULL, NULL),
(70, 10, '11395', '0119953657', 'DWI RAHAYU PUTRI', 'DWI', '7', '087792792115', 'CILILITAN BESAR RT 007/003 KEL. CILILITAN KEC. KRAMAT JATI, JAKARTA TIMUR', NULL, NULL, NULL),
(71, 10, '11259', '0091766736', 'NOVITA HERMALIA', 'NOVITA', '8', '088975304736', 'GG. H. Mujeni RT 11 RW 05 No 36. Cililitan, Kramat Jati, Kota Jakarta Timur, DKI Jakarta', NULL, NULL, NULL),
(72, 10, '0111506275', '0111506275', 'Cynthia.Balqis', 'Cynthia', '8', '085693388115', 'Jln mandala v no 11 , rt3/03 , gg alfurqon', NULL, NULL, NULL),
(73, 10, '0119460850', '0119460850', 'Kyntia Levina Ramadhani', 'Kyntia', '8', '081315190314', 'Jl. Letjen Sutoyo', 'B', NULL, NULL),
(74, 10, '11194', '0101039583', 'Sabrina Aulia', 'Nana', '8', '085779120378', 'Jl. Nusa 1, Rw 03 Rt 04, Gg.wates No.18, Jakarta Timur – Kramat Jati', 'O', NULL, NULL),
(75, 10, '11229', '0108745347', 'Safa Aulia Azzahra', 'Safa', '8', '081288273386', 'Cililitan. Rt.001/015, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta.', NULL, NULL, NULL),
(76, 10, '11471', '0115755548', 'Mei Liyani', 'Mei', '7', '089652246147', 'jl.olahraga 1 no 36a, jakarta timur', 'O', NULL, NULL),
(77, 10, '11448', '0113783394', 'Queena Aurelia hartono', 'Ena', '7', '+6289503222388', 'Jln Usaha No.57, RT.7/RW.12, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta', 'A', NULL, NULL),
(78, 10, '11413', '0117853358', 'Sabrina Zoel Putri', 'Sabrina', '1', '08388121838', 'GG. WARU CAWANG II', NULL, NULL, NULL),
(79, 10, '11434', '0126500330', 'Grace Tessalonika', 'Grace', '7', '087735363457', 'Jln Batu Ampar, Kecamatan Kramat Jati Kelurahan Batu Ampar, rt 02/02 no 35i 13520', 'B', NULL, NULL),
(80, 10, '0104394034', '0104394034', 'Zahra Putri Rahman', 'Zara', '8', '+6285282652577', 'kamp.kramat, rt:13/rw:05, cililitan, kramat jati, jakarta timur.', NULL, NULL, NULL),
(81, 10, '11217', '0106352644', 'Kaila Verda Adara', 'Adara', '8', '081585762659', 'jl. raya condet gg. masjid al-hawi 1 rt.013 rw.05 no. 23', 'A', NULL, NULL),
(82, 10, '11368', '0112336415', 'Muhammad Rasyid Ramadhan', 'Rasyid', '7', '082112429016', 'JL.DEWI SARTIKA GG. MADALI RT 001/004 KEL. CAWANG KEC KRAMAT JATI JAKARTA TIMUR', 'A', NULL, NULL),
(83, 10, '11457', '0112750987', 'Adinda Aulia', 'Dinda', '7', '085717442722', 'Kampung Kramat RT001 RW005 No 52', 'A', NULL, NULL),
(84, 10, '11231', '0105587614', 'Sri Rahayu Tasmini', 'ayu', '8', '85774816465', 'Jalan Nusa 1 Rt 09/Rw 04 No 13', NULL, NULL, NULL),
(85, 10, '11416', '3119381521', 'Shafa Nada Salsabila', 'Nada', '7', '0895322921605', 'Jl. Dewi Sartika Gg. Mesjid Bendungan Rt 001 / Rw 007 No 6 Cawang, Kramat jati, Jakarta Timur 13630', NULL, NULL, NULL),
(86, 10, '11182', '0104488428', 'MUHAMMAD IRSYAD SAPUTRA', 'icadd', '8', '08999652907', 'jl.nusa 1', NULL, NULL, NULL),
(87, 10, '11260', '0101442838', 'Nurul Atira Bandjar', 'Atira', '8', '085885679136', 'JL SMEA VI', 'AB', NULL, NULL),
(88, 10, '11472', '0102445938', 'melica indah kasyavanya', 'melica', '7', '085691850335', 'Jl.swadaya II,Rt 001/Rw 004 Nomor 22', 'O', NULL, NULL),
(89, 6, '13670', '3082801577', 'Winda Aisyah Puteri', 'Winda', 'XI Akuntan', '0858-9373-0317', 'Jalan Tanah Kusir 2 Rt12/009 No.60 Kelurahan Kebayoran Lama Selatan, Kecamatan Kebayoran Lama 12240', 'O', NULL, NULL),
(90, 6, '13759', '0081233230', 'Risa Alma Musyifa', 'Risa', 'XI MP 2', '0856-9176-7693', 'Jl. Bunga Teratai No. 232 RT.004/RW.006, Cipete Selatan, Cilandak, Jakarta Selatan 12410', NULL, NULL, NULL),
(91, 6, '13629', '0077116472', 'Itdha Narisa Putri', 'Itdha', 'XI AK 1', '085779736905', 'Jl intan no 52, RT. 002/RW.02 , Cilandak Jakarta Selatan', NULL, NULL, NULL),
(92, 6, '13650', '0072398962', 'Muthiah Nur Annisa Ramadhani', 'Anis', 'XI AK 2', '085695001623', 'Jl. H. Miran No.32, RT15/RW06, Cilandak Barat', 'B', NULL, NULL),
(93, 6, '13764', '0073094141', 'Silvia Julianty', 'Silvia', 'XI MP 2', '085731164353', 'Jl. Haji Abdul Majid RT 006/ Rw 005 No.24 Cilandak, Cipete Selatan, Jakarta Selatan', 'B', NULL, NULL),
(94, 6, '13619', '0088283013', 'Dini Aulia', 'Dini', 'XI AK 1', '085882358439', 'Jl. H. Miran RT15/RW06, Cilandak Jakarta Selatan', NULL, NULL, NULL),
(95, 6, '13664', '0077676942', 'Safinatunnajah', 'Fina', 'XI AK 2', '089524794264', 'Jl. Kesehatan bawah No 59, RT08/006, Bintaro', 'B', NULL, NULL),
(96, 6, '13652', '0076004577', 'Naia Anjani', 'Naia', 'XI AK 2', '085882707731', 'Jln. Haji Sijan Bukit Pratama Rt007/02', NULL, NULL, NULL),
(97, 6, '13758', '008606352', 'Rifha Restyana', 'Rifha', 'XI MP 2', '088902871517', 'Jl. H. Batong ll RT 04/06', 'A+', NULL, NULL),
(98, 6, '13665', '0086954526', 'Salsabila Salwa Rudis', 'Salsa', 'XI AK 2', '083875073890', 'Jl. Kubis II Pondok Cabe Ilir', NULL, NULL, NULL),
(99, 6, '13636', '3087608166', 'Kiara Nida Azkiya', 'Kia', 'XI AK 2', '081380267195', 'Jl. Klp. Peon No.36F, RT.4/RW.4, Kebagusan, Ps. Minggu, Kota Jakarta Selatan 12520', 'O', NULL, NULL),
(100, 6, '13960', '0091226056', 'Adinda Salsabila', 'Dinda', 'X LPS', '089515049199', 'Jl. Benda Terusan Rt 02 Rw 01 kel. Ciganjur kec. jagakarsa jakarta selatan 12630', 'A', NULL, NULL),
(101, 6, '14131', '0098953471', 'Salwa Amelia Fitriana', 'Salwa', 'X BD', '083152652823', 'Jl. H miad Rt 014/007 Cipete Utara Kebayoran Baru Jakarta Selatan', NULL, NULL, NULL),
(102, 6, '13994', '0083965233', 'Wazha Rosiana Setyawan', 'Azha', 'X LPS', '08888093383', 'Jln. Anggur v dalam rt 08/06 Cipete Selatan, Kec. Cilandak, Kota Jakarta Selatan', 'O', NULL, NULL),
(103, 6, '13987', '0085315880', 'Reyna Putri Ramadani', 'Reyna', 'X LPS', '081296163263', 'Jl. Asem ll Gg. Hj.Muhammad, RT/RW 012/002 Cipete Selatan', 'O', NULL, NULL),
(104, 6, '13986', '0086948724', 'Rauf Gutama', 'Raup', 'X LPS', '087884275786', 'Jl. Pasar Inpres RT 004/ Rw 014 No.26B Gandaria Utara, Kebayoran Baru, Jakarta Selatan', NULL, NULL, NULL),
(105, 6, '13955', '0096109261', 'TASYA OLIFIA ASSYAFAH', 'Tasya', 'X AK 2', '085717466840', 'Jln jati indah RT002/001 Pondok Pinang, Jakarta Selatan', NULL, NULL, NULL),
(106, 6, '13913', '0095603472', 'Ferisha Putri Anola', 'Ferisha', 'X AK 2', '081906154040', 'Jl. H. Miran, RT15/RW06, Cilandak Barat', 'O', NULL, NULL),
(107, 6, '14061', '0081640803', 'Saskia', 'Saski/kia', 'X MP 2', '0881025488676', 'Jl. H. Mahali 1, Radio Dalam, Rt 008/Rw 008, Jakarta Selatan', 'O', NULL, NULL),
(108, 6, '13606', '0073864268', 'Amanda Dwi Aditya Utami', 'Manda', 'XI AK 1', '082116313975', 'Jl. Pasir 3 Dalam Rt004/Rw006, Ciganjur, Jagakarsa, Jakarta Selatan', 'A', NULL, NULL),
(109, 6, '14035', '0087858430', 'Jingga Naura Aulia', 'Jingga', 'X MP 2', '087847581488', 'Jalan Minang Kramat 1 RT.001/RW.014, Radio Dalam, Jakarta Selatan', 'O', NULL, NULL),
(110, 6, '13746', '0076769324', 'Najla Raysah', 'Najla', 'XI MP 2', '087881674098', 'Jalan Cilandak Dalam I No.6, RT.6/RW.13, Jakarta Selatan', 'O', NULL, NULL),
(111, 6, '13980', '0084826909', 'Muhammad kivlan junians', 'Kivlan', 'X LPS', '085283215921', 'GG. ASEM RT.07/07 KEL KEBAGUSAN, PASAR MINGGU, JAKARTA SELATAN', 'A', NULL, NULL),
(112, 6, '13889', '0089070423', 'Afifa Novita Sari', 'Novi', 'X AK 2', '089606887132', 'Jl. P Antasari gg Haji Piih RT 02 RW 01 , Cilandak, Jakarta Selatan', 'O', NULL, NULL),
(113, 6, '1369', '3095243584', 'deandra ananda fatiha', 'dean', 'X LPS', '085692187508', 'Jl. Pertanian ll rt 005 rw 004 lebak bulus jakarta selatan', 'A', NULL, NULL),
(114, 6, '13935', '0087461368', 'Nurul Hotimah', 'Nurul', 'X AK 2', '082113192362', 'jl. Jamblang RT 008/RW 010, Jati Padang, Pasar Minggu.', 'A+', NULL, NULL),
(115, 6, '13775', '0071948378', 'Zahira Eresvha Adbelia', 'Zahira', 'XI MP 2', '085714918398', 'jl. Kirai No.7, Cipete Utara, Kebayoran Baru', 'O', NULL, NULL),
(116, 6, '14041', '0092995111', 'Khanza Arifah Andani', 'Khanza, Caca', 'X MP 2', '081280667117', 'jl. haji jian RT 012/003 No. 51, Cipete Utara, Kebayoran Baru', 'A', NULL, NULL),
(117, 6, '13830', '0085548576', 'Rofiqotus sholihah', 'ropi,qotus', 'XI Br 2', '089519533038', 'jl. Madrasah no.14 Rt 09 Rw 02 gandaria selatan kecamatan cilandak,jakarta selatan', NULL, NULL, NULL),
(118, 6, '14067', '0098744342', 'Zahrah Rizka Nuraeni', 'Zahra, riska', 'X MP 2', '0895414919693', 'Jl hj sijan rt 007/003. No. 94, lebak bulus, jakarta selatan', 'O', NULL, NULL),
(119, 6, '23121', '0096972818', 'Kirana wijayanti', 'Kirana', '8-3', '0857-1630-1136', 'JLN H. Mursid', NULL, NULL, NULL),
(120, 6, '24072', '0103291839', 'Nayla zivana ramdhini', 'nayla', '7.2', '0895-1905-6486', 'Jalan Sadar 2 No 21 RT 002 RW 002', 'O', NULL, NULL),
(121, 6, '23105', '0101787150', 'Bunga Anida Pratiwi', 'Bunga', '8.3', '085894281410', 'Jl Kebagusan Besar 2', 'O', NULL, NULL),
(122, 6, '23142', '0108830597', 'zaifa Dianza abidin', 'Zaifa', '8.3', '0895-2002-2183', 'Jl Kebagusan Besar, gang pondok,  no 16 rt 6/rw 5', 'A+', NULL, NULL),
(123, 6, NULL, NULL, 'martha dwi andini', 'martha', '8-3', '0881024843895', 'komplek marinir cilandak timur jl. paus 3', 'O', NULL, NULL),
(124, 6, NULL, NULL, 'meisya ananda putri', 'meisya', '7.1', '0895-3517-87483', 'Jl kebagusan besar, gang H kong muntalih, rt 2/rw 5', NULL, NULL, NULL),
(125, 6, NULL, '0108201196', 'Keyszah Alisty', 'Keyza', '8-2', '087762673131', 'GG. Pepaya No 70 RT012/RW03 Lenteng Agung', 'B', NULL, NULL),
(126, 6, NULL, '0125226661', 'Maharani Putri Nurhasbi', 'Rani', '7.2', '0895-4006-49798', 'Jalan Raya Lenteng agung Gg Haji Meran No 138 Rt09 /Rw 05 Jagakartsa Jakarta Selatan', 'O', NULL, NULL),
(127, 6, '24001', '3110425843', 'adinda efriliani', 'dinda', '7.1', '896-1296-9104', 'Jl manggis, GG manggis dalam ll, Rt 1/ Rw1', NULL, NULL, NULL),
(128, 6, '23105', '0101787150', 'Bunga Anida Pratiwi', 'Bunga', '8.3', '085894281410', 'Jl Kebagusan Besar 2', 'O', NULL, NULL),
(129, 6, '23142', '0108830597', 'zaifa Dianza abidin', 'Zaifa', '8.3', '0895-2002-2183', 'Jl Kebagusan Besar, gang pondok,  no 16 rt 6/rw 5', 'A+', NULL, NULL),
(130, 6, NULL, NULL, 'martha dwi andini', 'martha', '8-3', '0881024843895', 'komplek marinir cilandak timur jl. paus 3', 'O', NULL, NULL),
(131, 6, NULL, '0125226661', 'Maharani Putri Nurhasbi', 'Rani', '7.2', '0895-4006-49798', 'Jalan Raya Lenteng agung Gg Haji Meran No 138 Rt09 /Rw 05 Jagakartsa Jakarta Selatan', 'O', NULL, NULL),
(132, 6, NULL, '0114687421', 'meisya ananda putri', 'meisya', '7.1', '0895-3517-87483', 'Jl kebagusan besar, gang H kong muntalih, rt 2/rw 5', NULL, NULL, NULL),
(133, 6, NULL, '0108201196', 'Keyszah Alisty', 'Keyza', '8-2', '087762673131', 'GG. Pepaya No 70 RT012/RW03 Lenteng Agung', 'B', NULL, NULL),
(134, 6, '24001', '3110425843', 'adinda efriliani', 'dinda', '7.1', '896-1296-9104', 'Jl manggis, GG manggis dalam ll, Rt 1/ Rw1', NULL, NULL, NULL),
(135, 3, NULL, '0067069124', 'Muhammad Hazaril Pramana', 'Hazaril', '12-1', '083899049925', 'Jalan Keselamatan Gang Solihun 3 No.17 RT 11/RW 01', 'A', NULL, NULL),
(136, 3, NULL, '0081581551', 'Halvien Hibatullah', 'Alvin', '11-3', '085692665585', 'Jalan Benteng Garuda Dalam', 'O', NULL, NULL),
(137, 3, NULL, '0076008590', 'Nessya Aulia Peatiwi', 'Nessya', '11-1', '085884935131', 'Jalan Kayumanis V Lama No.20', 'O', NULL, NULL),
(138, 3, NULL, '0085992000', 'Keiyla Fadillah Putri', 'Keiyla', '11-4', '081387211304', 'Jalan Tebet Barat VII E No.4 RT.002/RW.04', 'O', NULL, NULL),
(139, 3, NULL, '0083339363', 'Abelizka Ramadhani', 'abell', '10-4', '081410652709', 'Jl. Tebet Barat Dalam Raya No.80', NULL, NULL, NULL),
(140, 3, NULL, '0093985372', 'Rifa Anayah', 'Rifa', '10-4', '085215812795', 'JL. Gelatik 1 RT 016 RW 002 No.31', NULL, NULL, NULL),
(141, 3, NULL, '0071486129', 'Muhammad Risky Khaerulloh', 'Risky', '11-3', '083878091588', 'Gang Langgar No.16a RT 04 RW 02, Menteng Dalam, Tebet, Jakarta Selatan 12870', 'O', NULL, NULL),
(142, 3, NULL, '0077175494', 'Muhamad sendi fauzi', 'Sendi', '11-3', '081324632008', 'Jalan Rawajati Timur VI', 'A', NULL, NULL),
(143, 3, NULL, '0074236650', 'Devina Artika Agustin', 'Devina', '11-2', '089501539217', 'Jalan Menteng atas dalam No.02,RT.011/RW.06', 'A', NULL, NULL),
(144, 3, NULL, '0084876925', 'Lalyta Nur Sabila', 'Lala', '10-5', '087745778545', 'Jl. Kampung Melayu Kecil 5', NULL, NULL, NULL),
(145, 3, NULL, '3090777721', 'Rara Khairun\'nisa', 'Rara', '10-5', '0895322277367', 'Jalan Kenari 2 RT 6/RW 4 No.16, Kenari, Senen, Jakarta Pusat', 'AB', NULL, NULL),
(146, 3, NULL, '0094998592', 'Aulia Azahra', 'Aul', '10-5', '85817279918', 'Kalibata City Tower Damar Unit 02AS', 'A', NULL, NULL),
(147, 3, NULL, '0089766488', 'Malik Teru Pramono', 'Teru', '11-3', '0895358283661', 'Jalan Pengadegan Timur 3, No.5 RT 6 RW 2 Pancoran Jakarta Selatan 12770', 'O', NULL, NULL),
(148, 3, NULL, '0084104102', 'Muhammad Fajar Tri Attaullah', 'Fajar', '11-2', '082178026898', 'Jl. Prof. Dr. Soepomo No231 7, RT 7/RW 01, Menteng Dalam, Tebet, Jaksel', 'B', NULL, NULL),
(149, 3, NULL, '0084191132', 'Tia Mutiara Permata Sari', 'Tia', '11-1', '08152352663', 'Jalan Mampang Prapatan 11', 'B', NULL, NULL),
(150, 3, NULL, '0073325147', 'Raisya Azahra', 'Rara', '11-1', '089652457220', 'Apartemen Mansion Casablanca Jl. Raya Casablanca No.Kav.12, RT.14/RW.5, Menteng Dalam', 'B', NULL, NULL),
(151, 3, NULL, '3093679260', 'Aida Salsabila', 'Aida', '10-4', '081295960714', 'Jl. Tegal Parang Utara GG 1 No.26 RT 02/07 Mampang Prapatan', NULL, NULL, NULL),
(152, 3, NULL, '0091165233', 'Allico Joel Alfons', 'Joel', '10-5', '085781813013', 'Apartemen Gading Nias No.13, Pegangsaan Dua', 'O', NULL, NULL),
(153, 3, NULL, '0095496623', 'ISMI SHILA MAHARANI', 'ISMI', '10-5', '085880498074', 'Jalan Rasamala 7 RT 10 RW 13 No4D Gang X', NULL, NULL, NULL),
(154, 3, NULL, '3090525210', 'Almirah Tsalisa Ramadhan', 'Almirah', '10-3', '087776739502', 'Jl. Widuri No.19 RT 13/RW 3, Kuningan Karet, Kecamatan Setiabudi, Jakarta Selatan', NULL, NULL, NULL),
(155, 3, NULL, '0085152924', 'selidia muhzihza', 'seli', '10-5', '085964177794', 'Jl. Setia Budi V Gg. II No.9 RT 06/RW 03, Kuningan, SetiaBudi, Jakarta Selatan, 12910', 'A', NULL, NULL),
(156, 3, NULL, '00861709265', 'aurelya kirania putri', 'kiran', '11-5', '081310773704', 'Jalan Lapangan Ros Barat II', 'A', NULL, NULL),
(157, 3, NULL, '0082503278', 'Aira kesya ramadhani', 'aira', '10-4', '085693696664', 'Rasuna Tower 12 (Apartemen)', 'O', NULL, NULL),
(162, 6, '4319', '3133394849', '', 'Binar', '5', NULL, 'Muamalah v', 'O', NULL, NULL),
(165, 15, '4336', '3129199191', 'Regina azka devina', NULL, '5', NULL, 'Jl gandaria raya no 1e', NULL, NULL, NULL),
(166, 15, '4321', '3128666160', 'Diah Anggraini Kusumawati', NULL, '5', NULL, 'gg kramat RT 09/007 kelurahan jagakarsa kecamatan jagakarsa Jakarta selatan', NULL, NULL, NULL),
(167, 15, '3124602577', '3124602577', 'Destania Aisyara', NULL, '5', NULL, 'Jl. Jagakarsa 1 Rt. 004/002 no. 2 Jaksel', 'O', NULL, NULL),
(168, 15, '4371', '3143741619', 'Habibi Nailun Ibtisyam', NULL, '4', NULL, 'Jln. Jagakarsa raya rt.08 rw.05', 'A', NULL, NULL),
(169, 15, '4319', '3133394849', 'Binar Calista naras yono', NULL, '5', NULL, 'Muamalah v', 'O', NULL, NULL),
(170, 15, '4360', '3143765057', 'ARYA SATYA NOORZAKI', NULL, '4', NULL, 'Jl. Jagakarsa II Rt.001/007, Jagakarsa', NULL, NULL, NULL),
(171, 15, '4361', '3131583154', 'Asyifa Lowinsky Al Saddah', NULL, '4', NULL, 'Jl.jagakarsa 2 Rt.01/07', NULL, NULL, NULL),
(175, 18, '181901046', '0112924437', 'Fahrul Rozi', 'Rozi', '7-3', '08953213810339', 'jalan saidan,no 42,rt2/9 kel.tanah baru, kec.beji,depok', 'B', NULL, NULL),
(176, 18, '171801008', '0107695145', 'Anggita Maharani Putri', 'Gita', '8-1', '082117210565', 'Jl. Anggrek 1 no 21 Rt 08/09 Tanah baru beji depok', NULL, NULL, NULL),
(177, 18, '0116312605', '0116312605', 'Allysia Putri', 'Alis', '7-3', '089662851313', 'Gg.kemuning  RT07/RW 019', 'A', NULL, NULL),
(178, 18, '0123034277', '0123034277', 'Winindia Asfriyanti', 'Nindy', '7-2', '089604794300', 'Jl.m.zakaria', NULL, NULL, NULL),
(249, 15, '3133010733', '4090', 'putri Audi aqila', NULL, '5c(lima c)', '89531981317', 'JL. HJ.AMSAR,RT001 RW 009 , CIPULIR KEC.KEBAYORAN LAMA', 'O', NULL, NULL),
(250, 15, '101016305029', '132764790', 'safa azzahra rahmadani', NULL, '5B', '81292418727', 'CIPULIR 2 , RT 8 , RW 4 KEBAYORAN LAMA', NULL, NULL, NULL),
(251, 15, NULL, '139165390', 'Akeysha Amira Sanders', NULL, '5c', '081818297628', 'Jalan Al Mubarok 1 RT 13 RW 06 no 37', 'O', NULL, NULL),
(373, 20, '3134788510', '3134788510', 'Amira Mahya Dzakira', 'Amira', '5C', '081283158687', 'Jl. cipulir 2 RT 10 RW 4 No. 13', 'O', NULL, NULL),
(374, 20, '101016305029', '3136328423', 'sabiqah bashasha noor', 'biqull', '5a', '085213873030', 'JL CILEDUG RAYA GG KECE RT 004 RW 001. 5 NO 3', 'O', NULL, NULL),
(375, 20, '0136512389', '0136512389', 'nadhifa Khairunissa', 'dhifa', '5a', '081410195347', 'peninggaran no.35 RT 010/RW 06', NULL, NULL, NULL),
(376, 20, '3136676161', '3136676161', 'AISYAH SHAREENA ADNI HIMMAWAN', 'AISYAH', '5B', '085888115019', 'JL CIPULIR 1 NO 4', 'B', NULL, NULL),
(377, 20, '101016305029', '01134489942', 'Aqilah Rabbani', 'Aqilah', '5b', '08815390194', 'jl.cipulir 5 rt11/08 no 14a', 'O', NULL, NULL),
(378, 20, '4015', '3136975387', 'Dewi Kinara', 'Dewi', '5a', '0881-0257-08756', 'jalan makan gang murtado no14', NULL, NULL, NULL),
(379, 20, '0136512389', '0136512389', 'nadhifa khairunissa', 'dhifa', '5a', '081410195347', 'peninggaran no.35 RT 010/RW 06', NULL, NULL, NULL),
(380, 20, '3133028734', '3133028734', 'Naura Nadzifah', 'Naura', '5b', '081385155799', 'jalan cipulir 1 RT 08 RW 04 no 22', 'O', NULL, NULL),
(381, 20, '101016305029', '0134165691', 'Zalika Ghassani Bazla', 'Zalika', '5d', '085711970884', 'Jl. Cipulir ll RT 11 RW 04 No.5 Cipulir, Kebayoran Lama Jakarta Selatan', 'B', NULL, NULL),
(382, 20, '101016305029', '3138207482', 'RAE SITA ALMIRA', 'ALMIRA', '5B', '881-0116-40164', 'jalan cipulir 1,RT 15,RW 4,', 'B+', NULL, NULL),
(383, 20, '3134067784', '3134067784', 'lintang nadha ramadhan', 'lintang', '5c', '821 1821 7218', 'jl minang keramat 1', 'O', NULL, NULL),
(384, 20, '101016305029', '3131525422', 'ayu Wahyuni', 'ayu', '5D', '+6282260557227', 'cipulir Rt 011 Rw 02', NULL, NULL, NULL),
(385, 20, '3138680865', '3138680865', 'Maura Yasmin', 'Maura', '5A', '0896-0283-1463', 'Jl kebon mangga  4 no 16 RT 13 RW 02', 'A', NULL, NULL),
(386, 20, '3174056203131006', '3174056203131006', 'Putri Audi aqila', 'putri', '5c', '089531981317', 'jalan hj amsar RT 001 RW 009', 'O', NULL, NULL),
(387, 20, '3133010733', '3133010733', 'putri Audi aqila', 'putri', '5c(lima c)', '089531981317', 'jalan hj amsar RT 001 RW 009', 'O', NULL, NULL),
(388, 20, '3130263391', '3130263391', 'Almira Diandra Riviani', 'Diandra', '5A', '+62 882-9972-5557', 'Jln cipulir 3 RT 016 RW 08 no.19 Kebayoran lama Jakarta Selatan', 'O', NULL, NULL),
(389, 20, '3133010733', '4090', 'putri Audi aqila', 'putri/mput', '5c(lima c)', '089531981317', 'JL. HJ.AMSAR,RT001 RW 009 , CIPULIR KEC.KEBAYORAN LAMA', 'O', NULL, NULL),
(390, 20, '101016305029', '0132764790', 'safa azzahra rahmadani', 'safa', '5B', '081292418727', 'CIPULIR 2 , RT 8 , RW 4 KEBAYORAN LAMA', NULL, NULL, NULL),
(391, 20, NULL, '0139165390', 'Akeysha Amira Sanders', 'kekey/keysha', '5c', '0818 1829 7628', 'Jalan Al Mubarok 1 RT 13 RW 06 no 37', 'O', NULL, NULL),
(392, 20, '4079', '0134124407', 'Kahlaan Amnel Rusmana', 'Kahlaan', '5C', '087885717837', 'JL.CIPULIR, RT 4 RW 5, CIPULIR, Kec. Kebayoran Lama', NULL, NULL, NULL),
(393, 20, '4077', '3136222638', 'Falecah faisal', 'Leskah', '5C', '0895401890438', 'jl. kebon mangga rt 13 rw 02 Cipulir kebayoran lama jakarta selatan', NULL, NULL, NULL),
(394, 20, '0135930096', '0135930096', 'rania ayni riyanto', 'rania', '5D', '0895351446182', 'gg damai 1 rt 02/05 no. 14', 'O', NULL, NULL),
(395, 20, '3131524325', '3131524325', 'Kanza Humaira Al-Banna', 'Kanza', '5A', '082127945583', 'Jln.panjang.gg swadaya RT:011 RW:09', 'O', NULL, NULL),
(396, 20, '0129650463', '0129650463', 'eryka tri suhartiwi', 'eryka', '5', '0852-2072-3982', 'gg budi Asih RT 07 RW 08', NULL, NULL, NULL),
(397, 20, '3131686007', '3131686007', 'zahra salwa', 'zahra', '5b', '087891409545', 'jln cipulir 1 rt 015 rw 08 no: 5', 'B', NULL, NULL),
(398, 20, '0132807607', '0132807607', 'cahaya Kirana indriawan', 'cahaya/ aya', '5', '088214532557', 'Jl Cipulir VI, RT 010 RW 08 kecamatan kebayoran lama', 'B', NULL, NULL),
(399, 20, '31740550011310003', '0132085033', 'Anindita Zahira', 'Nindi', '5D', '089506334493', 'Jl. Kebon Mangga II', 'B', NULL, NULL),
(401, 19, '0088705160', '232410102', 'Kezia Putri', 'Zia', '11', '081901843057', 'Jl. Semangka 10, Depok Jaya, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16432', 'B', NULL, NULL),
(402, 19, '242510088', '0093255555', 'Isna Lutfiannissa Fadzrin', 'Isna', '10', '089526483355', 'Jl. H Usman no 26 RT.1/6 Gandul Cinere Depok', 'O', NULL, NULL),
(403, 19, '242510055', '0087502783', 'Erlista Alfari Khanza', 'Aza', '10', '083807871534', 'Jl.beringin raya rt 09/12', 'A', NULL, NULL),
(404, 19, '242520052', '0075573952', 'Dinda Ulfia Nurbaity', 'Dinda', '10', '0895321380449', 'jln radem sanim rt 01 rw 11', 'AB', NULL, NULL),
(405, 19, '232410111', '0077376829', 'Maskama Adilah', 'Maskama', '11', '085776207357', 'Jl. Kemiri Jaya', 'O', NULL, NULL),
(406, 19, '232410187', '30087488450', 'Riska Setiawati', 'Riska', '11', '089527538178', 'Jalan Aster 4 no 99 GDC', 'A', NULL, NULL),
(407, 19, '222310022', '0079905028', 'Alia Amelia', 'Lia', '12', '085710308508', 'Jln. M ali II blok anyelir RT.007 RW.004 No.42 beji depok', 'AB', NULL, NULL),
(408, 19, '23410143', '232410143', 'Mutiara Cipta Nurul Azizah', 'Mutiara', '11', '089696159636', 'jl.beringin raya no28 rt04/12', 'O', NULL, NULL),
(409, 21, '4841', '3139349816', 'Ahira Sachi Maarif', 'Ahira', '5A', '081212955652', 'Jl.H.Buang Rt 007/Rw 007 Ulujami Pesanggrahan Jakarta Selatan', 'A', NULL, NULL),
(410, 21, '5060', '3140199978', 'Signora Neva Azzahra', 'Neva', '4', '085694516643', 'Jl ulujami raya', 'AB', NULL, NULL),
(411, 21, '4889', '3139609220', 'Faezy Mulia Muslana', 'Faezy', '5', '087780008489', 'Jl Ulujami Raya Komp. Perdatam I No 17 Rt008/05 Pesanggrahan Jakarta Selatan 12320', 'A+', NULL, NULL),
(412, 21, '2811', '3152259686', 'MAURA AMIRAJEHAN', 'MAURA', '4 B', '085283916033', 'Jl.  Bunga Mayabg VI', 'A', NULL, NULL),
(413, 21, '5046', '0145830200', 'Naomy Indah Kirana', 'Naomy', '4A', '083874674805', 'Jl. Masjid Al-Muflihun Rt 004/Rw 010 Bintaro Pesanggrahan Jakarta Selatan', NULL, NULL, NULL),
(414, 21, '4928', '0133180620', 'Mochamad Dzaki Mulyadi', 'Dzaki', '5A', '085814029603', 'Bintaro permai 3 rt 009/009', NULL, NULL, NULL),
(415, 21, '4968', '0149053037', 'Shakyla Maisyara', 'Shakyla', '5B', '081380245853', 'Jl,aren1 no 21G rt15,rw 03 pondok Betung kec pondok aren Tangsel', 'O', NULL, NULL),
(416, 21, '4948', '0132841490', 'NURLAILY AZIZAH', 'AZIZAH', '5C', '085289717323', 'Jl KP BINTARO RT 07 RW 02', 'B', NULL, NULL),
(417, 21, '4970', '0136909268', 'SYAKILA JUNITA AZZAHRA', 'JUNITA', '5B', '08815668053', 'JL.MASJID AL MUFLIHUN GG AMINAH RT 004 RW 010', 'B+', NULL, NULL),
(418, 21, '21221077', '3151105873', 'Sofia Adzkia Azzahra', 'Sofia', '4A', '081213675996', 'Pondok Jaya JL.Beton A5 no 18-19 bintaro sektor 3A', 'A', NULL, NULL),
(419, 21, '4801', '3123299987', 'Suci agustin', 'Suci', '5', '082114125103', 'Jl bhakti rt 06 rw 01', 'A', NULL, NULL),
(420, 21, '4955', '3137470914', 'RAISSA HARDIYANTI', 'Raissa', '5 B', '089637788133', 'kp. BINTARO rt 07 rw 01  Pesanggrahan. kec Pesanggrahan', 'B', NULL, NULL),
(421, 21, '4849', '3134057903', 'Alyya zahra', 'Alyya', '5', '083891856559', 'Jln pintu satu rt02/03 Pabuaran barat,Tanggerang selatan', NULL, NULL, NULL),
(422, 21, '4917', '3131299888', 'Kiranaya putri pradanti', 'Naya', '5c', '081806773981', 'Kamp Bintaro  RT 001 Rw 001 No 37 kel. Pesanggrahan kec. Pesanggrahan jak sel', NULL, NULL, NULL),
(423, 21, '202107007', '0137663277', 'Briggitha athifa revalina', 'Briggitha', '5', '085781283600', 'KOMP polri Ulujami F 15', 'A', NULL, NULL),
(424, 21, '5299', '0134880817', 'Mohammad Nabil Tsany Pratama', 'Nabil', '5', '081347383949', 'Jl Bintaro Permai no 26, Rt 02, Rw 010, Bintaro, Pesanggrahan', 'O', NULL, NULL),
(425, 21, '5058', '0141434903', 'SAVIRA SALSABILLAH HAKIM', 'SAVIRA', '4 A', '081287263850', 'Jl. Bintaro permai III RT 03/09', NULL, NULL, NULL),
(426, 21, '4864', '3141393058', 'Ataya qisya humaira', 'Ataya', '5 A', '085280374551', 'Jalan Bintaro permai 3 no.20 jakarta selatan', NULL, NULL, NULL),
(427, 21, '4926', '3133788576', 'Muhammad Azka Ramadhan', 'Azka', '5', '085715254279', 'Jalan Bintaro permai III Gang Mawar RT/RW : 005/009 No.11 Pesanggrahan, Jakarta Selatan', 'B', NULL, NULL),
(428, 21, '4886', '3145946355', 'Dzaky Putra Aditya', 'Dzaky', 'V-B', '085780261884', 'Sangrila Indah Dua, Jl.Sakti 1 RT 005 RW 006 No.81 Petukangan selatan Pesanggrahan Jakarta Selatan', 'B', NULL, NULL),
(429, 21, '4847', '0132520408', 'Alzena Ramadania', 'Alzena', '5C', '089512271615', 'Jl. Permai |||, RT 5, RW 9, Bintaro, Pesanggrahan, Kec. Pesanggrahan', 'AB', NULL, NULL),
(430, 21, '5044', '0149231079', 'Mysha Aurora Arifin', 'Mysha', '4', '0895410805159', 'Jl. Bintaro permai 2, Rt 05/Rw 01', NULL, NULL, NULL),
(431, 21, '4750', '0121100456', 'KURNIA ADELIA LESTARI', 'KURNIA', '6C', '085694381102', 'JL. Penerangan VI Rt 009/007', 'B', NULL, NULL),
(432, 21, '4946', '0135055832', 'NOVIA SITI ASANTI', 'NOVIA', '5A', '0895321164978', 'Jalan Bintaro permai lll RT 14 ,RW09', NULL, NULL, NULL),
(433, 21, '4911', '0134480804', 'keyla rizkianur winata', 'keyla', '5', '081316670727', 'jl Bintaro permai 3 rt 6 rw 9', NULL, NULL, NULL),
(434, 21, '5312', '0145734990', 'ABRISAM AHNAF CHURNIAWAN', 'BIMA', '5', '082153558695', 'KOMP PU JL B NO 6 RT 05 RW 12 BINTARO PESANGGRAHAN JAKARTA SELATAN', 'A', NULL, NULL),
(435, 21, '4857', '3142301801', 'Aqilah Dalia Syahwa', 'Aqilah', '5', '089685651127', 'Jln sakti 1 No.78 Rt.005/006', NULL, NULL, NULL),
(436, 22, NULL, NULL, 'Nafisah azahra', 'Nafisah', '5.c', '088871065167', 'Jln bonjol', 'A', NULL, NULL),
(437, 22, '4336', '3143209455', 'Jacindamaharani', 'Jacinda', '4A', '081389970940', 'Victory Tattoo Jakarta, Jl. Cempaka Raya No.34, Bintaro, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12330', 'O', NULL, NULL),
(438, 22, '4386', '3130924586', 'Nailalhana adiba rachman', 'Naila', '5A', '089652879995', 'Jl rawa papan rt 08/06', 'O', NULL, NULL),
(439, 22, '4336', '3134130027', 'Auna Zulfa Oktaviani', 'Auna', '5c', '082120891956', 'Jl.Rc veteran no8 RT 01/01 Bintaro Pesanggrahan', 'O', NULL, NULL),
(440, 22, '4328', '0139605750', 'ALIIF RICHI HABIBIE', 'Richi', '5B', '08562156585', 'Jl. Mawar dalam 2  No. 41D rt. 07/rw.013 kel. Bintaro kec. Pesanggragan jaksel 12330', 'O', NULL, NULL),
(441, 22, '4345', '3135562811', 'Dzaky Mahardika Utomo', 'Dzaky', '5C', '089626144006', 'Jl.Rawapapan no.2 rt.009 rw.06 ,kel.Bintaro kec.Pesanggrahan Jakarta Selatan 12330', 'O', NULL, NULL),
(442, 22, '4383', '3138842368', 'Nabilah riza segeir', 'Nabilah', '5C', '087797671333', 'jl. Walet VIII blok W1 no. 17', 'A', NULL, NULL),
(443, 22, '4385', '3130025249', 'NAFISAH AZAHRA', 'Nafisah', '5C', '081213479203', 'JL. H UNG. RT10 /RW04.UTAN PANJANG KEC. KEMAYORAN', 'A', NULL, NULL),
(444, 22, '4374', '3131958258', 'MUHAMMAD DANU MAHLEQA', 'danu', '5c', '08979358007', 'jl. bunga lili rtv10 rw 06, kel.bintaro', 'B', NULL, NULL),
(445, 22, '630401000000', '20103140', 'Aina Talita Safira', 'AINA', '5', '089629951069', 'Jl.h.mahbub', 'A', NULL, NULL),
(446, 22, '4360', '0134091281', 'Keyla Latifah Azahra', 'Keyla', '5A', '085280889156', 'Jln kesehatan bawah RT.08 RW.06', NULL, NULL, NULL),
(447, 22, '4417', '3130235694', 'Humaira syafwana shidqia', 'Humaira', '5c', '085718290403', 'JALAN RAWA PAPAN RT05 RW 06 NO 23', 'A', NULL, NULL),
(448, 22, '4417', '3130235694', 'HUMAIRA SYAFWANA SHIDQIA', 'Humaira', '5c', '085718290403', 'JALAN RAWA PAPAN RT05 RW 06 NO 23', 'A', NULL, NULL),
(449, 22, '0', '3140414756', 'Ferlita Adelia', 'Ferlita', '4a', '085814687293', 'Jl.cempaka IV Bintaro', 'O', NULL, NULL),
(450, 22, '4403', '3138301151', 'SHEZA LATISHA AS SIDDIQ', 'SHEZA', '5C', '085691850507', 'JL. BINTARO TENGAH BLOK S3 NO.8', 'A', NULL, NULL),
(451, 22, '4338', '3136384642', 'AZKIA CHAIRUNNISA SUGIART', 'Azkia', '5a', '081585764496', 'Jl.rawapapan RT 11/ RW 06 bintaro', NULL, NULL, NULL),
(452, 22, '4402', '0132669862', 'Sarah Khairunnisa', 'Sarah', '5C', '081316004124', 'Jl.H.Salim', 'AB', NULL, NULL),
(493, 23, '2914', '3143612037', 'Teduh Attaya Razzanowi', 'Owie', '5', '082110699038', 'Jl Rancho Indah No 30 RT 05 RW 06 Tanjung Barat', 'B+', NULL, NULL),
(494, 23, '2973', '0153347224', 'SILVI NURKHODIJAH', 'SILVI', '4', '087784138782', 'Jln.kp utan RT 011 RW 05 Kel Ragunan', 'A', NULL, NULL),
(495, 23, NULL, NULL, 'Nadya Alyssa Batubara', 'Nadya', '5 B', '081314346079', 'Jl. M. Kahfi 1. Gg. Sawo, Ciganjur, Jakarta Selatan', 'O', NULL, NULL),
(496, 23, '2978', '3146663724', 'Ahmad andra aditya', 'Andra', '4', '081384293493', 'Jl. Gotong royong ll', 'AB+', NULL, NULL),
(497, 23, '2988', '3155558626', 'Gilang Dzaky Ardhana', 'Gilang', '4B', '08561090005', 'Komplek Polri Ragunan Jalan R Nomor 16A', NULL, NULL, NULL),
(498, 23, '3000', '0152230293', 'TALITA NURHUMAIRAH', 'Ira', '4B', '0895704416800', 'Jl. Jatipadang V Rt. 08 Rw. 04 No. 26 Kel. Jatipadang Kec. Pasar minggu Jak-sel', 'B', NULL, NULL),
(499, 23, '2901', '3130252635', 'Khansa Kayyisah Azzahra', 'Khansa', '5', '085172291377', 'Jln. Cilandak kko kp. Utan Rt 10/08', '0', NULL, NULL),
(500, 23, '2984', '0143630393', 'Binar milan gemintang', 'Binar', '4', '089653438940', 'Jl.jatipadang rt004/09 no.21 jatipadang pasar minggu', NULL, NULL, NULL),
(501, 23, '2959', '3142475790', 'Arjuna Bazli Al Fathir', 'Arjuna', '4', '085775069057', 'Kampung Bendungan RT 003/02', 'A', NULL, NULL),
(502, 23, '101016000000', '3146297408', 'Queenqu Nur Aqilla Alhaqq', 'Queen', '5B', '085695631769', 'Jln.Jati Padang V Rt008/Rw004 No.33 Jati Padang Pasar Minggu Jakarta Selatan 12540ar Minggu', 'A', NULL, NULL),
(503, 23, '2954', '0152620296', 'ADIA RAFA FATHINA', 'ADIA', '4A', '087759527555', 'Kp PEKAYON RT07/10 NO 21', 'O', NULL, NULL),
(504, 23, '2933', '0144840036', 'Dzakira Thalita Zahra', 'Dzakira', '5', '0895703107773 / 085781196764', 'Jl. Manggasari No.14, Jatipadang, Ps. Minggu, Jakarta Selatan', NULL, NULL, NULL),
(505, 23, '2976', '03147156485', 'Zidane Muhammad Ibrahim Aqila', 'Zidane', '4 a', '082312331973', 'Jalan Margasatwa Barat No.41 Rt. 014/008 Ragunan Pasar Minggu Jakarta Selatan', NULL, NULL, NULL),
(506, 23, '2900', '3141414873', 'Henny Mulyani Ginting', 'Henny', '5A', '081374747763', 'Kebagusan City Tower A Lantai 11-08 RT.001/003', 'O', NULL, NULL),
(507, 23, '2965', '3138326019', 'MARWAH AMORALIA IRTA', 'AMORA', '4A', '081387679456', 'Jln.musyawarah RT.003/01', NULL, NULL, NULL),
(508, 23, '2974', '0156067897', 'Sofia Milva Elfyando', 'Sofi', 'IV A', '089664532574', 'Jl.cilandak kko gg abah ,rt07/rw05 kel.ragunan,kec.pasar minggu jakarta selatan', 'O', NULL, NULL),
(509, 23, '2916', '3141464735', 'Zulfan Azhar Raihan', 'Zulfan', '5', '085717841740', 'Jl.Raya Jatipadang gg.masjid al ridwan rt06/09 no.13', 'A', NULL, NULL),
(510, 23, NULL, '0139730051', 'Syahbana ali', 'Syahba', '5', '085714348247', 'Jl jatipadang 3 d9 rt008 rw 005', 'B', NULL, NULL),
(511, 23, NULL, NULL, 'Ameera hesti perwitasari', 'Ameera', '4A', '082138404119', 'Gang abbah bawah no 52 F ragunan ps minggu', 'A', NULL, NULL),
(512, 23, NULL, '3159829736', 'Akifa Naila Consanance', 'Naila', '4', '085894002570', 'Jl. Gotong Royong I No. 36', 'B', NULL, NULL),
(720, 13, '4514', '3134225463', 'balqis nafisyah marwa', 'balqis', '5.A', '085134300735', 'jl. warung sila no. 29 rt 03 rw 04', 'O', NULL, NULL),
(721, 13, '-', '-', 'VALENTCIA AQILA KUSYAFANI', 'VALENT', '5A', '082312498513', 'jalan nuh rt 02 rw 04 cipedak 20D', NULL, NULL, NULL),
(722, 13, '4503', '3138302222', 'Shakti rajata al-faraby', 'Shakti', '5-D', '085811916247', 'Jln timbul no 33 rt006', NULL, NULL, NULL),
(723, 13, '-', '-', 'Alysha khazana apriadi', 'caca', '4.A', '85744261751', 'kota jakarta selatan kecamatan Jagakarsa kelurahan ciganjur jl. brigif satu rt11 RW 6', NULL, NULL, NULL),
(724, 13, '4724', '3140580601', 'Zivara Putri Rubiizatti', 'Zivara', '4D', '89616663550', 'Jalan kahfi 2 rt 6 rw 3 nomor 10', 'A', NULL, NULL),
(725, 13, '4883', '0137810555', 'Juno camriz', 'juno', '5.B', '813 8991 9656', 'al hidayah RT07/005', 'O', NULL, NULL),
(726, 13, '4709', '3135958006', 'kanaya nuha nafisah', 'kanaya', '4.D', '081324692536', 'jln timbul gg masjid nurul iman Rt05/05 no 1 ,kelurahan cipedak jagakarsa, jakarta selatan', NULL, NULL, NULL),
(727, 13, '4388', '3121676400', 'ELSA LATIVA SOBRI', 'ELSA', '6.B', '821-1007-1621', 'Gg. panjang No. 61 Rt. 006 Rw. 004 Cipedak, Jagakarsa Jakarta selatan DKI jakarta', NULL, NULL, NULL),
(728, 13, '4861', '0151375525', 'Muhammad Rasya Al-khalifi', 'Rasya', '3.D', '081389455217', 'Jln M Kahfi 2 RT 5 RW 3 Cipedak Jagakarsa Jakarta Selatan', 'AB', NULL, NULL),
(729, 13, '4669', '3141429584', 'Arummy Putri Naulida', 'Arumi', '4.C', '087842184220', 'Jl radio no7 rt04/05', NULL, NULL, NULL),
(730, 13, '4849', 'O148170918', 'Ar Rahman Muhammad Aulia', 'Rahman', '3D', '08158844937', 'Jl.Timbul 4D Block:C 27 KAV. DKI Rt.008 Kel. Cipedak Rw.06 Kec.Jagakarsa Jakarta Selatan kode pos 12630', 'A', NULL, NULL),
(731, 13, '4457', '3135619426', 'Fariel atharizz Ibrahim', 'Fariel', '5.B', '082258172619', 'Jl.m.kahfi ll no 36, RT 4 RW 5 Kel Cipedak .kec Jagakarsa', NULL, NULL, NULL),
(732, 13, '4473', '0135506015', 'SHIDQY KHADAFI PUTRA PRIYANTO', 'SHIDQY', '5.B', '089644434655', 'Jl. Lontar No. 20 Rt. 06 RW. 09 Tanah Baru, Beji', NULL, NULL, NULL),
(733, 13, '4505', '3136674747', 'Tazqya maria ulfa', 'Tazqya', '5.D', '0883143333676', 'Jl. Lenteng Agung Timur rt 001 / rw 002', 'A', NULL, NULL),
(734, 13, '4534', '3134721566', 'Sazqya maria ulfa', 'Sazqya', '5.A', '089527855315', 'Jl. Lenteng Agung Timur RT 01 / RW 02', 'A', NULL, NULL),
(735, 13, '4537', '0132833349', 'Syafira Putri Avriliandini', 'Syafira', '5.A', '081297907047', 'Jl. H. Nuh no. 93', NULL, NULL, NULL),
(736, 13, '-', '3157212654', 'THORIQUL JANNATI ILMI', 'THORIQ', '3.D', '0895424371155', 'Jl PERSAHABATAN Rt. 011 Rw. 004 Kel. Cipedak Kec. Jagakarsa Jakarta Selatan', NULL, NULL, NULL),
(737, 13, '4475', '0132109622', 'Zico pardan pratama', 'zico', '5B', '085211547393', 'Jl.Bhakti 89 no 103, Rt2,Rw4', 'O', NULL, NULL),
(738, 13, '3136142599/4491', '3136142599/4491', 'KHAYRIN AYU ARLIZA', 'airin', '5.D', '082122744206', 'JL.Timbul no RT : 007 no RW : 05 Cipedak kecamatan jagakarsa', NULL, NULL, NULL),
(739, 13, '4562', '0131877732', 'RACHEL AURA TAZKIA', 'Rachel', '5.C', '0895-4051-95278', 'JLN. sawo 2 gandul cinere RT 47/05', NULL, NULL, NULL),
(740, 13, '4468', '3139502988', 'Nafisah alifa syahirah', 'Nafisah', '5.B', '08516662953', 'Jl. Timbul', NULL, NULL, NULL),
(741, 13, '4482', '0126463653', 'CINTA ADHANA CANTIKA', 'CINTA', '5.D', '085882090581', 'jln warung silahkan hj nih 002/004', 'O', NULL, NULL),
(742, 13, '-', '3124120348', 'maura putri kardila', 'mora', '5.C', '08811055407', 'jl.kav komp dki blok s1 no 8 purwa raya taman 2 rt001/006', 'A', NULL, NULL),
(743, 12, NULL, '3149488063', 'Bastian Kenzo', 'Kenzo', '4.B', '081291291811', 'Kp.kalibata RT 10/06 Srengseng sawah Jagakarsa Jakarta Selatan', 'AB', NULL, NULL),
(744, 12, NULL, NULL, 'MUHAMMAD FARHAT', 'AAT', '5', '083808839143', 'Jln.Batu I Gg.Arab Rt.013/005. Pejaten Timur,Pasar Minggu,Jak-Sel.', NULL, NULL, NULL),
(745, 12, NULL, NULL, 'Keandra Afham Thufail', 'Keandra', '6.A', '0821-3705-9967', 'Jln kemuning dalam. RT 005/RW 006 Nomor 107. Pejaten timur. Pasar Minggu. Jakarta selatan', 'O', NULL, NULL),
(746, 12, NULL, '0146683081', 'Dani Agustiyan', 'Dani', '5', '089519152746', 'Jl. Raya ragunan No. 28 Rt. 002 Rw. 01 kel. Pasar. Minggu kec. Pasar minggu jakarta selatan', NULL, NULL, NULL),
(747, 12, '2537', '0139455538', 'MUHAMMAD ZIDAN NABIL', 'ZIDAN', '6', '0857-1984-2056', 'JL.PASAR MINGGU KM 18 NO.1 RT 002/RW 001, KELURAHAN PEJATEN TIMUR, KECAMATAN PASAR MINGGU, KODE POS 12510', NULL, NULL, NULL),
(748, 12, NULL, '3123720203', 'Nadya Ramdhani', 'Nadya', '6', '0856 9138 5591', 'JL BATU 1 NO 22 RT 001/RW 002 PEJATEN TIMUR PASAR MINGGU JAKSEL', NULL, NULL, NULL),
(749, 12, NULL, '3123720203', 'Nadya Ramdhani', 'Nadya', '6', '0856 9138 5591', 'JL BATU 1 NO 22 RT 001/ RW 002 PEJATEN TIMUR  PASAR MINGGU JAKARTA SELATAN', NULL, NULL, NULL),
(750, 12, NULL, '0146673081', 'DANi AGUSTIYAN', 'DANI', '5', '0895-1915-2746', 'Jl raya ragunan no.28 RT. 002/RW.001 kel. Pasar minggu kec. Pasar minggu Jakarta selatan', NULL, NULL, NULL),
(751, 12, NULL, '3136408584', 'Alya Nisa rania', 'Alya', 'Kelas : 6', '085648548314', 'Jl.mesjid baru RT 06 RW 01 no.14 Pejaten Timur pasar Minggu, jakarta selatan.kode pos.12510/ kontrakan', NULL, NULL, NULL),
(752, 12, '100470', '3137464504', 'Natasya Kayla Puspita Ayu', 'Kayla', '6', '0838 0883 9164', 'Jl. Purbaya RT 011/005 Pejaten Timur, Pasar Minggu, Jaksel', NULL, NULL, NULL),
(753, 12, NULL, NULL, 'Syamsiah', 'Sisi', '6(ENAM)', '08561009776', 'JLN.batu 1/GG arab', 'AB', NULL, NULL),
(754, 12, NULL, NULL, 'Syarifah Rifka', 'Rifka', '6.A', '087778296297', 'Jalan Batu I Gang Arab No.4', 'O', NULL, NULL),
(755, 12, NULL, NULL, 'Syeni Rahma Yuni', 'Syeni', '6', '085711563315', 'Jl. Batu satu gang Arab RT 12 RW 01', 'B', NULL, NULL),
(756, 12, '2557', '3138012628', 'Fahri anugrah esa', 'Fahri', '5', '087852078953', 'GG. H.Hasbi II/29, RT 7, RW 3 , , Kampung Bali, Kec. Tanah Abang', NULL, NULL, NULL),
(757, 12, '2581', '3146454963', 'Nuriah Rahayu', 'Ayu', '4', '083808839173', 'Jl. Baru satu gang Arab RT 12 RW 01', 'B', NULL, NULL),
(758, 12, NULL, NULL, 'Leoni Aprilia', 'Leoni', 'Kelas 6', '085711345029', 'Jln Haji soleh', 'O', NULL, NULL),
(759, 12, NULL, NULL, 'M. Obama', 'Obama', 'Kelas 6', '085711345029', 'Jln Haji soleh', NULL, NULL, NULL),
(760, 12, NULL, NULL, 'Jul Rohman Haryanto', 'Jul', '6', '081958713431', 'Jln . Langgar 1 rt11/ rw8', NULL, NULL, NULL),
(765, 5, '4608', '74836993', 'Siti Astuti Mardiani', 'Ani', 'XI', '85695941323', 'Jl. Pejaten Barat 2', NULL, NULL, NULL),
(766, 5, '4614', '72820007', 'Yunita Rahayu', 'ayu', 'XI', '85771437057', 'Jl. Pejaten Barat 2 gang Kamboja RT 5 RW 8', 'B', NULL, NULL),
(767, 5, NULL, '86317691', 'Raisha Indah Permata', 'Raisha', '11', '85781612671', 'Jl bangka 2', 'A', NULL, NULL),
(768, 5, '4498', NULL, 'Devita Rahmawati', 'Devita', '11 Mplb 3', '8567411318', 'jl.bangka 11 c', NULL, NULL, NULL),
(769, 27, '37011518721', '118927675', 'Alexander Satrio Adi Nugroho', 'Satrio', 'VIII_B', '083890708992', 'Gang Ikhlas 4 No. 76 003/08, Kebagusan', 'O', NULL, NULL),
(770, 27, NULL, '0113014855', 'Jeane Letycia Lingga', 'Jeane', 'Vll_B', '081292920876', 'Ketapang 26', 'O', NULL, NULL),
(771, 27, '233571', '0102005892', 'Kesha Ananda Alfaris', 'Kesha', 'VIII_E', '085157998836', 'Jl. Lenteng agung, gg.waspada 1', 'O', NULL, NULL),
(772, 27, '233606', '0107756779', 'Renata niken anggraeni', 'Renata', 'VIII E', '081322832010', 'Kebagusan raya', 'O', NULL, NULL),
(773, 27, NULL, NULL, 'Aaron Maiden T', 'Aaron', 'VIII_C', NULL, 'Jln asem 2', 'O', NULL, NULL);
INSERT INTO `siswa` (`id`, `id_sekolah`, `nis`, `nisn`, `nama_lengkap`, `nama_panggilan`, `kelas`, `no_telp`, `alamat`, `golongan_darah`, `created_at`, `updated_at`) VALUES
(774, 27, '37011523734', '3120299299', 'Gabriel Bagus Cannavaro Banuseno', 'Biel', 'VII_D', '087809715070', 'Siaga 2C', 'B', NULL, NULL),
(775, 27, '37011523696', '122075996', 'Hallie Putri Manihuruk', 'Hallie', 'VII_C', '082211576025', 'Jln. Jeruk Purut Gg. Jeruk Nyonya no 63', NULL, NULL, NULL),
(776, 27, '37011523710', '0123777475', 'Agatha Retno Ayuningtyas', 'Agatha', 'VII_C', '081211917324', 'Jl.Kalibata Timur 1 No.', 'O', NULL, NULL),
(777, 27, NULL, NULL, 'Jenaya Debora Elza Anugrah', 'Jenaya', 'VII_B', '085716486917', 'Komp HBD blok c2 no 22', 'O', NULL, NULL),
(778, 27, NULL, NULL, 'Rahel Kisayra Gultom', 'Rahel', 'VII_A', '088568341010', 'Komplek Beacukai No 22 Pasar Minggu', 'A', NULL, NULL),
(779, 28, '101016304059', '3137835641', 'Aira Hauna Adzkiyaa', 'Aira', 'V_A', '086954698829', 'Jl. perikanan No. 20 Srengseng Sawah', 'B', NULL, NULL),
(780, 28, '3358', '3134746577', 'Kheldiyani Faida Akmalia', 'Kheldi', 'V_B', '085811732247', 'Jl.jambu 2 rt 005/rw 002 Kelurahan cipedak', 'B', NULL, NULL),
(781, 28, '101016304059', '20105933', 'Islamiyah Nur Alfina', 'Fina', 'V_B', '085717462184', 'Jl.gang udel jagakarsa', 'O', NULL, NULL),
(782, 28, '3370', '121393851', 'Ufairah Nadhifa Zulfa', 'Ufay', 'V_B', '085875113076', 'Jl.Kebembem III no.74,Jagakarsa', 'O', NULL, NULL),
(783, 28, '3365', '3129731308', 'Oktavia Intriani', 'Okta', 'V_B', '081398915309', 'Kp.kalibata RT.9 RW.8 No. 39', 'A+', NULL, NULL),
(784, 28, '101016304059', '135814587', 'Adhelia Putri Erlitha', 'Adel', 'V_A', '0885882733913', 'Jl.Gandaria Ujung, rt 9/rw 2, Jagakarsa', NULL, NULL, NULL),
(785, 28, '3315', '3138764062', 'Davina Shafa Maulida', 'Dapina', 'V_A', '0889519706356', 'Jagakarsa 1', NULL, NULL, NULL),
(786, 28, '3337', '3127635313', 'Raihanun Nashwa Kaamila', 'Hanum', 'V_A', '085692485434', 'Jl. perikanan rt 4 rw 8', 'O', NULL, NULL),
(787, 28, '3335', '3134945047', 'Mutiara Shella', 'Shella', 'V_A', '0881211132240', 'Jl. lapangan futsal ASDH no 42', 'O', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitator_id` bigint UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `fasilitator_id`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Sabrina Azzahra', 10, 'sbrnazzhra69@gmail.com', NULL, '$2y$12$dSDHb0M6ooNXjt2EimjFJ.GvobT1tccNEKBn8L/CqiyFTO8tK3cnG', 0, NULL, '2025-05-18 18:14:12', '2025-05-18 18:15:01'),
(9, 'Virgin Zahrah Kuswandi', 3, 'virginzk242@gmail.com', NULL, '$2y$12$IpH0Qw6HrdfRYjwWtMyaYe9qKrCHQGSCHbl3pxUujBaqWa6aL4UlS', 1, 'aKWq5FaVJY6Jz7sNCQI50lseiLb7QfUCZKZZJovJmL6MVB20CTzuzpMggEbz', '2025-06-20 02:24:59', '2025-06-26 02:05:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_jadwal_sekolah_id_foreign` (`jadwal_sekolah_id`);

--
-- Indeks untuk tabel `absensi_fasilitator`
--
ALTER TABLE `absensi_fasilitator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_fasilitator_absensi_id_foreign` (`absensi_id`),
  ADD KEY `absensi_fasilitator_fasilitator_id_foreign` (`fasilitator_id`);

--
-- Indeks untuk tabel `absensi_foto`
--
ALTER TABLE `absensi_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_foto_absensi_id_foreign` (`absensi_id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artikel_slug_unique` (`slug`),
  ADD KEY `artikel_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `artikel_foto`
--
ALTER TABLE `artikel_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_foto_artikel_id_foreign` (`artikel_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fasilitator`
--
ALTER TABLE `fasilitator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_fasilitator`
--
ALTER TABLE `jadwal_fasilitator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_fasilitator_jadwal_sekolah_id_foreign` (`jadwal_sekolah_id`),
  ADD KEY `jadwal_fasilitator_fasilitator_id_foreign` (`fasilitator_id`);

--
-- Indeks untuk tabel `jadwal_sekolah`
--
ALTER TABLE `jadwal_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_sekolah_sekolah_id_foreign` (`sekolah_id`),
  ADD KEY `jadwal_sekolah_fasilitator_id_foreign` (`fasilitator_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_artikel_id_foreign` (`artikel_id`),
  ADD KEY `komentar_user_id_foreign` (`user_id`),
  ADD KEY `komentar_parent_id_foreign` (`parent_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id_sekolah_foreign` (`id_sekolah`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_fasilitator_id_foreign` (`fasilitator_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `absensi_fasilitator`
--
ALTER TABLE `absensi_fasilitator`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `absensi_foto`
--
ALTER TABLE `absensi_foto`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `artikel_foto`
--
ALTER TABLE `artikel_foto`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitator`
--
ALTER TABLE `fasilitator`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `jadwal_fasilitator`
--
ALTER TABLE `jadwal_fasilitator`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jadwal_sekolah`
--
ALTER TABLE `jadwal_sekolah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_jadwal_sekolah_id_foreign` FOREIGN KEY (`jadwal_sekolah_id`) REFERENCES `jadwal_sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `absensi_fasilitator`
--
ALTER TABLE `absensi_fasilitator`
  ADD CONSTRAINT `absensi_fasilitator_absensi_id_foreign` FOREIGN KEY (`absensi_id`) REFERENCES `absensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_fasilitator_fasilitator_id_foreign` FOREIGN KEY (`fasilitator_id`) REFERENCES `fasilitator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `absensi_foto`
--
ALTER TABLE `absensi_foto`
  ADD CONSTRAINT `absensi_foto_absensi_id_foreign` FOREIGN KEY (`absensi_id`) REFERENCES `absensi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `artikel_foto`
--
ALTER TABLE `artikel_foto`
  ADD CONSTRAINT `artikel_foto_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_fasilitator`
--
ALTER TABLE `jadwal_fasilitator`
  ADD CONSTRAINT `jadwal_fasilitator_fasilitator_id_foreign` FOREIGN KEY (`fasilitator_id`) REFERENCES `fasilitator` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_fasilitator_jadwal_sekolah_id_foreign` FOREIGN KEY (`jadwal_sekolah_id`) REFERENCES `jadwal_sekolah` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_sekolah`
--
ALTER TABLE `jadwal_sekolah`
  ADD CONSTRAINT `jadwal_sekolah_fasilitator_id_foreign` FOREIGN KEY (`fasilitator_id`) REFERENCES `fasilitator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_sekolah_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `komentar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_sekolah_foreign` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fasilitator_id_foreign` FOREIGN KEY (`fasilitator_id`) REFERENCES `fasilitator` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
