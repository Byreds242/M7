<?php

// Classe abstracta Animal
abstract class Animal {
    // Propietats privades
    private $nom;
    private $especie;
    private $edat;
    private $disponible;

    // Constructor per inicialitzar les propietats
    public function __construct($nom, $especie, $edat) {
        $this->nom = $nom;
        $this->especie = $especie;
        $this->edat = $edat;
        $this->disponible = true; // Per defecte, disponible per adopció
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getEspecie() {
        return $this->especie;
    }

    public function getEdat() {
        return $this->edat;
    }

    public function getDisponible() {
        return $this->disponible;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function setEdat($edat) {
        $this->edat = $edat;
    }

    public function setDisponible($disponible) {
        $this->disponible = $disponible;
    }

    // Mètode públic per comprovar si està disponible
    public function esDisponible() {
        return $this->disponible ? "Disponible" : "No disponible";
    }

    // Mètode abstracte que haurà d’implementar-se a les subclasses
    abstract public function ferSo();

    // Mètode públic per mostrar informació
    public function mostrarInformacio() {
        echo "<p>Nom: " . $this->nom . "</p>";
        echo "<p>Espècie: " . $this->especie . "</p>";
        echo "<p>Edat: " . $this->edat . " anys</p>";
        echo "<p>Disponibilitat: " . $this->esDisponible() . "</p>";
        echo "<p>So: " . $this->ferSo() . "</p>";
        echo "<hr>";
    }
}

// Classe Gos que hereta de Animal
class Gos extends Animal {
    public function __construct($nom, $edat) {
        parent::__construct($nom, "gos", $edat);
    }

    // Implementació del mètode ferSo
    public function ferSo() {
        return "Guau!";
    }
}

// Classe Gat que hereta de Animal
class Gat extends Animal {
    public function __construct($nom, $edat) {
        parent::__construct($nom, "gat", $edat);
    }

    // Implementació del mètode ferSo
    public function ferSo() {
        return "Miau!";
    }
}

// Exemple d’ús
$animal1 = new Gos("Luna", 3);
$animal2 = new Gat("Mimi", 2);

// Mostrar informació dels animals
$animal1->mostrarInformacio();
$animal2->mostrarInformacio();
