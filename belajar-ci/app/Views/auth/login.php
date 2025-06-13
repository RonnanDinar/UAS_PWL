<!DOCTYPE html>
<html>
<head>
    <title>Login - Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .login-container {
            margin-top: 80px;
        }
    </style>
</head>
<body>
<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Login Rental Mobil</h4>
                </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url('/login') ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email/Username</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="<?= base_url('/register') ?>">Belum punya akun? Daftar sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
