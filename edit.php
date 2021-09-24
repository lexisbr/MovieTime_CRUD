<?php
include("database/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM movie WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['name'];
        $year = $row['year'];
        $director = $row['director'];
        $category = $row['category'];
        $rating = $row['rating'];
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $director = $_POST['director'];
        $category = $_POST['category'];
        $rating = $_POST['rating'];

        $query = "UPDATE movie set name = '$title', year = '$year', director = '$director', 
        category = '$category', rating = '$rating' WHERE id = '$id' ";

        mysqli_query($conn, $query);


        $_SESSION['message1'] = 'Pelicula Actualizada Exitosamente';
        $_SESSION['message_type1'] = 'success';
        header("Location: visualizar.php");
    }
}
?>

<?php include("includes/header.php") ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert-<?= $_SESSION['message_type'] ?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?= $_SESSION['message'] ?>
    </div>
<?php session_unset();
} ?>
<div class="box2">
    <form class="form-horizontal" action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <h1 class="title2">Edita la pelicula.</h1><br>
        <div class="input-group">
            <span class="input-group-addon">Titulo</span>
            <input id="title" type="text" class="form-control" name="title" value="<?php echo $title ?>" required autofocus>
        </div><br>
        <div class="input-group">
            <span class="input-group-addon">Año</span>
            <input id="year" type="number" min="0" step="1" class="form-control" name="year" value="<?php echo $year ?>" required>
        </div><br>
        <div class="input-group">
            <span class="input-group-addon">Director</span>
            <input id="title" type="text" class="form-control" name="director" value="<?php echo $director ?>" required>
        </div><br>
        <select class="form-control" id="sel1" name="category" required>
            <?php

            $categorias  = [
                0 => "Terror",
                1 => "Comedia",
                2 => "Drama",
                3 => "Accion",
                4 => "Sci-fi",
            ];

            $count = count($categorias);

            for ($i = 0; $i < $count; $i++) {
                if ($categorias[$i] == $category) {
                    $aux = $categorias[0];
                    $categorias[0] = $categorias[$i];
                    $categorias[$i] = $aux;
                }
            }

            for ($i = 0; $i < $count; $i++) { ?>
                <option value="<?php echo $categorias[$i] ?>"><?php echo $categorias[$i] ?></option>
            <?php } ?>
        </select>
        <h3>Califica la pelicula.</h3>
        <div class="calificar">
            <?php
            $checked1  = "";
            $checked2  = "";
            $checked3  = "";
            $checked4  = "";
            $checked5  = "";

            if ($rating == "1 Estrella") {
                $checked1  = "checked";
            } else if ($rating == "2 Estrellas") {
                $checked2  = "checked";
            } else if ($rating == "3 Estrellas") {
                $checked3  = "checked";
            } else if ($rating == "4 Estrellas") {
                $checked4  = "checked";
            } else if ($rating == "5 Estrellas") {
                $checked5  = "checked";
            }

            ?>
            <label class="radio-inline"><input type="radio" name="rating" value="1 Estrella" <?php echo $checked1; ?>>1 Estrella</label>
            <label class="radio-inline"><input type="radio" name="rating" value="2 Estrellas" <?php echo $checked2; ?>>2 Estrellas</label>
            <label class="radio-inline"><input type="radio" name="rating" value="3 Estrellas" <?php echo $checked3; ?>>3 Estrellas</label>
            <label class="radio-inline"><input type="radio" name="rating" value="4 Estrellas" <?php echo $checked4; ?>>4 Estrellas</label>
            <label class="radio-inline"><input type="radio" name="rating" value="5 Estrellas" <?php echo $checked5; ?>>5 Estrellas</label>
        </div><br>
        <div class="submit">
            <input type="submit" name="update" class="btn btn-info" value="Actualizar">
        </div>
    </form>
</div>

<?php include("includes/footer.php") ?>