<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title py-0 my-0 mt-2"><?= $page_title ?></h2>
                </div>
                <div class="card-body" style="display: block;">
                    <form action="<?= site_url('karyawan/update/' . $karyawan->id) ?>" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?= htmlspecialchars($karyawan->nama_lengkap) ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" value="<?= htmlspecialchars($karyawan->nik) ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L" <?= $karyawan->jenis_kelamin == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="P" <?= $karyawan->jenis_kelamin == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?= htmlspecialchars($karyawan->tempat_lahir) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="<?= $karyawan->tanggal_lahir ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= htmlspecialchars($karyawan->no_hp) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($karyawan->email) ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Jabatan</label>
                                <select name="jabatan" class="form-control" required>
                                    <option value="">Pilih Jabatan</option>
                                    <option value="Manager" <?= $karyawan->jabatan == 'Manager' ? 'selected' : '' ?>>Manager</option>
                                    <option value="Supervisor" <?= $karyawan->jabatan == 'Supervisor' ? 'selected' : '' ?>>Supervisor</option>
                                    <option value="Staff" <?= $karyawan->jabatan == 'Staff' ? 'selected' : '' ?>>Staff</option>
                                    <option value="Admin" <?= $karyawan->jabatan == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Departemen</label>
                                <select name="departemen" class="form-control" required>
                                    <option value="">Pilih Departemen</option>
                                    <option value="HRD" <?= $karyawan->departemen == 'HRD' ? 'selected' : '' ?>>HRD</option>
                                    <option value="Finance" <?= $karyawan->departemen == 'Finance' ? 'selected' : '' ?>>Finance</option>
                                    <option value="Marketing" <?= $karyawan->departemen == 'Marketing' ? 'selected' : '' ?>>Marketing</option>
                                    <option value="IT" <?= $karyawan->departemen == 'IT' ? 'selected' : '' ?>>IT</option>
                                    <option value="Produksi" <?= $karyawan->departemen == 'Produksi' ? 'selected' : '' ?>>Produksi</option>
                                    <option value="Operasional" <?= $karyawan->departemen == 'Operasional' ? 'selected' : '' ?>>Operasional</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control" value="<?= $karyawan->tanggal_masuk ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Status Karyawan</label>
                                <select name="status_karyawan" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Tetap" <?= $karyawan->status_karyawan == 'Tetap' ? 'selected' : '' ?>>Tetap</option>
                                    <option value="Kontrak" <?= $karyawan->status_karyawan == 'Kontrak' ? 'selected' : '' ?>>Kontrak</option>
                                    <option value="Magang" <?= $karyawan->status_karyawan == 'Magang' ? 'selected' : '' ?>>Magang</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3"><?= htmlspecialchars($karyawan->alamat) ?></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="<?= site_url('karyawan') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
