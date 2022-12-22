<?php

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/Auth.php";

use PHPUnit\Framework\TestCase;

final class AuthenticationTest extends TestCase
{
    public function testAuthSuccess(){
        $Auth = new Auth();
        $insert = $Auth->login("admin", "admin");

        $this->assertTrue($insert);
    }

    public function testUsernameSalah(): void{
        $this->expectException(InvalidArgumentException::class);
        $Auth = new Auth();
        $Auth->login("Halo", "admin");
    }

    public function testPasswordSalah(): void {
        $this->expectException(InvalidArgumentException::class);
        $Auth = new Auth();
        $Auth->login("admin", "123456");
    }

    public function testUsernameDanPasswordSalah(){
        $this->expectException(InvalidArgumentException::class);
        $Auth = new Auth();
        $Auth->login("Haloo", "123456");
    }
}
