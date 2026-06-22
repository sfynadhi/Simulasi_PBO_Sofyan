<?php
// pendaftaran.php

abstract class Pendaftaran
{
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    public function __construct(
        $id_pendaftaran,
        $nama_calon,
        $asal_sekolah,
        $nilai_ujian,
        $biayaPendaftaranDasar
    ) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // Getter
    public function getIdPendaftaran()
    {
        return $this->id_pendaftaran;
    }

    public function getNamaCalon()
    {
        return $this->nama_calon;
    }

    public function getAsalSekolah()
    {
        return $this->asal_sekolah;
    }

    public function getNilaiUjian()
    {
        return $this->nilai_ujian;
    }

    public function getBiayaPendaftaranDasar()
    {
        return $this->biayaPendaftaranDasar;
    }

    // Method abstrak
    abstract public function hitungTotalBiaya();

    abstract public function tampilkanInfoJalur();

    // Method umum
    public function tampilkanData()
    {
        echo "<h3>Data Pendaftar</h3>";
        echo "ID Pendaftaran : {$this->id_pendaftaran}<br>";
        echo "Nama Calon     : {$this->nama_calon}<br>";
        echo "Asal Sekolah   : {$this->asal_sekolah}<br>";
        echo "Nilai Ujian    : {$this->nilai_ujian}<br>";
        echo "Biaya Dasar    : Rp " . number_format($this->biayaPendaftaranDasar, 0, ',', '.') . "<br>";
    }
}
?>