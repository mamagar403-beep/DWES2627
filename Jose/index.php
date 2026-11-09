<?php
require_once __DIR__ . '/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UT3_3: Funciones y Excepciones - DWES</title>
    <!-- Bootstrap 5 CSS para pestañas modernas y responsivas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8fafc; font-family: system-ui, -apple-system, sans-serif; }
        .card { border-radius: 10px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); margin-top: 20px; }
        .tab-pane { padding: 25px 15px; }
        .nav-tabs .nav-link { font-weight: 500; color: #475569; }
        .nav-tabs .nav-link.active { font-weight: 700; color: #0284c7; }
        pre { background: #0f172a; color: #38bdf8; padding: 12px; border-radius: 6px; }
    </style>
</head>
<body class="container py-4">

    <header class="mb-4 text-center">
        <h1 class="display-6 fw-bold text-primary">DWES - Unidad de Trabajo 3: Funciones y Excepciones</h1>
        <p class="text-secondary">Entrega completa de ejercicios organizados por pestañas (Tabs)</p>
    </header>

    <div class="card p-3">
        <!-- Barra de Pestañas (Nav Tabs) -->
        <ul class="nav nav-tabs" id="ejerciciosTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="ej1-tab" data-bs-toggle="tab" data-bs-target="#ej1" type="button" role="tab">Ejercicio 1</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ej2_6-tab" data-bs-toggle="tab" data-bs-target="#ej2_6" type="button" role="tab">Ejercicios 2 al 6 (Arrays)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ej7-tab" data-bs-toggle="tab" data-bs-target="#ej7" type="button" role="tab">Ejercicio 7 (Obligatorio)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ej8-tab" data-bs-toggle="tab" data-bs-target="#ej8" type="button" role="tab">Ejercicio 8 (Temas)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ej9-tab" data-bs-toggle="tab" data-bs-target="#ej9" type="button" role="tab">Ejercicio 9 (Excepciones)</button>
            </li>
        </ul>

        <!-- Contenido de las Pestañas -->
        <div class="tab-content" id="ejerciciosTabContent">

            <!-- EJERCICIO 1 -->
            <div class="tab-pane fade show active" id="ej1" role="tabpanel">
                <h3 class="h5 text-primary">Ejercicio 1: Funciones Básicas</h3>
                
                <h5 class="mt-3">a) Suma de 5 números (sin retorno)</h5>
                <div class="p-3 bg-light rounded border">
                    <?php sumarCincoNumeros(4, 8, 15, 16, 23); ?>
                </div>

                <h5 class="mt-4">b) División de números aleatorios con control de excepciones</h5>
                <div class="p-3 bg-light rounded border">
                    <?php
                    $a1 = rand(0, 9); $a2 = rand(0, 9); $a3 = rand(0, 9); $a4 = rand(0, 9); $a5 = rand(0, 9);
                    echo "<p>Números generados: ($a1, $a2, $a3, $a4, $a5). Intentando dividir \$a1 / \$a2 ($a1 / $a2):</p>";
                    try {
                        $tmp = dividirAleatorios($a1, $a2, $a3, $a4, $a5);
                        echo "<div class='alert alert-success'>Resultado (\$tmp): <strong>" . number_format($tmp, 4) . "</strong></div>";
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger'>Excepción capturada: <strong>" . $e->getMessage() . "</strong></div>";
                    }
                    ?>
                </div>

                <h5 class="mt-4">c) Volumen de un cilindro</h5>
                <div class="p-3 bg-light rounded border">
                    <?php
                    $radio = 3.5;
                    $altura = 10.0;
                    $volumen = calcularVolumenCilindro($radio, $altura);
                    echo "<p>Radio base: <strong>$radio</strong> | Altura: <strong>$altura</strong></p>";
                    echo "<p>Volumen del cilindro: <strong>" . number_format($volumen, 2) . " unidades cúbicas</strong></p>";
                    ?>
                </div>
            </div>

            <!-- EJERCICIOS 2 AL 6 -->
            <div class="tab-pane fade" id="ej2_6" role="tabpanel">
                <h3 class="h5 text-primary">Ejercicios 2 al 6: Gestión de Arrays</h3>
                <?php
                // Ejercicio 2
                $miArrayDemo = inicializar_array(8, 5, 50);
                ?>
                <p><strong>Ej. 2:</strong> Array inicializado con 8 elementos entre 5 y 50:</p>
                <div class="mb-3"><?php mostrar_array($miArrayDemo); ?></div>

                <p><strong>Ej. 3:</strong> Valor medio del array: <code><?= number_format(calcular_media($miArrayDemo), 2); ?></code></p>
                <p><strong>Ej. 4:</strong> Valor máximo: <code><?= calcular_maximo($miArrayDemo); ?></code></p>
                <p><strong>Ej. 5:</strong> Valor mínimo: <code><?= calcular_minimo($miArrayDemo); ?></code></p>

                <h6 class="mt-3"><strong>Ej. 6:</strong> Representación con <code>imprimir_array()</code>:</h6>
                <?php imprimir_array($miArrayDemo); ?>
            </div>

            <!-- EJERCICIO 7 -->
            <div class="tab-pane fade" id="ej7" role="tabpanel">
                <h3 class="h5 text-primary">Ejercicio 7: Integración con UT3_2</h3>
                <p class="text-muted">Se incluye <code>funciones.php</code> para inicializar un array de 10 elementos (1-30), calcular media, 3 máximos y 3 mínimos.</p>
                
                <?php
                $array7 = inicializar_array(10, 1, 30);
                $media7 = calcular_media($array7);
                $maximos7 = obtener_n_maximos($array7, 3);
                $minimos7 = obtener_n_minimos($array7, 3);
                ?>

                <div class="p-3 bg-light rounded border mb-3">
                    <h6>1 y 2) Array de 10 elementos aleatorios (entre 1 y 30):</h6>
                    <?php imprimir_array($array7); ?>
                </div>

                <ul class="list-group">
                    <li class="list-group-item"><strong>3 y 4) Valor medio:</strong> <?= number_format($media7, 2); ?></li>
                    <li class="list-group-item"><strong>5) Los 3 valores máximos:</strong> <span class="badge bg-success fs-6"><?= implode(", ", $maximos7); ?></span></li>
                    <li class="list-group-item"><strong>6) Los 3 valores mínimos:</strong> <span class="badge bg-warning text-dark fs-6"><?= implode(", ", $minimos7); ?></span></li>
                </ul>
            </div>

            <!-- EJERCICIO 8 -->
            <div class="tab-pane fade" id="ej8" role="tabpanel">
                <h3 class="h5 text-primary">Ejercicio 8: Arquitectura Tema Claro / Tema Oscuro</h3>
                <p>Este ejercicio cuenta con su estructura de carpetas independiente y validada según las especificaciones del cliente:</p>
                <ul>
                    <li><code>public_html/css/temaClaro.css</code> y <code>temaOscuro.css</code></li>
                    <li><code>resources/templates/cabeceraTemaClaro.php</code> y <code>cabeceraTemaOscuro.php</code></li>
                    <li><code>resources/templates/footer.php</code></li>
                </ul>
                <a href="./Ejercicio8_Tema3_3/public_html/index.php" target="_blank" class="btn btn-outline-primary">
                    Abrir Ejercicio 8 en nueva pestaña &rarr;
                </a>
            </div>

            <!-- EJERCICIO 9 -->
            <div class="tab-pane fade" id="ej9" role="tabpanel">
                <h3 class="h5 text-primary">Ejercicio 9: Control Estricto con Excepciones</h3>

                <!-- APARTADO A -->
                <div class="card p-3 mb-3">
                    <h5 class="text-secondary">Apartado A: Función <code>sumar($num1, $num2)</code></h5>
                    
                    <p class="mb-1 text-muted">Caso correcto: <code>sumar(15, 5)</code></p>
                    <?php
                    try {
                        $resSuma = sumar(15, 5);
                        echo "<div class='alert alert-success py-2'>Resultado de la suma: <strong>$resSuma</strong></div>";
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger py-2'>" . $e->getMessage() . "</div>";
                    }
                    ?>

                    <p class="mb-1 text-muted">Caso con error: <code>sumar(15, "texto_invalido")</code></p>
                    <?php
                    try {
                        $resSumaErr = sumar(15, "texto_invalido");
                        echo "<div class='alert alert-success py-2'>Resultado: $resSumaErr</div>";
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger py-2'>Excepción capturada: <strong>" . $e->getMessage() . "</strong></div>";
                    }
                    ?>
                </div>

                <!-- APARTADO B -->
                <div class="card p-3">
                    <h5 class="text-secondary">Apartado B: Funciones <code>dividir()</code> y <code>calcularAreaTriangulo()</code></h5>

                    <h6>1. Operaciones Matemáticas Correctas:</h6>
                    <div class="bg-light p-3 rounded border mb-3">
                        <?php
                        try {
                            $resDiv = dividir(20, 4);
                            echo "<p class='mb-1'>Resultado de la división (20 / 4): <strong>$resDiv</strong></p>";
                        } catch (Exception $e) {
                            echo "<div class='alert alert-danger py-1'>" . $e->getMessage() . "</div>";
                        }

                        try {
                            $resTri = calcularAreaTriangulo(10, 5);
                            echo "<p class='mb-0'>Área del triángulo (base 10, altura 5): <strong>$resTri</strong></p>";
                        } catch (Exception $e) {
                            echo "<div class='alert alert-danger py-1'>" . $e->getMessage() . "</div>";
                        }
                        ?>
                    </div>

                    <h6>2. Demostración de Captura de Excepciones:</h6>
                    <?php
                    // Error en división por cero
                    try {
                        dividir(20, 0);
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger py-2 mb-2'><strong>dividir(20, 0):</strong> " . $e->getMessage() . "</div>";
                    }

                    // Error en área con valor negativo
                    try {
                        calcularAreaTriangulo(-10, 5);
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger py-2 mb-0'><strong>calcularAreaTriangulo(-10, 5):</strong> " . $e->getMessage() . "</div>";
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle JS con Popper para el funcionamiento de las pestañas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
