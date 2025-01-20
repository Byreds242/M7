<?php

class Animal {
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

    // Mètode públic per mostrar informació
    public function mostrarInformacio() {
        echo "<p>Nom: " . $this->nom . "</p>";
        echo "<p>Espècie: " . $this->especie . "</p>";
        echo "<p>Edat: " . $this->edat . " anys</p>";
        echo "<p>Disponibilitat: " . $this->esDisponible() . "</p>";
        echo "<hr>";
    }
}

// Creació d'objectes de la classe Animal
$animal1 = new Animal("Luna", "gos", 3);
$animal2 = new Animal("Mimi", "gat", 2);

// Mostrar informació dels animals
$animal1->mostrarInformacio();
$animal2->mostrarInformacio();

//======================================================================================
// EJECRICIO 2

class Llibre {
    // Propietats privades
    private $titol;
    private $autor;
    private $anyPublicacio;

    // Propietat pública per l'estat del llibre
    public $estat;

    // Constructor per inicialitzar les propietats
    public function __construct($titol, $autor, $anyPublicacio) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->estat = "disponible"; // Per defecte, el llibre està disponible
    }

    // Getters
    public function getTitol() {
        return $this->titol;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getAnyPublicacio() {
        return $this->anyPublicacio;
    }

    // Setters
    public function setTitol($titol) {
        $this->titol = $titol;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setAnyPublicacio($anyPublicacio) {
        $this->anyPublicacio = $anyPublicacio;
    }

    // Mètode per prestar el llibre
    public function prestarLlibre() {
        $this->estat = "prestat";
    }

    // Mètode per retornar el llibre
    public function retornarLlibre() {
        $this->estat = "disponible";
    }

    // Mètode per mostrar informació del llibre
    public function mostrarInformacio() {
        echo "<p>Títol: " . $this->titol . "</p>";
        echo "<p>Autor: " . $this->autor . "</p>";
        echo "<p>Any de publicació: " . $this->anyPublicacio . "</p>";
        echo "<p>Estat: " . $this->estat . "</p>";
        echo "<hr>";
    }
}

// Creació d'objectes de la classe Llibre
$llibre1 = new Llibre("1984", "George Orwell", 1949);
$llibre2 = new Llibre("El Petit Príncep", "Antoine de Saint-Exupéry", 1943);

// Prestar el llibre "1984"
$llibre1->prestarLlibre();

// Mostrar informació dels llibres
$llibre1->mostrarInformacio();
$llibre2->mostrarInformacio();


//======================================================================================
// EJECRICIO 3
class Empleat {
    // Propietats privades
    private $nom;
    private $carrec;
    private $salariMensual;

    // Constructor per inicialitzar les propietats
    public function __construct($nom, $carrec, $salariMensual) {
        $this->nom = $nom;
        $this->carrec = $carrec;
        $this->salariMensual = $salariMensual;
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getCarrec() {
        return $this->carrec;
    }

    public function getSalariMensual() {
        return $this->salariMensual;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setCarrec($carrec) {
        $this->carrec = $carrec;
    }

    public function setSalariMensual($salariMensual) {
        $this->salariMensual = $salariMensual;
    }

    // Mètode per calcular el salari anual
    public function calcularSalariAnual() {
        return $this->salariMensual * 12;
    }

    // Mètode per mostrar informació de l'empleat
    public function mostrarInformacio() {
        echo "<p>Nom: " . $this->nom . "</p>";
        echo "<p>Càrrec: " . $this->carrec . "</p>";
        echo "<p>Salari Mensual: " . $this->salariMensual . " €</p>";
        echo "<p>Salari Anual: " . $this->calcularSalariAnual() . " €</p>";
        echo "<hr>";
    }
}

// Creació d'objectes de la classe Empleat
$empleat1 = new Empleat("Joan", "programador", 2000);
$empleat2 = new Empleat("Maria", "dissenyadora gràfica", 2500);

// Mostrar informació dels empleats
$empleat1->mostrarInformacio();
$empleat2->mostrarInformacio();

// Modificar el salari de Joan
$empleat1->setSalariMensual(2200);

// Mostrar informació actualitzada de Joan
$empleat1->mostrarInformacio();


?>
