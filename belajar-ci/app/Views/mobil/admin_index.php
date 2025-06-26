_<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3 class="mb-4">Daftar Semua Mobil</h3>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Merk</th>
                <th>No Polisi</th>
                <th>Harga Sewa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($mobil as $m): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($m['nama_mobil']) ?></td>
                <td><?= esc($m['merk']) ?></td>
                <td><?= esc($m['nopol']) ?></td>
                <td>Rp<?= number_format($m['harga_sewa'], 0, ',', '.') ?></td>
                <td>
                    <span class="badge <?= $m['status'] == 'tersedia' ? 'bg-success' : 'bg-danger' ?>">
                        <?= esc($m['status']) ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= view('layout/footer') ?>
