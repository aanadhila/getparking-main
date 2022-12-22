<?php

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/EntryCar.php";

use PHPUnit\Framework\TestCase;

final class EntryCarTest extends TestCase
{
    public function testPageCanLoadValidData(): void
    {
        $entryCar = new EntryCar();
        $test = $entryCar->ensureDataIsLoaded();

        $this->assertTrue(is_array($test));
    }

    public function testPlatNomorInputCannotBeEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $entryCar = new EntryCar();
        $entryCar->insertData(null, "sedan");
    }

    public function testJenisKendaraanInputCannotBeEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $entryCar = new EntryCar();
        $entryCar->insertData("N 1337 T", null);
    }

    public function testSuccessInsertCar()
    {
        $entryCar = new EntryCar();
        $insert = $entryCar->insertData("N 1337 T", "sedan");

        $this->assertTrue($insert);
    }

    public function testInsertCarMustBeUnique()
    {
        $this->expectException(InvalidArgumentException::class);
        $entryCar = new EntryCar();
        $entryCar->insertData("N 1337 T", "sedan");
    }
}
