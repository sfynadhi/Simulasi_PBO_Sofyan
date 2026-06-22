<?php
require_once 'pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran
{
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($data)
    {
        parent::__construct(
            $data['id_pendaftaran'],
            $data['nama_calon'],
            $data['asal_sekolah'],
            $data['nilai_ujian'],
            $data['biaya_pendaftaran_dasar']
        );

        $this->jenisPrestasi = $data['jenis_prestasi'];
        $this->tingkatPrestasi = $data['tingkat_prestasi'];
    }

    public static function getDaftarPrestasi($db)
    {
        return $db->query("
            SELECT * FROM tabel_pendaftaran
            WHERE jalur_pendaftaran='Prestasi'
        ");
    }

    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur()
    {
        return $this->jenisPrestasi . " | " . $this->tingkatPrestasi;
    }
}