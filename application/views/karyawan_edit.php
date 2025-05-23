<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title py-0 my-0 mt-2"><?= $page_title ?></h2>

                    <div class="card-tools">
                        <button class="btn btn-primary">Tambah Karyawan</button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <form action="<?= site_url('karyawan/update/' . $karyawan->id) ?>" method="post">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $karyawan->nama_lengkap ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="L" <?= $karyawan->jenis_kelamin == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= $karyawan->jenis_kelamin == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $karyawan->tempat_lahir ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $karyawan->tanggal_lahir ?>">
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="<?= $karyawan->no_hp ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $karyawan->email ?>">
                        </div>
                        <div class="form-group">
                            <label>Departemen</label>
                            <input type="text" name="departemen" class="form-control" value="<?= $karyawan->departemen ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="<?= site_url('karyawan') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

