<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3><?= isset($user) ? 'Edit User' : 'Tambah User' ?></h3>

    <form method="post" action="<?= isset($user) ? base_url('admin/user/update/' . $user['id']) : base_url('admin/user/simpan') ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" required value="<?= $user['nama'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required value="<?= $user['email'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password <?= isset($user) ? '(Biarkan kosong jika tidak diubah)' : '' ?></label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" <?= (isset($user) && $user['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
                <option value="guest" <?= (isset($user) && $user['role'] === 'guest') ? 'selected' : '' ?>>Guest</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= view('layout/footer') ?>