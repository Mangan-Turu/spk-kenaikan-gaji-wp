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
    <!-- Tabel Kriteria -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title py-0 my-0 mt-2">Kriteria Penilaian Kelayakan Kenaikan Gaji Karyawan</h2>

                    <div class="card-tools">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKriteria">Tambah Kriteria</button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th colspan="2" class="text-center">Bobot</th>
                                <th class="text-right" style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($kriteria) > 0) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($kriteria as $k) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $k->nama; ?></td>
                                        <td class="text-center"><?= $k->bobot; ?>%</td>
                                        <td class="text-center"><?= $k->bobot / 100; ?></td>
                                        <td class="text-right">
                                            <a href="<?= site_url('kriteria/edit/'.$k->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger btn-hapus" data-id="<?= $k->id ?>" data-url="<?= base_url('kriteria/hapus/') ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: block;">
                    Total Kriteria: <?= count($kriteria); ?> Row || Total Bobot: <?= array_sum(array_column($kriteria, 'bobot')); ?>% <?= array_sum(array_column($kriteria, 'bobot')) > 100 ? '|| <span class="text-danger">Perhatian !! Total bobot tidak boleh melebihi 100%</span>' : ''; ?>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
    </div>
    <!-- End Tabel Kriteria -->

    <!-- Tabel Sub Kriteria -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title py-0 my-0 mt-2">Pembobotan Sub-kriteria</h2>

                    <div class="card-tools">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSubKriteria">Tambah Kriteria</button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th colspan="<?= !empty($kriteria_sub['1']['nilai']) ? count($kriteria_sub['1']['nilai']) : 1 ?>" class="text-center">Nilai</th>
                                <th class="text-right" style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($kriteria_sub) > 0) : ?>
                                <?php foreach ($kriteria_sub as $key => $row): ?>
                                    <tr>
                                        <td><?= $key ?></td>
                                        <td><?= $row['kode'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <td class="text-center"><?= isset($row['nilai'][$i]) ? $row['nilai'][$i] : '-' ?></td>
                                        <?php endfor; ?>
                                        <td class="text-right">
                                            <a href="<?= site_url('kriteria/edit_sub/'.$row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger btn-hapus" data-id="<?= $row['id'] ?>" data-url="<?= base_url('kriteria/hapus_sub/') ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="display: block;">
                    Total Kriteria: <?= count($kriteria); ?> Row || Total Bobot: <?= array_sum(array_column($kriteria, 'bobot')); ?>% <?= array_sum(array_column($kriteria, 'bobot')) > 100 ? '|| <span class="text-danger">Perhatian !! Total bobot tidak boleh melebihi 100%</span>' : ''; ?>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
    </div>
    <!-- End Tabel Sub Kriteria -->
</section>

<?php $this->load->view('modal_tambah_kriteria'); ?>
<?php $this->load->view('modal_tambah_sub_kriteria'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const url = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data ini tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url + id;
                    }
                });
            });
        });
    });
</script>
