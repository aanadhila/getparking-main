<?php

declare(strict_types=1);

require_once __DIR__ . "/Config.php";

final class Auth extends Config
{

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

    public function login($username, $password)
    {
        if ($this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'")->fetch_object()) {
            return true;
        }

        if ($this->db->query("SELECT * FROM user WHERE username != '$username' AND password != '$password'")->fetch_object()) {
            throw new InvalidArgumentException("Username dan password salah");
        }
    }
}
