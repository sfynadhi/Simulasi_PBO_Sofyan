<?php
// index.php

// 1. Import koneksi dan semua definisi kelas
require_once 'koneksi.php'; // Pastikan file koneksi mengembalikan objek PDO (misal: $db)
require_once 'pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Inisialisasi koneksi database menggunakan class/koneksi yang Anda buat di Tahap 3
// Contoh instansiasi jika menggunakan class Database:
// $database = new Database();
// $db = $database->getConnection();

try {
    // 2. Memanfaatkan metode query spesifik dari Tahap 4 untuk mengambil data
    $dataReguler = PendaftaranReguler::getDaftarReguler($db);
    $dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
    $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
} catch (PDOException $e) {
    die("Gagal mengambil data dari database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; }
        h1 { text-align: center; color: #333; }
        h2 { color: #2c3e50; margin-top: 30px; border-bottom: 2px solid #2c3e50; padding-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .text-right { text-align: right; }
        .info-spesifik { font-size: 0.9em; color: #555; background: #f0f4f8; padding: 5px; border-radius: 4px; }
    </style>
</head>
<body>

    <h1>Panel Antarmuka Pendaftaran Mahasiswa Baru</h1>

    <h2>Kategori: Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataReguler)): ?>
                <tr><td colspan="6" style="text-align:center;">Tidak ada data calon mahasiswa jalur Reguler.</td></tr>
            <?php else: ?>
                <?php foreach ($dataReguler as $row): ?>
                    <?php 
                    // Instansiasi objek secara polimorfik
                    $objReguler = new PendaftaranReguler(
                        $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                        $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                        $row['pilihan_prodi'], $row['lokasi_kampus']
                    );
                    ?>
                    <tr>
                        <td><?= $row['id_pendaftaran']; ?></td>
                        <td><strong><?= htmlspecialchars($row['nama_calon']); ?></strong></td>
                        <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                        <td><?= $row['nilai_ujian']; ?></td>
                        <td>
                            <div class="info-spesifik">
                                <?php $objReguler->tampilkanInfoJalur(); ?>
                            </div>
                        </td>
                        <td class="text-right"><strong>Rp <?= number_format($objReguler->hitungTotalBiaya(), 2, ',', '.'); ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <h2>Kategori: Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataPrestasi)): ?>
                <tr><td colspan="6" style="text-align:center;">Tidak ada data calon mahasiswa jalur Prestasi.</td></tr>
            <?php else: ?>
                <?php foreach ($dataPrestasi as $row): ?>
                    <?php 
                    // Instansiasi objek secara polimorfik
                    $objPrestasi = new PendaftaranPrestasi(
                        $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                        $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                        $row['jenis_prestasi'], $row['tingkat_prestasi']
                    );
                    ?>
                    <tr>
                        <td><?= $row['id_pendaftaran']; ?></td>
                        <td><strong><?= htmlspecialchars($row['nama_calon']); ?></strong></td>
                        <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                        <td><?= $row['nilai_ujian']; ?></td>
                        <td>
                            <div class="info-spesifik">
                                <?php $objPrestasi->tampilkanInfoJalur(); ?>
                            </div>
                        </td>
                        <td class="text-right"><strong>Rp <?= number_format($objPrestasi->hitungTotalBiaya(), 2, ',', '.'); ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <h2>Kategori: Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Informasi Spesifik Jalur</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataKedinasan)): ?>
                <tr><td colspan="6" style="text-align:center;">Tidak ada data calon mahasiswa jalur Kedinasan.</td></tr>
            <?php else: ?>
                <?php foreach ($dataKedinasan as $row): ?>
                    <?php 
                    // Instansiasi objek secara polimorfik
                    $objKedinasan = new PendaftaranKedinasan(
                        $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                        $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'],
                        $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                    );
                    ?>
                    <tr>
                        <td><?= $row['id_pendaftaran']; ?></td>
                        <td><strong><?= htmlspecialchars($row['nama_calon']); ?></strong></td>
                        <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                        <td><?= $row['nilai_ujian']; ?></td>
                        <td>
                            <div class="info-spesifik">
                                <?php $objKedinasan->tampilkanInfoJalur(); ?>
                            </div>
                        </td>
                        <td class="text-right"><strong>Rp <?= number_format($objKedinasan->hitungTotalBiaya(), 2, ',', '.'); ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>