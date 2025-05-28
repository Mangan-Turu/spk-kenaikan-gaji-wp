<style>
    table tr td {
        padding-top: .25rem !important;
        padding-bottom: .25rem !important;
    }
</style>
<section>
    <form method="post" action="<?= base_url('penilaian/simpan') ?>">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title py-0 my-0 mt-2">Detail Perhitungan Penilaian Karyawan</h2>
                        <div class="card-tools">
                            <a href="<?= base_url('hasil'); ?>" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col">
                                <h5>Data Karyawan</h5>
                                <hr>
                                <table id="example1" class="table table-bordered table-striped w-100">
                                    <tbody>
                                        <tr>
                                            <td>NIK</td>
                                            <td><?= @$karyawan->nik; ?></td>
                                            <td>Nama</td>
                                            <td><?= @$karyawan->nama_lengkap; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td><?= @$karyawan->tempat_lahir; ?></td>
                                            <td>Tanggal Lahir</td>
                                            <td><?= @$karyawan->tanggal_lahir; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?= @$karyawan->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                                            <td>Jabatan</td>
                                            <td><?= @$karyawan->jabatan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?= @$karyawan->email; ?></td>
                                            <td>No. Telepon</td>
                                            <td><?= @$karyawan->no_hp; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <h5>Nilai Karyawan Berdasarkan Kriteria</h5>
                                <hr>
                                <table class="table table-bordered table-striped w-100">
                                    <tbody>
                                        <tr>
                                            <th rowspan="2" class="align-middle text-start">Nama</th>
                                            <th colspan="<?= count($karyawan_nilai['kriterias']) ?>" class="text-center">Kriteria</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($karyawan_nilai['kriterias'] as $kriteria) : ?>
                                                <th class="text-center"><?= $kriteria['kode'] ?? '-' ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr>
                                            <td class="text-start"><?= $karyawan_nilai['nama_lengkap']; ?></td>
                                            <?php foreach ($karyawan_nilai['kriterias'] as $kriteria) : ?>
                                                <td class="text-center"><?= $kriteria['kriteria_sub_nilai'] ?? '-' ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <h5>Normalisasi Bobot</h5>
                                <hr>
                                <table class="table table-bordered table-striped w-100">
                                    <tbody>
                                        <tr>
                                            <th rowspan="2" class="align-middle text-start">Nama</th>
                                            <th colspan="<?= count($karyawan_nilai['kriterias']) ?>" class="text-center">Kriteria</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($karyawan_nilai['kriterias'] as $kriteria) : ?>
                                                <th class="text-center"><?= $kriteria['kode'] ?? '-' ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr>
                                            <td class="text-start"><?= $karyawan_nilai['nama_lengkap']; ?></td>
                                            <?php foreach ($karyawan_nilai['kriterias'] as $kriteria) : ?>
                                                <td class="text-center"><?= $kriteria['kriteria_sub_nilai'] ?? '-' ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer" style="display: block;">
                        Total Karyawan: Row
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>