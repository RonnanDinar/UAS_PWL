<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-4 text-center">Nota Penyewaan Mobil</h4>

        <?php
            $tglSewa = strtotime($data['tanggal_sewa']);
            $tglKembali = $data['tanggal_kembali'] ? strtotime($data['tanggal_kembali']) : strtotime(date('Y-m-d'));
            $hari = max(1, ceil(($tglKembali - $tglSewa) / (60 * 60 * 24)));
            $total = $hari * $data['harga_sewa'];
        ?>

        <table class="table">
            <tr><th>Nama Penyewa</th><td><?= esc($data['nama']) ?></td></tr>
            <tr><th>Nama Mobil</th><td><?= esc($data['nama_mobil']) ?></td></tr>
            <tr><th>Merk</th><td><?= esc($data['merk']) ?></td></tr>
            <tr><th>No Polisi</th><td><?= esc($data['nopol']) ?></td></tr>
            <tr><th>Tanggal Sewa</th><td><?= date('d M Y', strtotime($data['tanggal_sewa'])) ?></td></tr>
            <tr><th>Tanggal Kembali</th><td><?= date('d M Y', $tglKembali) ?></td></tr>
            <tr><th>Harga per Hari</th><td>Rp<?= number_format($data['harga_sewa'], 0, ',', '.') ?></td></tr>
            <tr><th>Jumlah Hari</th><td><?= $hari ?> hari</td></tr>
            <tr><th>Total Harga</th><td><strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></td></tr>
        </table>

        <div class="text-center mt-4">
            <a href="<?= base_url('admin/penyewaan') ?>" class="btn btn-secondary">Kembali</a>
            <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer"></i> Cetak Nota</button>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
