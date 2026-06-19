<?php
// Pendaftaran.php

abstract class Pendaftaran {
    // Properti/Atribut Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; // Sesuai permintaan penamaan di soal

    // Constructor untuk memetakan nilai dari kolom database
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        // Memetakan kolom 'biaya_pendaftaran_dasar' dari DB ke properti '$biayaPendaftaranDasar'
        $this->biayaPendaftaranDasar = $biaya_pendaftaran_dasar;
    }

    // (Opsional) Getter jika nanti datanya perlu ditampilkan di interface/tahap selanjutnya
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }
}
?>