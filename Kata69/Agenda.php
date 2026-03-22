<?php
// Agenda.php
require_once "Contacte.php";

class Agenda {

    private array $contacts = [];

    public function addContact(Contacte $contacte): void {
        $this->contacts[] = $contacte;
    }

    public function deleteContactById(int $id): void {
        $this->contacts = array_filter($this->contacts, function($contact) use ($id) {
            return $contact->getId() !== $id;
        });
        $this->contacts = array_values($this->contacts);
    }

    public function getContacts(): array {
        return $this->contacts;
    }

    public function findByName(string $name): array {
        return array_values(array_filter($this->contacts, function($contact) use ($name) {
            return stripos($contact->name, $name) !== false;
        }));
    }

    public function __toString(): string {
        return json_encode($this->contacts);
    }

    public function sendFileContacte(string $filename = "agenda.json"): void {
        $file = fopen($filename, "w+");
        fwrite($file, json_encode($this->contacts));
        fclose($file);
    }
}