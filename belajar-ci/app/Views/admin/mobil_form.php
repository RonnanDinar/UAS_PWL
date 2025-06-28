<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-5">
    <div class="form-container">
        <h4 class="mb-4"><?= isset($mobil) ? 'Edit Data Mobil' : 'Tambah Data Mobil' ?></h4>

        <!-- ✅ Tambahkan enctype="multipart/form-data" -->
        <form method="post" enctype="multipart/form-data" 
              action="<?= isset($mobil) ? base_url('mobil/update/' . $mobil['id']) : base_url('mobil/store') ?>">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nama_mobil" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil"
                       value="<?= $mobil['nama_mobil'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk"
                       value="<?= $mobil['merk'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="nopol" class="form-label">Nomor Polisi</label>
                <input type="text" class="form-control" id="nopol" name="nopol"
                       value="<?= $mobil['nopol'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa</label>
                <input type="number" class="form-control" id="harga_sewa" name="harga_sewa"
                       value="<?= $mobil['harga_sewa'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Mobil</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                <?php if (isset($mobil['gambar']) && $mobil['gambar']): ?>
                    <div class="mt-2">
                        <img src="<?= base_url('uploads/mobil/' . $mobil['gambar']) ?>" alt="Foto Mobil"
                             class="img-thumbnail" style="max-height: 200px;">
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="tersedia" <?= (isset($mobil) && $mobil['status'] == 'tersedia') ? 'selected' : '' ?>>Tersedia</option>
                    <option value="disewa" <?= (isset($mobil) && $mobil['status'] == 'disewa') ? 'selected' : '' ?>>Disewa</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('admin/mobil') ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<?= view('layout/footer') ?>
