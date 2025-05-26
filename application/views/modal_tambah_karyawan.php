<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= site_url('karyawan/tambah') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body row">
                        <div class="form-group col-md-6">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control" required>
                                <option value="">Pilih Jabatan</option>
                                <option value="Manager">Manager</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Staff">Staff</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Departemen</label>
                            <select name="departemen" class="form-control" required>
                                <option value="">Pilih Departemen</option>
                                <option value="HRD">HRD</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="IT">IT</option>
                                <option value="Produksi">Produksi</option>
                                <option value="Operasional">Operasional</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status Karyawan</label>
                            <select name="status_karyawan" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Magang">Magang</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>