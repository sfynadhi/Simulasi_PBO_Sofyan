<?php
// PendaftaranKedinasan.php
require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor menduduki constructor induk + properti tambahan
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Implementasi metode abstrak dari kelas induk
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar + 100000; // Contoh logika: Tambahan biaya perlengkapan/seragam fixed Rp 100.000
    }

    public function tampilkanInfoJalur() {
        echo "Jalur Pendaftaran: Kedinasan<br>";
        echo "SK Ikatan Dinas: " . $this->skIkatanDinas . "<br>";
        echo "Instansi Sponsor: " . $this->instansiSponsor . "<br>";
    }

    // Metode Query Spesifik untuk Jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
// Overriding metode untuk Jalur Kedinasan
    public function hitungTotalBiaya() {
        // Total Biaya = biayaPendaftaranDasar * 1.25
        return $this->biayaPendaftaranDasar * 1.25;
    }
?>