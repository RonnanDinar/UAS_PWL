<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3 class="mb-4">Dashboard Admin</h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Mobil Tersedia</h5>
                    <p class="card-text display-5"><?= esc($total_mobil) ?></p>
                </div>
               <div class="card-footer bg-transparent border-top-0">
                <a href="<?= base_url('/admin/mobil') ?>" class="btn btn-light w-100">Lihat Semua Mobil</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Penyewaan</h5>
                    <p class="card-text display-5"><?= esc($total_penyewaan) ?></p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="/admin/penyewaan" class="btn btn-light w-100">Lihat Data Penyewaan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Pengguna Terdaftar</h5>
                    <p class="card-text display-5"><?= esc($total_user) ?></p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="/admin/user" class="btn btn-light w-100">Lihat Data User</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
