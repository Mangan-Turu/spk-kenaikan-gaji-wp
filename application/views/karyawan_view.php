<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title py-0 my-0 mt-2"><?= $page_title ?></h2>

                    <div class="card-tools">
                        <button class="btn btn-primary">Tambah Karyawan</button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>No. Hp</th>
                                <th>Email</th>
                                <th>Departemen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($karyawan as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row->nama_lengkap) ?></td>
                                <td><?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                <td><?= htmlspecialchars($row->tempat_lahir) ?></td>
                                <td><?= date('d-m-Y', strtotime($row->tanggal_lahir)) ?></td>
                                <td><?= htmlspecialchars($row->no_hp) ?></td>
                                <td><?= htmlspecialchars($row->email) ?></td>
                                <td><?= htmlspecialchars($row->departemen) ?></td>
                                <td>
                                    <a href="<?= site_url('karyawan/edit/'.$row->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= site_url('karyawan/hapus/'.$row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
