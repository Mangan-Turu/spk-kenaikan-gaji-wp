CREATE TABLE kriteria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    atribut ENUM('benefit', 'cost') NOT NULL,
    bobot INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT NULL,
    updated_by INT NULL
);

CREATE TABLE kriteria_sub (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kriteria_id INT NOT NULL,
    nilai INT NOT NULL,
    deskripsi VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT,
    updated_by INT,
    FOREIGN KEY (kriteria_id) REFERENCES kriteria(id) ON DELETE CASCADE
);

  CREATE TABLE karyawan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(20) NOT NULL UNIQUE,        -- Nomor Induk Karyawan
    nama_lengkap VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,  -- L = Laki-laki, P = Perempuan
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    alamat TEXT,
    no_hp VARCHAR(20),
    email VARCHAR(100),
    jabatan VARCHAR(100),
    departemen VARCHAR(100),
    tanggal_masuk DATE,
    status_karyawan ENUM('Tetap', 'Kontrak', 'Magang') DEFAULT 'Tetap',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT NULL,
    updated_by INT NULL,
);

INSERT INTO karyawan (nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_hp, email, jabatan, departemen, tanggal_masuk, status_karyawan, gaji_pokok, foto)
VALUES
('KRY001', 'Andi Saputra', 'L', 'Jakarta', '1990-03-15', 'Jl. Merdeka No. 12, Jakarta', '081234567890', 'andi.saputra@example.com', 'Manager HRD', 'HRD', '2015-06-01', 'Tetap', 10000000.00, 'uploads/foto/andi.jpg'),
('KRY002', 'Budi Santoso', 'L', 'Bandung', '1985-07-20', 'Jl. Asia Afrika No. 22, Bandung', '081223344556', 'budi.santoso@example.com', 'Staff IT', 'IT', '2018-01-15', 'Tetap', 7000000.00, 'uploads/foto/budi.jpg'),
('KRY003', 'Citra Dewi', 'P', 'Surabaya', '1992-05-30', 'Jl. Pemuda No. 10, Surabaya', '081298765432', 'citra.dewi@example.com', 'Admin', 'Keuangan', '2019-08-01', 'Kontrak', 5000000.00, 'uploads/foto/citra.jpg'),
('KRY004', 'Dewi Lestari', 'P', 'Yogyakarta', '1994-11-12', 'Jl. Malioboro No. 45, Yogyakarta', '081234111222', 'dewi.lestari@example.com', 'Marketing Executive', 'Marketing', '2020-02-10', 'Tetap', 6500000.00, 'uploads/foto/dewi.jpg'),
('KRY005', 'Eko Prasetyo', 'L', 'Semarang', '1991-01-25', 'Jl. Pandanaran No. 33, Semarang', '082112223344', 'eko.prasetyo@example.com', 'Customer Service', 'Operasional', '2021-05-20', 'Magang', 3000000.00, 'uploads/foto/eko.jpg');

