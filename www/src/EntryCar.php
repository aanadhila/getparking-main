<?php

declare(strict_types=1);

require_once __DIR__ . "/Config.php";

final class EntryCar extends Config
{

    public function __construct()
    {
        parent::__construct();

        $this->ensureDataIsLoaded();
    }

    public function ensureDataIsLoaded(): array
    {
        $arr = [];

        $sql = $this->db->query("SELECT * FROM mobilaktif");

        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function insertData($plat_nomor, $jenis_kendaraan)
    {
        if (is_null($plat_nomor)) {
            throw new InvalidArgumentException("Plat Nomor tidak boleh kosong");
        }

        if (is_null($jenis_kendaraan)) {
            throw new InvalidArgumentException("Jenis Kendaraan tidak boleh kosong");
        }

        if ($this->db->query("SELECT * FROM mobilaktif WHERE plat_nomor = '$plat_nomor' ")->fetch_object()) {
            throw new InvalidArgumentException("Kendaraan telah terdaftar");
        }

        if ($this->db->query("INSERT INTO tbmobil VALUES(NULL, '$plat_nomor', '$jenis_kendaraan' ,NOW(),'','','','','Masuk Parkir')")) {

            $this->db->query("INSERT INTO mobilaktif VALUES(NULL, '$plat_nomor', '$jenis_kendaraan', NOW())");

            return true;
        }
    }
}
