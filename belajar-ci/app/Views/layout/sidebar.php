<div class="col-md-3">
    <div class="list-group">
        <?php
        $role = session()->get('role');
        if ($role === 'admin') : ?>
            <a href="/admin" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="/admin/mobil" class="list-group-item list-group-item-action">Manajemen Mobil</a>
            <a href="/admin/penyewaan" class="list-group-item list-group-item-action">Data Penyewaan</a>
            <a href="/admin/user" class="list-group-item list-group-item-action">Manajemen User</a>
            <a href="/logout" class="list-group-item list-group-item-action">Logout</a>
        <?php else : ?>
            <a href="/user" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="/mobil" class="list-group-item list-group-item-action">Daftar Mobil</a>
            <a href="/mobil/disewa" class="list-group-item list-group-item-action">Mobil yang Disewa</a>
            <a href="/logout" class="list-group-item list-group-item-action">Logout</a>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-9">
