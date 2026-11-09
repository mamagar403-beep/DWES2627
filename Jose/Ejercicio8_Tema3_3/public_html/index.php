<?php
// Determinar estilo recibido por GET; por defecto se carga temaClaro
$estilo = (isset($_GET['estilo']) && $_GET['estilo'] === 'temaOscuro') ? 'temaOscuro' : 'temaClaro';

if ($estilo === 'temaOscuro') {
    include __DIR__ . '/../resources/templates/cabeceraTemaOscuro.php';
} else {
    include __DIR__ . '/../resources/templates/cabeceraTemaClaro.php';
}
?>

<main>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum eros suscipit nisl maximus accumsan. Pellentesque non auctor mauris. Cras non lacus feugiat dui ullamcorper pulvinar. Vivamus tincidunt consectetur ex a lacinia. Proin et euismod arcu. Quisque nunc lectus, pellentesque id neque ut, mollis ullamcorper lacus. Maecenas rutrum congue leo, in porttitor lacus euismod a. Maecenas quis eros ac justo faucibus auctor vel non turpis. Nam vehicula nisl sit amet nulla placerat tempus. Nullam erat tortor, ultricies at dolor sit amet, fermentum accumsan nisi. Proin eu elit consectetur, mattis sapien eget, convallis magna. Nulla ornare odio at odio egestas consequat. Aliquam turpis nunc, fringilla ut euismod vitae, blandit at eros. Aenean.</p>
</main>

<?php
include __DIR__ . '/../resources/templates/footer.php';
?>
</body>
</html>
