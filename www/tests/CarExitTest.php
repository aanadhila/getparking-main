<?php

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/CarExit.php";

use PHPUnit\Framework\TestCase;

final class CarExitTest extends TestCase
{
    public function testSuccessExitCar(): void
    {
        $entryCar = new CarExit();
        $test = $entryCar->insertData("N 1337 T");

        $this->assertTrue($test);
    }
}
