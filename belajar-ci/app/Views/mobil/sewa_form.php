<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3>Sewa Mobil: <?= esc($mobil['nama_mobil']) ?></h3>

    <form action="<?= base_url('/mobil/sewa/submit') ?>" method="post">
        <input type="hidden" name="mobil_id" value="<?= esc($mobil['id']) ?>">

        <div class="mb-3">
            <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
            <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
            <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
        </div>

        <button type="submit" class="btn btn-primary">Sewa Sekarang</button>
    </form>
</div>

<?= view('layout/footer') ?>
