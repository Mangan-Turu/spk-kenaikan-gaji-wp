<section>
    <form method="post" action="<?= base_url('penilaian/simpan') ?>">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title py-0 my-0 mt-2">Input Penilaian Karyawan</h2>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary">Lihat Perhitungan</button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <table id="example1" class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle text-start" style="width: 20px;">No</th>
                                    <th rowspan="2" class="align-middle text-start">Nama</th>
                                    <th rowspan="2" class="align-middle text-center" style="width: 200px;">Aksi</th>
                                    <th colspan="<?= @count($karyawans[0]['kriterias']) ?>" class="align-middle text-center">Kriteria</th>
                                    <th rowspan="2" class="align-middle text-center">Nilai Hasil</th>
                                    <th rowspan="2" class="align-middle text-start">Keputusan</th>
                                </tr>
                                <tr>
                                    <?php foreach ($karyawans[0]['kriterias'] as $kriteria) : ?>
                                        <th class="text-center"><?= $kriteria['kode'] ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($karyawans)) : ?>
                                    <?php foreach ($karyawans as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center"><?= $key + 1; ?>.</td>
                                            <td class="text-start"><?= $value['nama_lengkap']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= site_url('karyawan/edit/') ?>" class="btn btn-sm btn-info">Detail Perhitungan</a>
                                            </td>
                                            <?php foreach ($value['kriterias'] as $kriteria) : ?>
                                                <td class="text-center"><?= $kriteria['kriteria_sub_nilai'] ?? '-'; ?></td>
                                            <?php endforeach ?>
                                            <td class="text-center">0.0671</td>
                                            <td class="text-start">Layak</td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>

                                <!-- <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" style="display: block;">
                        Total Karyawan: Row
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>