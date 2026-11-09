<?php
/**
 * Biblioteca de funciones - UT3_3 Desarrollo Web en Entorno Servidor
 * 
 * Este archivo contiene todas las funciones requeridas para los ejercicios 1 al 6,
 * documentadas según el estándar PHPDoc y siguiendo buenas prácticas.
 */

/* ==========================================================================
   EJERCICIO 1: Operaciones básicas y excepciones
   ========================================================================== */

/**
 * Suma cinco números enteros y muestra el resultado directamente en pantalla.
 *
 * @param int $n1 Primer número entero
 * @param int $n2 Segundo número entero
 * @param int $n3 Tercer número entero
 * @param int $n4 Cuarto número entero
 * @param int $n5 Quinto número entero
 * @return void No retorna valor (imprime por pantalla)
 */
function sumarCincoNumeros($n1, $n2, $n3, $n4, $n5) {
    // Cálculo de la suma aritmética
    $suma = $n1 + $n2 + $n3 + $n4 + $n5;
    echo "<p class='mb-1'>La suma de los números ($n1, $n2, $n3, $n4, $n5) es: <strong>$suma</strong></p>";
}

/**
 * Realiza la división entre dos de cinco números recibidos, controlando la división por cero con excepciones.
 *
 * @param int $n1 Dividendo
 * @param int $n2 Divisor
 * @param int $n3 Parámetro adicional
 * @param int $n4 Parámetro adicional
 * @param int $n5 Parámetro adicional
 * @return float Resultado de la división ($n1 / $n2)
 * @throws Exception Si el divisor ($n2) es cero
 */
function dividirAleatorios($n1, $n2, $n3, $n4, $n5) {
    // Verificamos si el divisor es 0 para lanzar la excepción
    if ($n2 === 0) {
        throw new Exception("Error matemático: Intento de división entre cero con los valores (\$n1=$n1, \$n2=$n2).");
    }
    return $n1 / $n2;
}

/**
 * Calcula el volumen de un cilindro a partir del radio de su base y su altura.
 *
 * @param float $radio Radio de la base del cilindro (en unidades métricas)
 * @param float $altura Altura del cilindro (en unidades métricas)
 * @return float Volumen calculado del cilindro
 */
function calcularVolumenCilindro($radio, $altura) {
    $numeroPi = 3.1416;
    // Fórmula: Volumen = Pi * radio^2 * altura
    return $numeroPi * ($radio * $radio) * $altura;
}


/* ==========================================================================
   EJERCICIO 2: Inicialización y visualización de arrays
   ========================================================================== */

/**
 * Inicializa y devuelve un array con números enteros aleatorios dentro de un rango.
 *
 * @param int $numero_de_elementos Cantidad de elementos que contendrá el array
 * @param int $min Valor mínimo inclusivo
 * @param int $max Valor máximo inclusivo
 * @return array Array generado con números aleatorios
 */
function inicializar_array($numero_de_elementos, $min, $max) {
    $array = [];
    for ($i = 0; $i < $numero_de_elementos; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

/**
 * Muestra el contenido de un array en una línea legible.
 *
 * @param array $array Array a visualizar
 * @return void
 */
function mostrar_array($array) {
    echo "<code>[" . implode(", ", $array) . "]</code>";
}


/* ==========================================================================
   EJERCICIO 3: Cálculo de la media
   ========================================================================== */

/**
 * Calcula la media aritmética de los valores contenidos en un array.
 *
 * @param array $array Array numérico
 * @return float Media de los valores (o 0 si está vacío)
 */
function calcular_media($array) {
    $totalElementos = count($array);
    if ($totalElementos === 0) {
        return 0.0;
    }
    $sumaTotal = array_sum($array);
    return $sumaTotal / $totalElementos;
}


/* ==========================================================================
   EJERCICIO 4: Valor máximo
   ========================================================================== */

/**
 * Obtiene el valor numérico máximo de un array.
 *
 * @param array $array Array numérico
 * @return mixed Valor máximo encontrado o null si está vacío
 */
function calcular_maximo($array) {
    if (empty($array)) {
        return null;
    }
    return max($array);
}


/* ==========================================================================
   EJERCICIO 5: Valor mínimo
   ========================================================================== */

/**
 * Obtiene el valor numérico mínimo de un array.
 *
 * @param array $array Array numérico
 * @return mixed Valor mínimo encontrado o null si está vacío
 */
function calcular_minimo($array) {
    if (empty($array)) {
        return null;
    }
    return min($array);
}


/* ==========================================================================
   EJERCICIO 6: Imprimir array en tabla HTML de 2 columnas
   ========================================================================== */

/**
 * Imprime el contenido de un array en una tabla HTML de dos columnas (Posición y Valor).
 *
 * @param array $array Array a representar
 * @return void
 */
function imprimir_array($array) {
    echo "<table class='table table-bordered table-striped table-hover table-sm w-auto'>";
    echo "<thead class='table-dark'><tr><th scope='col'>Posición (Índice)</th><th scope='col'>Valor</th></tr></thead>";
    echo "<tbody>";
    foreach ($array as $indice => $valor) {
        echo "<tr><td class='text-center'>$indice</td><td class='text-center fw-bold'>$valor</td></tr>";
    }
    echo "</tbody></table>";
}


/* ==========================================================================
   EJERCICIO 7: Funciones auxiliares para N máximos y N mínimos
   ========================================================================== */

/**
 * Obtiene los N valores más altos de un array.
 *
 * @param array $array Array numérico
 * @param int $cantidad Número de elementos máximos a extraer (por defecto 3)
 * @return array Sub-array con los N máximos ordenados de mayor a menor
 */
function obtener_n_maximos($array, $cantidad = 3) {
    $copia = $array;
    rsort($copia); // Ordena de mayor a menor
    return array_slice($copia, 0, $cantidad);
}

/**
 * Obtiene los N valores más bajos de un array.
 *
 * @param array $array Array numérico
 * @param int $cantidad Número de elementos mínimos a extraer (por defecto 3)
 * @return array Sub-array con los N mínimos ordenados de menor a mayor
 */
function obtener_n_minimos($array, $cantidad = 3) {
    $copia = $array;
    sort($copia); // Ordena de menor a mayor
    return array_slice($copia, 0, $cantidad);
}


/* ==========================================================================
   EJERCICIO 9: Funciones con validaciones estrictas y excepciones
   ========================================================================== */

/**
 * Suma dos valores tras comprobar que ambos son numéricos.
 *
 * @param mixed $num1 Primer sumando
 * @param mixed $num2 Segundo sumando
 * @return float|int Suma de ambos números
 * @throws Exception Si alguno de los dos valores no es numérico
 */
function sumar($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        throw new Exception("Los valores a sumar tienen que ser numéricos");
    }
    return $num1 + $num2;
}

/**
 * Divide dos números verificando que sean numéricos y que el divisor no sea 0.
 *
 * @param mixed $dividendo Número a dividir
 * @param mixed $divisor Número por el que se divide
 * @return float Resultado de la división
 * @throws Exception Si los valores no son numéricos o si el divisor es 0
 */
function dividir($dividendo, $divisor) {
    if (!is_numeric($dividendo) || !is_numeric($divisor) || $divisor == 0) {
        throw new Exception("Los valores para la división deben ser numéricos y el divisor no puede ser cero");
    }
    return $dividendo / $divisor;
}

/**
 * Calcula el área de un triángulo (base * altura / 2) tras validar que sean valores numéricos y estrictamente positivos.
 *
 * @param mixed $base Longitud de la base
 * @param mixed $altura Longitud de la altura
 * @return float Área calculada del triángulo
 * @throws Exception Si los valores no son numéricos o son <= 0
 */
function calcularAreaTriangulo($base, $altura) {
    if (!is_numeric($base) || !is_numeric($altura) || $base <= 0 || $altura <= 0) {
        throw new Exception("La base y la altura deben ser valores numéricos y estrictamente positivos");
    }
    return ($base * $altura) / 2;
}
?>
