<?php
// PendaftaranReguler.php
require_once 'pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor menduduki constructor induk + properti tambahan
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Implementasi metode abstrak dari kelas induk
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar; // Reguler menggunakan biaya normal
    }

    public function tampilkanInfoJalur() {
        echo "Jalur Pendaftaran: Reguler<br>";
        echo "Pilihan Prodi: " . $this->pilihanProdi . "<br>";
        echo "Lokasi Kampus: " . $this->lokasiKampus . "<br>";
    }

    // Metode Query Spesifik untuk Jalur Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>