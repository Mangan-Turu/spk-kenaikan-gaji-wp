INSERT INTO kriteria (kode, nama, atribut, bobot, created_by, updated_by) VALUES
('C1', 'Kinerja', 'benefit', 30, 1, 1),
('C2', 'Presensi', 'benefit', 20, 1, 1),
('C3', 'Lama Bekerja', 'benefit', 15, 1, 1),
('C4', 'Kerja sama tim', 'benefit', 15, 1, 1),
('C5', 'Disiplin & Tanggung Jawab', 'benefit', 10, 1, 1),
('C6', 'Pelayanan', 'benefit', 10, 1, 1);

INSERT INTO kriteria_sub (kriteria_id, nilai, deskripsi, created_by, updated_by) VALUES
(1, 1, 'Sangat Kurang', 1, 1),
(1, 2, 'Kurang', 1, 1),
(1, 3, 'Cukup', 1, 1),
(1, 4, 'Baik', 1, 1),
(1, 5, 'Sangat Baik', 1, 1),

(2, 1, '<85%', 1, 1),
(2, 2, '85-89%', 1, 1),
(2, 3, '90-94%', 1, 1),
(2, 4, '95-97%', 1, 1),
(2, 5, '>98%', 1, 1),

(3, 1, '<1 Tahun', 1, 1),
(3, 2, '1-2 Tahun', 1, 1),
(3, 3, '2-3 Tahun', 1, 1),
(3, 4, '3-4 Tahun', 1, 1),
(3, 5, '>5 Tahun', 1, 1),

(4, 1, 'Sangat Kurang', 1, 1),
(4, 2, 'Kurang', 1, 1),
(4, 3, 'Cukup', 1, 1),
(4, 4, 'Baik', 1, 1),
(4, 5, 'Sangat Baik', 1, 1),

(5, 1, 'Sangat Kurang', 1, 1),
(5, 2, 'Kurang', 1, 1),
(5, 3, 'Cukup', 1, 1),
(5, 4, 'Baik', 1, 1),
(5, 5, 'Sangat Baik', 1, 1);
