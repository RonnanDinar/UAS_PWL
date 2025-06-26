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
    <h3>Halo, <?= session()->get('nama') ?>!</h3>
    <p>Selamat datang di layanan rental mobil online kami.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title">Mobil yang Tersedia</h5>
                    <p class="card-text display-6">5</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Penyewaan Aktif Anda</h5>
                    <p class="card-text display-6">2</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?= view('layout/footer') ?>

</body>
</html>

