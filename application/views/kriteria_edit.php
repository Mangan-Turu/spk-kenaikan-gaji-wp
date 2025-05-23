<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title py-0 my-0 mt-2"><?= $page_title ?></h2>
                </div>
                <div class="card-body" style="display: block;">
                    <form action="<?= site_url('kriteria/update/' . $kriteria->id) ?>" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($kriteria->nama) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Atribut</label>
                                <select name="atribut" class="form-control" required>
                                    <option value="">Pilih Atribut</option>
                                    <option value="benefit" <?= $kriteria->atribut == 'benefit' ? 'selected' : '' ?>>Benefit</option>
                                    <option value="cost" <?= $kriteria->atribut == 'cost' ? 'selected' : '' ?>>Cost</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Bobot</label>
                                <input type="text" name="bobot" class="form-control" value="<?= htmlspecialchars($kriteria->bobot) ?>">
                            </div>
    
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="<?= site_url('kriteria') ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
