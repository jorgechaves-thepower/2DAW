<?php
require "conexion.php";
// Solo se borra si la petición llega por POST (desde el botón Borrar del listado)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}
$id = (int) ($_POST["id"] ?? 0);
// DELETE: borra la fila. Sin WHERE se borraría la tabla ENTERA.
$consulta = $pdo->prepare("DELETE FROM libros WHERE id = :id");
$consulta->execute([":id" => $id]);
// rowCount() dice cuántas filas se han borrado (0 si ese id no existía)
if ($consulta->rowCount() === 0) {
    header("Location: index.php?ok=noexiste");
} else {
    header("Location: index.php?ok=borrado");
}
exit;