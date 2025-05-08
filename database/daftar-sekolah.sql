-- nama table daftar_sekolah
-- daftar kolom : id, nama_sekolah, alamat_sekolah, tahun_berdiri_pmr

-- nama table daftar_siswa
-- daftar kolom : id, id_sekolah nisn, nama_lengkap, kelas, no_telp, alamat_rumah, golongan_darah

-- Membuat tabel daftar_sekolah
CREATE TABLE daftar_sekolah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_sekolah VARCHAR(100) NOT NULL,
    alamat_sekolah TEXT NOT NULL,
    tahun_berdiri_pmr,
    longitude,
    latitude,
);

-- Membuat tabel daftar_siswa
CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_sekolah INT NOT NULL,
    nis VARCHAR(20) NULL,
    nisn VARCHAR(20) NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    nama_panggilan VARCHAR(100) NULL,
    kelas VARCHAR(10) NOT NULL,
    no_telp VARCHAR(20),
    alamat TEXT,
    golongan_darah CHAR(2),
    FOREIGN KEY (id_sekolah) REFERENCES daftar_sekolah(id)
);

-- Insert 1 data ke tabel daftar_sekolah-berdur
INSERT INTO daftar_sekolah (nama, alamat, tahun_berdiri_pmr)
VALUES
('SMA Dewi Sartika', 'Jl. Tebet Barat Dalam Raya No.39-41, Tebet Bar., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810', '2024', -6.2378835, 106.8449244),
('SDN Jagakarsa 01', 'Jl. Jagakarsa Raya No.10, Jakarta Selatan'),
('SDN Jagakarsa 01', 'Jl. Jagakarsa Raya No.10, Jakarta Selatan'),
('SDN Jagakarsa 01', 'Jl. Jagakarsa Raya No.10, Jakarta Selatan'),
('SDN Jagakarsa 01', 'Jl. Jagakarsa Raya No.10, Jakarta Selatan');

-- Misalnya id sekolah hasil insert di atas adalah 1
-- Insert 1 data ke tabel daftar_siswa
INSERT INTO daftar_siswa (id_sekolah, nisn, nama_lengkap, kelas, no_telp, alamat_rumah, golongan_darah)
VALUES
(1, '0067069124', 'Muhammad Hazaril Pramana', '12-1', '083899049925', 'Jl. abc', 'A'),
(1, '1123456789', 'Ahmad Putra', '5A', '08123456789', 'Jl. Merdeka No.15, Jakarta', 'O'),
(1, '1123456789', 'Ahmad Putra', '5A', '08123456789', 'Jl. Merdeka No.15, Jakarta', 'O');
