<?php
require "conexion.php";
// Valores iniciales del formulario (vacíos)
$titulo = "";
$autor = "";
$anio = "";
$genero = "";
$leido = false;
$errores = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1) RECOGER los datos del formulario
    $titulo = trim($_POST["titulo"] ?? "");
    $autor = trim($_POST["autor"] ?? "");
    $anio = trim($_POST["anio"] ?? "");
    $genero = $_POST["genero"] ?? "";
    $leido = isset($_POST["leido"]); // un checkbox solo se envía si está marcado
// 2) VALIDAR
    if ($titulo === "") {
        $errores[] = "El título es obligatorio.";
    }
    if ($autor === "") {
        $errores[] = "El autor es obligatorio.";
    }
    if (!ctype_digit($anio) || (int) $anio < 1000 || (int) $anio > (int) date("Y")) {
        $errores[] = "El año tiene que ser un número entre 1000 y " . date("Y") . ".";
    }
    if (!in_array($genero, $generos)) {
        $errores[] = "Elige un género de la lista.";
    }
    // 3) Si no hay errores, GUARDAR en la base de datos
    if (count($errores) === 0) {
        $sql = "INSERT INTO libros (titulo, autor, anio, genero, leido) VALUES (:titulo, :autor, :anio, :genero, :leido)";
        $consulta = $pdo->prepare($sql);
        $consulta->execute([
            ":titulo" => $titulo,
            ":autor" => $autor,
            ":anio" => (int) $anio,
            ":genero" => $genero,
            ":leido" => $leido ? 1 : 0
        ]);
        // 4) Volver al listado con un mensaje
        header("Location: index.php?ok=creado");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir libro</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Añadir libro</h1>
    <?php foreach ($errores as $error): ?>
        <p class="error"><?= $error ?></p>
    <?php endforeach; ?>
    <form action="" method="post" class="ficha">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>">
        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($autor) ?>">
        <label for="anio">Año de publicación</label>
        <input type="text" id="anio" name="anio" value="<?= htmlspecialchars($anio) ?>">
        <label for="genero">Género</label>
        <select id="genero" name="genero">
            <option value="">-- Elige uno --</option>
            <?php foreach ($generos as $g): ?>
                <option value="<?= $g ?>" <?= $g === $genero ? "selected" : "" ?>>
                    <?= $g ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>
            <input type="checkbox" name="leido" <?= $leido ? "checked" : "" ?>>
            Ya lo he leído
        </label>
        <button type="submit">Guardar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>

</html>