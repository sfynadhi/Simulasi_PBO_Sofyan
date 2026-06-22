<?php

require_once 'koneksi.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

$reguler = PendaftaranReguler::getDaftarReguler($db);
$prestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
$kedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

function tampilkanTabel($data, $kelas)
{
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Asal Sekolah</th>
            <th>Nilai</th>
            <th>Info Jalur</th>
            <th>Total Biaya</th>
          </tr>";

    while($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        $obj = new $kelas($row);

        echo "<tr>";
        echo "<td>".$row['id_pendaftaran']."</td>";
        echo "<td>".$row['nama_calon']."</td>";
        echo "<td>".$row['asal_sekolah']."</td>";
        echo "<td>".$row['nilai_ujian']."</td>";
        echo "<td>".$obj->tampilkanInfoJalur()."</td>";
        echo "<td>Rp ".number_format($obj->hitungTotalBiaya(),0,',','.')."</td>";
        echo "</tr>";
    }

    echo "</table><br><br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Mahasiswa Baru</title>
</head>
<body>

<h2>Jalur Reguler</h2>
<?php tampilkanTabel($reguler,'PendaftaranReguler'); ?>

<h2>Jalur Prestasi</h2>
<?php tampilkanTabel($prestasi,'PendaftaranPrestasi'); ?>

<h2>Jalur Kedinasan</h2>
<?php tampilkanTabel($kedinasan,'PendaftaranKedinasan'); ?>

</body>
</html>