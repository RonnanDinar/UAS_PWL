<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3>Halo, <?= esc(session()->get('nama')) ?>!</h3>
    <p>Selamat datang di layanan rental mobil online kami.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-info shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <img src="<?= base_url('assets/icons/mobil.png') ?>" alt="mobil tersedia" width="50" class="me-3">
                    <div>
                        <h5 class="card-title mb-1">Mobil yang Tersedia</h5>
                        <h3 class="text-info"><?= esc($mobilTersedia) ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-secondary shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <img src="<?= base_url('assets/icons/rental.png') ?>" alt="penyewaan aktif" width="50" class="me-3">
                    <div>
                        <h5 class="card-title mb-1">Penyewaan Aktif Anda</h5>
                        <h3 class="text-secondary"><?= esc($penyewaanAktif) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>


</body>
</html>

