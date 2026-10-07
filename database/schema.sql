CREATE DATABASE mystery_case;

USE mystery_case;

-- Tabel 1: Data kasus
CREATE TABLE cases (
    id_case INT AUTO_INCREMENT PRIMARY KEY,
    case_name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    case_date DATE NOT NULL,
    status VARCHAR(30) NOT NULL,
    description TEXT
);

-- Tabel 2: Data tersangka
CREATE TABLE suspects (
    id_suspect INT AUTO_INCREMENT PRIMARY KEY,
    suspect_name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    occupation VARCHAR(100),
    address VARCHAR(150),
    status VARCHAR(30) NOT NULL
);

-- Tabel 3: Relasi kasus dan tersangka
CREATE TABLE case_suspects (
    id_case_suspect INT AUTO_INCREMENT PRIMARY KEY,
    id_case INT NOT NULL,
    id_suspect INT NOT NULL,
    role VARCHAR(100),
    evidence VARCHAR(150),

    FOREIGN KEY (id_case) REFERENCES cases(id_case),
    FOREIGN KEY (id_suspect) REFERENCES suspects(id_suspect)
);

-- Data kasus
INSERT INTO cases
(case_name, location, case_date, status, description)
VALUES
('Misteri Lukisan Hilang', 'Galeri Seni', '2026-09-01', 'Open', 'Sebuah lukisan langka menghilang pada malam hari.'),
('Misteri Kamar 302', 'Hotel Aurora', '2026-09-05', 'Open', 'Barang berharga ditemukan hilang dari kamar 302.'),
('Rahasia Gudang Lama', 'Gudang Kota', '2026-09-10', 'Solved', 'Sebuah benda misterius ditemukan di gudang lama.'),
('Kasus Jam Antik', 'Rumah Tua', '2026-09-15', 'Open', 'Jam antik milik keluarga menghilang secara misterius.'),
('Misteri Surat Rahasia', 'Perpustakaan', '2026-09-20', 'Solved', 'Surat rahasia ditemukan di antara buku lama.');

-- Data tersangka
INSERT INTO suspects
(suspect_name, age, occupation, address, status)
VALUES
('Andi', 24, 'Mahasiswa', 'Surabaya', 'Investigated'),
('Budi', 31, 'Pelukis', 'Malang', 'Investigated'),
('Citra', 27, 'Kurator', 'Surabaya', 'Cleared'),
('Dimas', 35, 'Karyawan Hotel', 'Sidoarjo', 'Investigated'),
('Sinta', 29, 'Penulis', 'Surabaya', 'Cleared');

-- Relasi kasus dengan tersangka
INSERT INTO case_suspects
(id_case, id_suspect, role, evidence)
VALUES
(1, 2, 'Tersangka utama', 'Sidik jari di bingkai lukisan'),
(1, 3, 'Saksi', 'Melihat seseorang di galeri'),
(2, 4, 'Tersangka utama', 'Memiliki akses kamar'),
(2, 1, 'Saksi', 'Berada di hotel malam itu'),
(3, 5, 'Tersangka', 'Ditemukan dekat gudang'),
(4, 2, 'Saksi', 'Mengetahui tentang jam antik'),
(4, 3, 'Tersangka', 'Memiliki kunci rumah'),
(5, 5, 'Saksi', 'Menemukan surat rahasia');

-- Contoh query SELECT
SELECT * FROM cases;

-- Contoh query JOIN
SELECT
    cases.case_name,
    suspects.suspect_name,
    case_suspects.role,
    case_suspects.evidence
FROM case_suspects
JOIN cases ON case_suspects.id_case = cases.id_case
JOIN suspects ON case_suspects.id_suspect = suspects.id_suspect;

-- Contoh query UPDATE
UPDATE cases
SET status = 'Solved'
WHERE id_case = 1;

-- Contoh query DELETE
DELETE FROM case_suspects
WHERE id_case_suspect = 8;
