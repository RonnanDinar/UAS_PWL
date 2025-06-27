<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Semua Mobil</h3>
        <a href="<?= base_url('mobil/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Mobil
        </a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Mobil</th>
                <th>Merk</th>
                <th>No Polisi</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($mobil as $m): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <?php if (!empty($m['gambar'])): ?>
                        <img src="<?= base_url('uploads/mobil/' . $m['gambar']) ?>" alt="Foto" width="80" class="img-thumbnail">
                    <?php else: ?>
                        <span class="text-muted">Tidak ada foto</span>
                    <?php endif; ?>
                </td>
                <td><?= esc($m['nama_mobil']) ?></td>
                <td><?= esc($m['merk']) ?></td>
                <td><?= esc($m['nopol']) ?></td>
                <td>Rp<?= number_format($m['harga_sewa'], 0, ',', '.') ?></td>
                <td>
                    <span class="badge <?= $m['status'] == 'tersedia' ? 'bg-success' : 'bg-danger' ?>">
                        <?= esc($m['status']) ?>
                    </span>
                </td>
                <td>
                    <a href="<?= base_url('mobil/edit/' . $m['id']) ?>" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="<?= base_url('mobil/delete/' . $m['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <i class="bi bi-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= view('layout/footer') ?>
