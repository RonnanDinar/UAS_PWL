<?php
$api_url = 'http://localhost:8080/api/rental'; // Ganti jika kamu pakai port atau domain lain
$api_key = 'random123678'; // Sesuaikan dengan API key di .env

// Inisialisasi cURL
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'X-API-KEY: ' . $api_key
    ]
]);

$response = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

// Cek status dan decode
$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Data Penyewaan Mobil</h2>

    <?php if ($http_status === 200 && is_array($data)): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Nama Mobil</th>
                    <th>Merk</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama_user']) ?></td>
                        <td><?= htmlspecialchars($row['nama_mobil']) ?></td>
                        <td><?= htmlspecialchars($row['merk']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal_sewa']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal_kembali']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif ($http_status === 401): ?>
        <div class="alert alert-danger">
            <strong>API Key tidak cocok!</strong> Akses ditolak.
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            <strong>Gagal mengambil data.</strong> Cek koneksi API atau server.
        </div>
    <?php endif; ?>
</div>
</body>
</html>
