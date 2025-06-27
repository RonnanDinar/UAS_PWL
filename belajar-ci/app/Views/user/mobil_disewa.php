<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3 class="mb-4">Mobil yang Sedang Disewa</h3>

    <?php if (empty($mobil_disewa)): ?>
        <div class="alert alert-warning text-center">
            Tidak ada mobil yang sedang disewa saat ini.
        </div>
    <?php else: ?>
    <div class="row">
        <?php foreach ($mobil_disewa as $m): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="<?= base_url('uploads/mobil/' . ($m['gambar'] ?? 'default.jpg')) ?>"
                     class="card-img-top"
                     alt="<?= esc($m['nama_mobil']) ?>"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($m['nama_mobil']) ?></h5>
                    <p class="card-text">
                        <strong>Merk:</strong> <?= esc($m['merk']) ?><br>
                        <strong>No Polisi:</strong> <?= esc($m['nopol']) ?><br>
                        <strong>Harga:</strong> Rp<?= number_format($m['harga_sewa'], 0, ',', '.') ?>/hari<br>
                        <strong>Tgl Sewa:</strong> <?= date('d M Y', strtotime($m['tanggal_sewa'])) ?><br>
                        <strong>Tgl Kembali:</strong> <?= date('d M Y', strtotime($m['tanggal_kembali'])) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <hr class="my-5">

    <h4 class="mb-3">Riwayat Penyewaan</h4>

    <?php if (empty($riwayat)): ?>
        <div class="alert alert-info text-center">
            Belum ada riwayat penyewaan.
        </div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Mobil</th>
                    <th>Merk</th>
                    <th>No Polisi</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Harga/Hari</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($riwayat as $r): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <img src="<?= base_url('uploads/mobil/' . ($r['gambar'] ?? 'default.jpg')) ?>"
                             width="80" class="img-thumbnail">
                    </td>
                    <td><?= esc($r['nama_mobil']) ?></td>
                    <td><?= esc($r['merk']) ?></td>
                    <td><?= esc($r['nopol']) ?></td>
                    <td><?= date('d M Y', strtotime($r['tanggal_sewa'])) ?></td>
                    <td><?= date('d M Y', strtotime($r['tanggal_kembali'])) ?></td>
                    <td>Rp<?= number_format($r['harga_sewa'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>

<?= view('layout/footer') ?>
