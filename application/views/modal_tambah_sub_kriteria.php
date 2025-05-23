<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahSubKriteria" tabindex="-1" role="dialog" aria-labelledby="modalTambahSubKriteriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= site_url('kriteria/tambah_sub') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahSubKriteriaLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body row">
                        <div class="form-group col-md-6">
                            <label>Kriteria</label>
                            <select name="kriteria_id" class="form-control" required>
                                <option value="">Pilih Kriteria</option>
                                <?php foreach ($kriteria_options as $option): ?>
                                    <option value="<?= $option['id'] ?>"><?= $option['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nilai</label>
                            <input type="text" name="nilai" class="form-control">
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