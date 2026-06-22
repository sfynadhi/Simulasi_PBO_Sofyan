<?php
// PendaftaranPrestasi.php
require_once 'pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor menduduki constructor induk + properti tambahan
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Implementasi metode abstrak dari kelas induk
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 0.75; // Contoh logika: potongan 25% untuk prestasi
    }

    public function tampilkanInfoJalur() {
        echo "Jalur Pendaftaran: Prestasi<br>";
        echo "Jenis Prestasi: " . $this->jenisPrestasi . "<br>";
        echo "Tingkat Prestasi: " . $this->tingkatPrestasi . "<br>";
    }

    // Metode Query Spesifik untuk Jalur Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
// Overriding metode untuk Jalur Prestasi
    public function hitungTotalBiaya() {
        // Total Biaya = biayaPendaftaranDasar - 50000
        return $this->biayaPendaftaranDasar - 50000;
    }
?>