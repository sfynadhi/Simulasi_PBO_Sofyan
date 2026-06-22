<?php
require_once 'pendaftaran.php';

class PendaftaranReguler extends Pendaftaran
{
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($data)
    {
        parent::__construct(
            $data['id_pendaftaran'],
            $data['nama_calon'],
            $data['asal_sekolah'],
            $data['nilai_ujian'],
            $data['biaya_pendaftaran_dasar']
        );

        $this->pilihanProdi = $data['pilihan_prodi'];
        $this->lokasiKampus = $data['lokasi_kampus'];
    }

    public static function getDaftarReguler($db)
    {
        return $db->query("
            SELECT * FROM tabel_pendaftaran
            WHERE jalur_pendaftaran='Reguler'
        ");
    }

    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur()
    {
        return $this->pilihanProdi . " | " . $this->lokasiKampus;
    }
}