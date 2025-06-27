<?= view('layout/header') ?>
<?= view('layout/sidebar') ?>

<div class="container mt-4">
    <h3 class="mb-4">Data Penyewaan Mobil</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Merk</th>
                    <th>No Polisi</th>
                    <th>Nama Penyewa</th>
                    <th>Tgl Sewa</th>
                    <th>Tgl Kembali</th>
                    <th>Harga/Hari</th>
                    <th>Jumlah Hari</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($penyewaan as $row): ?>
                    <?php
                        $tglSewa = strtotime($row['tanggal_sewa']);
                        $tglKembali = $row['tanggal_kembali'] ? strtotime($row['tanggal_kembali']) : time();
                        $hari = max(1, ceil(($tglKembali - $tglSewa) / (60 * 60 * 24)));
                        $hargaPerHari = (int)($row['harga_sewa'] ?? 0);
                        $totalHarga = $hari * $hargaPerHari;
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row['nama_mobil']) ?></td>
                        <td><?= esc($row['merk']) ?></td>
                        <td><?= esc($row['nopol']) ?></td>
                        <td><?= esc($row['nama'] ?? '-') ?></td>
                        <td><?= date('d M Y', strtotime($row['tanggal_sewa'])) ?></td>
                        <td><?= $row['tanggal_kembali'] ? date('d M Y', strtotime($row['tanggal_kembali'])) : '-' ?></td>
                        <td>Rp<?= number_format($hargaPerHari, 0, ',', '.') ?></td>
                        <td><?= $hari ?> hari</td>
                        <td><strong>Rp<?= number_format($totalHarga, 0, ',', '.') ?></strong></td>
                        <td class="text-center">
                            <span class="badge <?= $row['status'] === 'diproses' ? 'bg-warning' : 'bg-success' ?>">
                                <?= esc(ucfirst($row['status'])) ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <?php if ($row['status'] === 'diproses'): ?>
                                <a href="<?= base_url('admin/penyewaan/edit/' . $row['id']) ?>"
                                   class="btn btn-sm btn-success"
                                   onclick="return confirm('Selesaikan penyewaan ini?')">
                                    Selesaikan
                                </a>
                            <?php else: ?>
                                <a href="<?= base_url('admin/penyewaan/nota/' . $row['id']) ?>"
                                   class="btn btn-sm btn-info">
                                   Nota
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= view('layout/footer') ?>
