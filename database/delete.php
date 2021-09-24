<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM movie WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Pelicula Eliminada Exitosamente';
    $_SESSION['message_type'] = 'danger';

    header("Location: ../visualizar.php");
}

?>