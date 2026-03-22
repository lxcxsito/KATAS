<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../Agenda.php";
require_once __DIR__ . "/../Contacte.php";

class AgendaTest extends TestCase {

    public function testAddContact() {
        $agenda = new Agenda();
        $contacte = new Contacte(1, "Lucas", "Martinez", "123456789", "Carrer Falsa 123");

        $agenda->addContact($contacte);

        $this->assertCount(1, $agenda->getContacts());
        $this->assertSame($contacte, $agenda->getContacts()[0]);
    }

    public function testDeleteContactById() {
        $agenda = new Agenda();
        $c1 = new Contacte(1, "Lucas", "Martinez", "123456789", "Carrer Falsa 123");
        $c2 = new Contacte(2, "Ana", "Gomez", "987654321", "Avinguda Verda 456");

        $agenda->addContact($c1);
        $agenda->addContact($c2);

        $agenda->deleteContactById(1);

        $this->assertCount(1, $agenda->getContacts());
        $this->assertEquals(2, $agenda->getContacts()[0]->getId());
    }

    public function testFindByName() {
        $agenda = new Agenda();
        $agenda->addContact(new Contacte(1, "Lucas", "Martinez", "123456789", "Carrer Falsa 123"));
        $agenda->addContact(new Contacte(2, "Lucia", "Perez", "987654321", "Avinguda Verda 456"));
        $agenda->addContact(new Contacte(3, "Ana", "Gomez", "555555555", "Carrer Nou 12"));

        $result = $agenda->findByName("Luc");

        $this->assertCount(2, $result);
        $this->assertEquals("Lucas", $result[0]->name);
        $this->assertEquals("Lucia", $result[1]->name);
    }

    public function testSendFileContacteCreatesFile() {
        $agenda = new Agenda();
        $agenda->addContact(new Contacte(1, "Lucas", "Martinez", "123456789", "Carrer Falsa 123"));

        $filename = "test_agenda.json";
        $agenda->sendFileContacte($filename);

        $this->assertFileExists($filename);

        unlink($filename); // cleanup
    }
}