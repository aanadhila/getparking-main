<?php

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/ExitUser.php";

use PHPUnit\Framework\TestCase;

final class UserExitTest extends TestCase
{
    public function testExit(){
        $ExitUser = new ExitUser();
        $insert = $ExitUser->keluar("admin", "admin");

        $this->assertTrue($insert);
    }

}
