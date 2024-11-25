<?php
// EJERCICIO 1
echo "######## EJERCICIO 1 ########<br>";
$notes = [4, 9, 5, 7, 6, 10, 3, 8, 6, 2];

// VARIABLES
$aprobados = 0;
$suspensos = 0;
$i = 0;

// bucle while para recorrer el array de notas
while ($i < count($notes)) {
    $nota = $notes[$i];  // obtenemos la nota en la posicion $i

    // recuento de aprobados y suspendidos
    if ($nota >= 5) {
        $aprobados++;
    } else {
        $suspensos++;
    }

    

    // determina el comentario segun la nota con switch
    switch (true) {
        case ($nota >= 9):
            $comentario = "Excelente";
            break;
        case ($nota >= 7):
            $comentario = "Notable";
            break;
        case ($nota >= 5):
            $comentario = "Suficiente";
            break;
        default:
            $comentario = "Insuficiente";
            break;
    }

    // mostramos por pantalla las notas y el comentario
    echo "Nota: $nota - $comentario<br>";

    // incrementa el contador
    $i++;
}

// mostramos por pantalla el total de aprobados y suspendidos
echo "-----------------------------------<br>";
echo "Aprobados: $aprobados<br>";
echo "Suspendidos: $suspensos<br><br>";


//=======================================================================================================
// EJERCICIO 2
echo "######## EJERCICIO 2 ########";
$productes = ["Laptop", "Camisa", "Auriculars", "Llibre", "Jaqueta", "Tablet", "Sabates", "Smartphone"];
$preus = [1000, 20, 150, 25, 50, 300, 40, 700];
$categories = ["Electrònica", "Roba", "Electrònica", "Altres", "Roba", "Electrònica", "Altres", "Electrònica"];

// mostramos los resultados en una tabla HTML
echo "<table border='1'>
        <tr>
            <th>Producte</th>
            <th>Preu Original</th>
            <th>Descompte Aplicat</th>
            <th>Preu Final</th>
        </tr>";

for ($j = 0; $j < count($productes); $j++) {
    $preu = $preus[$j];
    $categoria = $categories[$j];
    
    // calculamos el descuento segun la categoria
    switch ($categoria) {
        case "Electrònica":
            $descompte = 0.15; // 15% de de descuento
            break;
        case "Roba":
            $descompte = 0.10; // 10% de descuento
            break;
        case "Altres":
            $descompte = 0.05; // 5% de descuento
            break;
        default:
            $descompte = 0; // sin descuento
    }

    // calculamos el precio final
    $descompteAplicat = $preu * $descompte;
    $preuFinal = $preu - $descompteAplicat;

    // mostramos por pantalla la fila de la tabla
    echo "<tr>
            <td>$productes[$j]</td>
            <td>$preu €</td>
            <td>" . number_format($descompteAplicat, 2) . " €</td>
            <td>" . number_format($preuFinal, 2) . " €</td>
          </tr>";
}

echo "</table><br>";


//=======================================================================================================
// EJERCICIO 3
echo "######## EJERCICIO 3 ########<br>";
$numeros = [3, 8, 17, 22, 6, 11, 2, 5];

// VARIABLES
$sumaParells = 0;
$sumaSenars = 0;
$i = 0;

// bucle while para recorrer el array de numeros
while ($i < count($numeros)) {
    $numero = $numeros[$i];  // obenemos el numero en la posicion $i
    
    // switch para saber si el numero es par o impar y sumarlo
    switch (true) {
        case ($numero % 2 == 0): // par
            $sumaParells += $numero;
            break;
        case ($numero % 2 != 0): // impar
            $sumaSenars += $numero;
            break;
    }

    // incrementamos el contador
    $i++;
}

// mostramos por pantalla la inforacion
echo "Array de numeros: ";
echo implode(", ", $numeros) . "<br>"; // utilizamos implode para poder mostrar la array
echo "Suma de los números pares: $sumaParells<br>";
echo "Suma de los números impares: $sumaSenars";
?>
