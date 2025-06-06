<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<section>
    <form method="post" action="<?= base_url('penilaian/simpan') ?>">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title py-0 my-0 mt-2">Input Penilaian Karyawan</h2>
                        <div class="card-tools">
                            <button type="submit" name="action" value="kosongkan" class="btn btn-danger">Kosongkan Penilaian</button>
                            <button type="submit" name="action" value="simpan" class="btn btn-primary">Simpan Penilaian</button>
                        </div>
                    </div>
                    <div class="card-body table-responsive" style="display: block;">
                        <table id="example1" class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle text-start">No</th>
                                    <th rowspan="2" class="align-middle text-start text-nowrap">Nama</th>
                                    <th rowspan="2" class="align-middle text-start">Jenis Kelamin</th>
                                    <th colspan="<?= @count($karyawans[0]['kriterias']) ?>" class="align-middle text-center">Input Nilai</th>
                                </tr>
                                <?php if (!empty($karyawans) && isset($karyawans[0]['kriterias'])) : ?>
                                    <tr>
                                        <?php foreach ($karyawans[0]['kriterias'] as $kriteria) : ?>
                                            <th class="text-center"><?= $kriteria['kode'] . '<br>' . $kriteria['nama_kriteria']; ?></th>
                                        <?php endforeach ?>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th colspan="100%" class="text-center">Tidak ada data karyawan / kriteria</th>
                                    </tr>
                                <?php endif; ?>
                            </thead>
                            <tbody>
                                <?php if (count($karyawans) > 0) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($karyawans as $k) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-nowrap"><a href="<?= base_url('karyawan/edit/' . $k['karyawan_id']); ?>"><?= $k['nama_lengkap']; ?></a></td>
                                            <td><?= $k['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                                            <?php foreach ($k['kriterias'] as $kriteria) : ?>
                                                <td>
                                                    <select name="<?= $kriteria['penilaian_id']; ?>" class="form-control" required style="min-width: 120px;">
                                                        <option value="">- Pilih Nilai -</option>
                                                        <?php foreach ($kriteria_sub[$kriteria['kriteria_id']] ?? [] as $sub) : ?>
                                                            <option value="<?= $sub['id'] ?>" <?= $kriteria['kriteria_sub_id'] == $sub['id'] ? 'selected' : '' ?>>
                                                                [<?= $sub['nilai'] ?>] <?= $sub['deskripsi'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="100" class="text-center">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" style="display: block;">
                        Total Karyawan: <?= count($karyawans); ?> Row
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>