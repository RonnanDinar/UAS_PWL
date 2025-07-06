<?php
// Ambil data dari API
$api_url = 'http://localhost:8080/api/rental'; // Pastikan ini benar

// Jika pakai API Key, bisa pakai cURL
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'X-API-KEY: random123678abcghi' // Ganti dengan API key kamu jika pakai filter
    ]
]);

$response = curl_exec($curl);
curl_close($curl);

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
    <h2>Data Penyewaan Mobil</h2>
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
        <?php if (!empty($data)): ?>
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
        <?php else: ?>
            <tr><td colspan="6">Data tidak tersedia</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
