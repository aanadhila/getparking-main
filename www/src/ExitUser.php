<?php

declare(strict_types=1);
session_start();
require_once __DIR__ . "/Config.php";

final class ExitUser extends Config{

    public function __construct()
    {
        parent::__construct();

        $this->ensureDataIsLoaded();
    }

    public function ensureDataIsLoaded(): array
    {
        $arr = [];

        $sql = $this->db->query("SELECT * FROM user");

        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function keluar($username, $password)
    {
        
        if ($row2=$this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'")->fetch_object()) {
            $_SESSION['user'] = TRUE;
            $_SESSION['username'] = $row2->username;
            $_SESSION['level'] = $row2->level;
            $_SESSION['namalengkap']= $row2->namalengkap;

            if(session_destroy()){
                return true;
            }

        }
    }
}
