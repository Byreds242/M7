<?php

// Interfície GestioLlibre
interface GestioLlibre {
    public function mostrarInformacio();
    public function esPrestat();
}

// Classe Llibre que implementa GestioLlibre
class Llibre implements GestioLlibre {
    private $titol;
    private $autor;
    private $anyPublicacio;
    private $estat; // Indica si està prestat o no

    // Constructor
    public function __construct($titol, $autor, $anyPublicacio) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->estat = false; // Per defecte, no està prestat
    }

    // Mètode per mostrar informació del llibre
    public function mostrarInformacio() {
        $info = "Títol: {$this->titol}<br>";
        $info .= "Autor: {$this->autor}<br>";
        $info .= "Any de publicació: {$this->anyPublicacio}<br>";
        $info .= "Estat: " . ($this->estat ? "Prestat" : "Disponible") . "<br>";
        return $info;
    }

    // Mètode per comprovar si el llibre està prestat
    public function esPrestat() {
        return $this->estat;
    }

    // Mètode per prestar el llibre
    public function presta() {
        if (!$this->estat) {
            $this->estat = true;
        } else {
            echo "Aquest llibre ja està prestat.<br>";
        }
    }

    // Mètode per retornar el llibre
    public function retorna() {
        if ($this->estat) {
            $this->estat = false;
        } else {
            echo "Aquest llibre no està prestat.<br>";
        }
    }
}

// Classe LlibreDigital que implementa GestioLlibre
class LlibreDigital implements GestioLlibre {
    private $titol;
    private $autor;
    private $anyPublicacio;
    private $estat; // Indica si està prestat o no
    private $format; // Format del llibre digital, com PDF o EPUB

    // Constructor
    public function __construct($titol, $autor, $anyPublicacio, $format) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->estat = false; // Per defecte, no està prestat
        $this->format = $format;
    }

    // Mètode per mostrar informació del llibre digital
    public function mostrarInformacio() {
        $info = "Títol: {$this->titol}<br>";
        $info .= "Autor: {$this->autor}<br>";
        $info .= "Any de publicació: {$this->anyPublicacio}<br>";
        $info .= "Format: {$this->format}<br>";
        $info .= "Estat: " . ($this->estat ? "Prestat" : "Disponible") . "<br>";
        return $info;
    }

    // Mètode per comprovar si el llibre està prestat
    public function esPrestat() {
        return $this->estat;
    }

    // Mètode per prestar el llibre digital
    public function presta() {
        if (!$this->estat) {
            $this->estat = true;
        } else {
            echo "Aquest llibre digital ja està prestat.<br>";
        }
    }

    // Mètode per retornar el llibre digital
    public function retorna() {
        if ($this->estat) {
            $this->estat = false;
        } else {
            echo "Aquest llibre digital no està prestat.<br>";
        }
    }
}

// Exemple d’ús
// Crear un llibre físic
$llibreFisic = new Llibre("1984", "George Orwell", 1949);

// Crear un llibre digital
$llibreDigital = new LlibreDigital("El Petit Príncep", "Antoine de Saint-Exupéry", 1943, "PDF");

// Prestar el llibre físic
$llibreFisic->presta();

// Mostrar informació de tots dos llibres
echo $llibreFisic->mostrarInformacio();
echo $llibreDigital->mostrarInformacio();
