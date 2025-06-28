<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3 class="mb-4">Daftar Mobil Tersedia</h3>

    <div class="row">
        <?php foreach ($mobil as $m): ?>
            <?php if ($m['status'] === 'tersedia'): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <?php
                        // Gunakan foto mobil jika ada, jika tidak pakai default.jpg
                        $gambar = $m['gambar'] ?? 'default.jpg';
                    ?>
                    <img src="<?= base_url('uploads/mobil/' . $gambar) ?>"
                         class="card-img-top"
                         alt="<?= esc($m['nama_mobil']) ?>"
                         style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title"><?= esc($m['nama_mobil']) ?></h5>
                        <p class="card-text">
                            <strong>Merk:</strong> <?= esc($m['merk']) ?><br>
                            <strong>No. Polisi:</strong> <?= esc($m['nopol']) ?><br>
                            <strong>Harga:</strong> Rp<?= number_format($m['harga_sewa'], 0, ',', '.') ?>/hari
                        </p>
                        <a href="<?= base_url('mobil/sewa/' . $m['id']) ?>" class="btn btn-primary w-100">
                            <i class="bi bi-cart"></i> Sewa Sekarang
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <?php if (empty(array_filter($mobil, fn($m) => $m['status'] === 'tersedia'))): ?>
        <div class="alert alert-warning text-center w-100">
            <strong>Mohon maaf!</strong> Semua mobil sedang disewa saat ini.
        </div>
    <?php endif; ?>
</div>

<?= view('layout/footer') ?>
