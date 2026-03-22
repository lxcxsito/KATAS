<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../Contacte.php";

class ContacteTest extends TestCase {

    public function testCreateContact() {
        $contacte = new Contacte(1, "Lucas", "Martinez", "123456789", "Carrer Falsa 123");

        $this->assertEquals(1, $contacte->getId());
        $this->assertEquals("Lucas", $contacte->name);
        $this->assertEquals("Martinez", $contacte->cognoms);
        $this->assertEquals("123456789", $contacte->tlf);
        $this->assertEquals("Carrer Falsa 123", $contacte->adressa);
    }
}