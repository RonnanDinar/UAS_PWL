<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Admin Dashboard') ?></title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
<?php $role = session('role') ?? 'user'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <?= view('layout/header') ?>
        <div class="d-flex">
            <a href="/logout" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h3 class="mb-3">Selamat Datang, <?= esc(session('nama') ?? 'Admin') ?></h3>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Mobil</h5>
                    <p class="card-text display-4"><?= esc($total_mobil) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Penyewaan</h5>
                    <p class="card-text display-4"><?= esc($total_penyewaan) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Pengguna Terdaftar</h5>
                    <p class="card-text display-4"><?= esc($total_user) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
