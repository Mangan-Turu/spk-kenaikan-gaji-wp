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
                                <h5>1. Nilai Karyawan Berdasarkan Kriteria</h5>
                                <table class="table table-bordered table-striped w-100">
                                    <table id="example1" class="table table-bordered table-striped w-100">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="align-middle text-start" style="width: 20px;">No</th>
                                                <th rowspan="2" class="align-middle text-start">Nama</th>
                                                <th colspan="<?= @count($karyawans[0]['kriterias']) ?>" class="align-middle text-center">Kriteria</th>
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
                                                        <?php foreach ($value['kriterias'] as $kriteria) : ?>
                                                            <td class="text-center"><?= $kriteria['kriteria_sub_nilai'] ?? '-'; ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>

                                        </tbody>
                                    </table>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <h5>2. Proses Perhitungan</h5>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <h6>1. Normalisasi Bobot</h6>

                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-bordered table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="5" class="text-center">Kriteria Penilaian Kelayakan Kenaikan Gaji Karyawan</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Kode Kriteria</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>Atribut</th>
                                                            <th colspan="2" class="text-center">Bobot</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($kriterias as $key => $kriteria) : ?>
                                                            <tr>
                                                                <td><?= $kriteria->kode ?></td>
                                                                <td><?= $kriteria->nama ?></td>
                                                                <td><?= $kriteria->atribut ?></td>
                                                                <td class="text-center"><?= $kriteria->bobot ?>%</td>
                                                                <td class="text-center"><?= $kriteria->bobot / 100; ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <table>
                                                    <?php foreach ($kriterias as $key => $kriteria) : ?>
                                                        <tr>
                                                            <td rowspan="2"><b>w<?= $key + 1; ?> </b><span class="px-2">=</span></td>
                                                            <td colspan="12" class="border-bottom text-center"><?= $kriteria->bobot; ?></td>
                                                            <td rowspan="2"><span class="px-2">=</span><?= $kriteria->bobot / $kriteria_jumlah_keseluruhan; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <?php foreach ($kriteria_list_bobot as $bobot): ?>
                                                                <td><?= $bobot  ?> + </td>
                                                            <?php endforeach ?>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mt-4">
                                                <b>Ʃwj</b> =
                                                <?php
                                                $last_index = count($kriterias) - 1;
                                                foreach ($kriterias as $i => $kriteria): ?>
                                                    <span><?= $kriteria->bobot ?><?= $i < $last_index ? ' + ' : '' ?></span>
                                                <?php endforeach; ?>
                                                = <?= $kriteria_jumlah_keseluruhan ?>
                                            </div>
                                        </div>

                                        <hr>

                                        <h6>2. Menghitung Nilai Vektor S</h6>

                                        <?php $s_values = []; ?>
                                        <div class="row">
                                            <div class="col">
                                                <?php foreach ($karyawans as $key => $value) : ?>
                                                    <p>
                                                        <b>s<?= $key + 1; ?></b><span class="px-2">=</span>
                                                        <?php
                                                        $last_index = count($value['kriterias']) - 1;
                                                        $hasil = 1;

                                                        foreach ($value['kriterias'] as $i => $kriteria) :
                                                            $nilai = $kriteria['kriteria_sub_nilai'];
                                                            $bobot = $kriteria['bobot'];
                                                            $bobot_normalisasi = $bobot / $kriteria_jumlah_keseluruhan;
                                                            $hasil *= pow($nilai, $bobot_normalisasi);
                                                        ?>
                                                            <span>(
                                                                <?= $nilai ?>
                                                                <sup><?= $bobot_normalisasi ?></sup>
                                                                )</span><?= $i < $last_index ? ' × ' : '' ?>
                                                        <?php endforeach; ?>
                                                        <span class="px-2">=</span> <b><?= number_format($hasil, 4) ?></b>
                                                        <?php $s_values[] = $hasil; ?>
                                                    </p>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mt-3">
                                                <p>
                                                    <b>Total</b><span class="px-2">=</span>
                                                    <?php
                                                    $last_index = count($s_values) - 1;
                                                    $total = 0;
                                                    foreach ($s_values as $i => $s) {
                                                        echo number_format($s, 3);
                                                        if ($i < $last_index) echo ' + ';
                                                        $total += $s;
                                                    }
                                                    ?>
                                                    <span class="px-2">=</span> <b><?= number_format($total, 3) ?></b>
                                                </p>
                                            </div>
                                        </div>

                                        <hr>

                                        <h6>3. Perhitungan nilai vektor Vi dari setiap alternatif</h6>

                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <?php foreach ($s_values as $i => $val) : ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <table>
                                                                <tr>
                                                                    <td rowspan="2"><b><i>v</i><?= $i + 1; ?></b></td>
                                                                    <td rowspan="2"><span class="px-2">=</span></td>
                                                                    <td class="border-bottom text-center"><?= number_format($val, 3); ?></td>
                                                                    <td rowspan="2"><span class="px-2">=</span></td>
                                                                    <td rowspan="2"><b><?= number_format(($val / $total), 3); ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><?= number_format($total, 3); ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <table class="table table-bordered table-striped w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Karyawan</th>
                                                            <th class="text-center">Nilai Vi</th>
                                                            <th class="text-center">Keputusan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($karyawans as $key => $value) : ?>
                                                            <tr>
                                                                <td><?= $value['nama_lengkap']; ?></td>
                                                                <td class="text-center"><?= number_format($value['hasil'], 3); ?></td>
                                                                <td class="text-center"><?= $value['keputusan']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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