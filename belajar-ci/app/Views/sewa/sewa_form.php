<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3 class="mb-4">Form Penyewaan Mobil</h3>

    <div class="row">
        <!-- FORM PENYEWAAN -->
        <div class="col-md-6">
            <form action="<?= base_url('/mobil/sewa/submit') ?>" method="post">
                <input type="hidden" name="mobil_id" value="<?= esc($mobil['id']) ?>">

                <div class="mb-3">
                    <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                    <input type="date"
                           class="form-control"
                           id="tanggal_sewa"
                           name="tanggal_sewa"
                           required
                           min="<?= date('Y-m-d') ?>">
                </div>

                <div class="mb-3">
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                    <input type="date"
                           class="form-control"
                           id="tanggal_kembali"
                           name="tanggal_kembali"
                           required
                           min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                </div>

                <button type="submit" class="btn btn-primary w-100">Sewa Sekarang</button>
            </form>
        </div>

        <!-- INFORMASI MOBIL -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <img src="<?= base_url('uploads/mobil/' . ($mobil['gambar'] ?? 'default.jpg')) ?>"
                     class="card-img-top"
                     alt="<?= esc($mobil['nama_mobil']) ?>"
                     style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($mobil['nama_mobil']) ?></h5>
                    <p class="card-text mb-1"><strong>Merk:</strong> <?= esc($mobil['merk']) ?></p>
                    <p class="card-text mb-1"><strong>No Polisi:</strong> <?= esc($mobil['nopol']) ?></p>
                    <p class="card-text"><strong>Harga Sewa:</strong> Rp<?= number_format($mobil['harga_sewa'], 0, ',', '.') ?>/hari</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
