<?php

declare(strict_types=1);

require_once __DIR__ . "/Config.php";

final class CarExit extends Config
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertData($plat_nomor)
    {
        $this->db->query("UPDATE tbmobil SET waktu_keluar=NOW(), status='Keluar' WHERE plat_nomor='$plat_nomor'");
        $this->db->query("DELETE FROM mobilaktif WHERE plat_nomor='$plat_nomor'");
        return true;
    }
}
