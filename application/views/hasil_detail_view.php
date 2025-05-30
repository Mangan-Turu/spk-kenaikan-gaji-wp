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
                                <h5>Proses Perhitungan</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>1. Normalisasi Bobot</h6>
                                        <div class="row">
                                            <div class="col">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2"><b>w1 </b><span class="px-2">=</span></td>
                                                        <td colspan="12" class="border-bottom text-center">30</td>
                                                        <td rowspan="2"><span class="px-2">=</span>0.3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>30</td>
                                                        <td>+</td>
                                                        <td>20</td>
                                                        <td>+</td>
                                                        <td>15</td>
                                                        <td>+</td>
                                                        <td>15</td>
                                                        <td>+</td>
                                                        <td>10</td>
                                                        <td>+</td>
                                                        <td>10</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2"><b>w1 </b><span class="px-2">=</span></td>
                                                        <td colspan="12" class="border-bottom text-center">30</td>
                                                        <td rowspan="2"><span class="px-2">=</span>0.3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>30</td>
                                                        <td>+</td>
                                                        <td>20</td>
                                                        <td>+</td>
                                                        <td>15</td>
                                                        <td>+</td>
                                                        <td>15</td>
                                                        <td>+</td>
                                                        <td>10</td>
                                                        <td>+</td>
                                                        <td>10</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-4">
                                                <b>Ʃwj</b> = 30 + 20 + 15 + 15 + 10 + 10 = 100
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>2. Menghitung Nilai Vektor</h6>
                                        <div class="row">
                                            <div class="col">
                                                <p>
                                                    <b>s1</b> <span class="px-2">=</span> <span>(5<sup>0.2</sup>)</span><span>(5<sup>0.2</sup>)</span> <span class="px-2">=</span> <span>5.000</span>
                                                </p>
                                                <p>
                                                    <b>Total</b> <span class="px-2">=</span> <span>5000 + 2000 = 5000</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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