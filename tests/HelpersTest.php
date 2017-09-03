<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Parser/Helpers.php
 */
final class HelpersTest extends TestCase
{
    public function testCanParseFileToArray()
    {
        $filename = __DIR__.'/samples/sample.txt';
        $this->assertEquals('f4b97eb814ae7231fcef090f82ec59ac', md5_file($filename));
        $array = parseFileToArray($filename);

        $this->assertCount(6, $array);
    }

    public function testCanParseStringToArray()
    {
        $filename = __DIR__.'/samples/sample.txt';
        $this->assertEquals('f4b97eb814ae7231fcef090f82ec59ac', md5_file($filename));
        $text = file_get_contents($filename);
        $array = parseStringToArray($text);

        $this->assertCount(6, $array);
    }

    public function testCanParseFdToArray()
    {
        $filename = __DIR__.'/samples/sample.txt';
        $this->assertEquals('f4b97eb814ae7231fcef090f82ec59ac', md5_file($filename));
        $fd = fopen('php://temp', 'r+b');
        fwrite($fd, file_get_contents($filename));
        fseek($fd, 0);
        $array = parseFdToArray($fd);

        $this->assertCount(6, $array);
    }
}
