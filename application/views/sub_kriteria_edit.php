<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title py-0 my-0 mt-2"><?= $page_title ?></h2>
                </div>
                <div class="card-body" style="display: block;">
                    <form action="<?= site_url('kriteria/update_sub/' . $kriteria->id) ?>" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Kriteria</label>
                                <select name="kriteria_id" class="form-control" required>
                                    <option value="">Pilih Kriteria</option>
                                    <?php foreach ($kriteria_options as $option): ?>
                                        <option value="<?= $option['id'] ?>" <?= ($kriteria->kriteria_id == $option['id']) ? 'selected' : '' ?>>
                                            <?= $option['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nilai</label>
                                <input type="text" name="nilai" class="form-control" value="<?= htmlspecialchars($kriteria->nilai) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" value="<?= htmlspecialchars($kriteria->deskripsi) ?>">
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
