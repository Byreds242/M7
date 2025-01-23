<?php
// EJERCICIO 1
// Calculadora con argumentos y valores de retorno
function calculadora($num1, $num2, $operacio) {
    switch ($operacio) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            // Verifica si el divisor es cero
            if ($num2 == 0) {
                return "Error: No se puede dividir por cero.";
            } else {
                return $num1 / $num2;
            }
        default:
            // Caso para operaciones no válidas
            return "Operación no válida.";
    }
}

// Ejemplo de la calculadora
echo "<h2>Ejercicio 1: Calculadora</h2>";
echo "10 + 5 = " . calculadora(10, 5, '+') . "<br>";
echo "10 / 0 = " . calculadora(10, 0, '/') . "<br>";

//=======================================================================================
// EJERCICIO 2
// Funcion para generar estadisticas de un array
function estadistiques($array) {
    // Calcula la suma de los elementos del array
    $suma = array_sum($array);
    // Encuentra el valor máximo en el array
    $maxim = max($array);
    // Encuentra el valor mínimo en el array
    $minim = min($array);
    // Calcula la media (promedio)
    $mitjana = $suma / count($array);
    
    return [
        'Suma' => $suma,
        'Valor máximo' => $maxim,
        'Valor mínimo' => $minim,
        'Media' => $mitjana
    ];
}

// Ejemplo de estadisticas
echo "<h2>Ejercicio 2: Estadísticas de Array</h2>";
$valors = [10, 20, 30, 40, 50];
$estadistiques = estadistiques($valors);

// Mostrar resultados de las estadísticas en una tabla HTML
echo "<table border='1'>
        <tr><th>Estadística</th><th>Valor</th></tr>";
foreach ($estadistiques as $estat => $valor) {
    echo "<tr><td>$estat</td><td>$valor</td></tr>";
}
echo "</table>";

//=======================================================================================
// EJERCICIO 3
// Simulacion de funciones dinamicas
function salutacio() {
    return "¡Hola! Bienvenido a nuestro sitio web.";
}

function dataActual() {
    // Devuelve la fecha y hora actuales
    return date('Y-m-d H:i');
}

function randomNumber() {
    // Genera un número aleatorio entre 1 y 100
    return rand(1, 100);
}

// EJERCICIO 3
// Ejemplo de uso del Ejercicio 3: Funciones Dinámicas
echo "<h2>Ejercicio 3: Funciones Dinámicas</h2>";
$accio = 'randomNumber'; // Puede cambiar a 'salutacio' o 'dataActual'

// Ejecutar función dinámica
if (function_exists($accio)) {
    echo $accio(); // Ejecuta la función seleccionada
} else {
    echo "Acción no válida.";
}
?>
