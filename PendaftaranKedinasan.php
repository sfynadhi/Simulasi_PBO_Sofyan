<?php
require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran
{
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($data)
    {
        parent::__construct(
            $data['id_pendaftaran'],
            $data['nama_calon'],
            $data['asal_sekolah'],
            $data['nilai_ujian'],
            $data['biaya_pendaftaran_dasar']
        );

        $this->skIkatanDinas = $data['sk_ikatan_dinas'];
        $this->instansiSponsor = $data['instansi_sponsor'];
    }

    public static function getDaftarKedinasan($db)
    {
        return $db->query("
            SELECT * FROM tabel_pendaftaran
            WHERE jalur_pendaftaran='Kedinasan'
        ");
    }

    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur()
    {
        return $this->instansiSponsor . " | " . $this->skIkatanDinas;
    }
}