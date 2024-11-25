<?php
// EJERCICIO 1 
echo "EXERCICI 1" . "<br>";

// VARIABLES
$text = "Estem aprenent PHP";

// 1. mosytramos el texto al reves
echo "TEXTO AL REVES: " . strrev($text) . "<br>";

// 2. utilizamos substr para mostrar solo las palabras "aprenent PHP"
echo "SOLO MOSTRAR 'aprenent PHP': " . substr($text, 6) . "<br>";

// 3. sustituimos la palabra "PHP" por "programació" 
$newText = str_replace("PHP", "programació", $text);
echo "CAMBIAR 'PHP' POR 'PROGRAMACIO': " . $newText . "<br><br>";

//================================================================================
// EJERCICIO 2 
echo "EXERCICI 2" . "<br>";

// VARIABLES
$a = 15;
$b = 4;

// 1. multiplica A per B y guarda el resultado en una nueva variable C
$c = $a * $b;
echo "Multiplicacion de A por B (c = a * b): " . $c . "<br>";

// 2. incrementa C en el valor de B
$c += $b;
echo "Incrementar C en el valor de B (c += b): " . $c . "<br>";

// 3. divide C por B y guarda el resultado a D
$d = $c / $b;
echo "Dividir C por B (d = c / b): " . $d . "<br>";

// 4. comprobar si D es mayor o igual a 10
if ($d >= 10) {
    echo "El valor D es mayor o igual a 10.<br>";
} else {
    echo "El valor D es menor de 10.<br>";
}

//================================================================================
// EJERCICIO 3
echo "<br>EXERCICI 3" . "<br>";

// declaramos un array asociativo llamado alumne
$alumne = array(
    "nom" => "Anna",
    "edat" => 20,
    "nota" => 8.5
);

// 1. muestra el valor de la clave "nom"
echo "Nombre del alumno: " . $alumne["nom"] . "<br>";

// 2. añade una nueva clave "curs" con el valor "DAW"
$alumne["curs"] = "DAW";
echo "Añadir curso: " . $alumne["curs"] . "<br>";

// 3. muestra el total de elementos que tiene el array
echo "Nombre total d'elements a l'array alumne: " . count($alumne) . "<br>";

// 4. sustituye el valor 20 de la clave “edat” por el valor 18
$alumne["edat"] = 18;
echo "Nueva edad del alumno: " . $alumne["edat"] . "<br>";
?>
