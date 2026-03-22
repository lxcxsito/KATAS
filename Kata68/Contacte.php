<?php
// Contacte.php
class Contacte {

    private int $id;
    public string $name;
    public string $cognoms;
    public string $tlf;
    public string $adressa;

    public function __construct(int $id, string $name, string $cognoms, string $tlf, string $adressa) {
        $this->id = $id;
        $this->name = $name;
        $this->cognoms = $cognoms;
        $this->tlf = $tlf;
        $this->adressa = $adressa;
    }

    public function getId(): int {
        return $this->id;
    }
}