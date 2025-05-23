<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog" aria-labelledby="modalTambahKriteriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= site_url('kriteria/tambah') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKriteriaLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body row">
                        <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Atribut</label>
                            <select name="atribut" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Bobot</label>
                            <input type="text" name="bobot" class="form-control">
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