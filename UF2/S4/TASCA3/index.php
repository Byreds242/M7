<?php

// Classe base Empleat
class Empleat {
    protected $nom;
    protected $carrec;
    protected $salariMensual;

    // Constructor
    public function __construct($nom, $carrec, $salariMensual) {
        $this->nom = $nom;
        $this->carrec = $carrec;
        $this->salariMensual = $salariMensual;
    }

    // Mètode per mostrar informació de l'empleat
    public function mostrarInformacio() {
        $info = "Nom: {$this->nom}<br>";
        $info .= "Càrrec: {$this->carrec}<br>";
        $info .= "Salari mensual: {$this->salariMensual}€<br>";
        return $info;
    }

    // Mètode final per calcular el salari anual
    public final function calcularSalariAnual() {
        return $this->salariMensual * 12;
    }
}

// Classe EmpleatFix que hereta d'Empleat
class EmpleatFix extends Empleat {
    private $beneficis;

    // Constructor
    public function __construct($nom, $carrec, $salariMensual, $beneficis) {
        parent::__construct($nom, $carrec, $salariMensual);
        $this->beneficis = $beneficis;
    }

    // Sobreescriure el mètode mostrarInformacio
    public function mostrarInformacio() {
        $info = parent::mostrarInformacio();
        $info .= "Beneficis: {$this->beneficis}<br>";
        return $info;
    }
}

// Classe EmpleatTemporal que hereta d'Empleat
class EmpleatTemporal extends Empleat {
    private $contracteDurada;

    // Constructor
    public function __construct($nom, $carrec, $salariMensual, $contracteDurada) {
        parent::__construct($nom, $carrec, $salariMensual);
        $this->contracteDurada = $contracteDurada;
    }

    // Sobreescriure el mètode mostrarInformacio
    public function mostrarInformacio() {
        $info = parent::mostrarInformacio();
        $info .= "Durada del contracte: {$this->contracteDurada} mesos<br>";
        return $info;
    }
}

// Exemple d’ús
// Crear un objecte EmpleatFix
$empleatFix = new EmpleatFix("Joan", "Programador", 2000, "Assegurança mèdica");

// Crear un objecte EmpleatTemporal
$empleatTemporal = new EmpleatTemporal("Maria", "Dissenyadora gràfica", 2500, 6);

// Mostrar informació dels empleats
echo $empleatFix->mostrarInformacio();
echo "Salari anual: " . $empleatFix->calcularSalariAnual() . "€<br><br>";

echo $empleatTemporal->mostrarInformacio();
echo "Salari anual: " . $empleatTemporal->calcularSalariAnual() . "€<br>";
