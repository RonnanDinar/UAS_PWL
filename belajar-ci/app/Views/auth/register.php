<!DOCTYPE html>
<html>
<head>
    <title>Registrasi - Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .register-container {
            margin-top: 80px;
        }
    </style>
</head>
<body>
<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4>Daftar Akun Rental Mobil</h4>
                </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('auth/registerSave') ?>" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email/Username</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Daftar</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="<?= base_url('/login') ?>">Sudah punya akun? Masuk di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
