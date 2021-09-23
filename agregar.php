<?php include("database/db.php") ?>

<?php include("includes/header.php") ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert-<?= $_SESSION['message_type'] ?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?= $_SESSION['message'] ?>
    </div>
<?php session_unset();
} ?>
<div class="box2">
    <form class="form-horizontal" action="database/save.php" method="POST">
        <h1 class="title2">Agrega tu pelicula favorita.</h1><br>
        <div class="input-group">
            <span class="input-group-addon">Titulo</span>
            <input id="title" type="text" class="form-control" name="title" placeholder="Nombre de la pelicula" required autofocus>
        </div><br>
        <div class="input-group">
            <span class="input-group-addon">Año</span>
            <input id="year" type="number" min="0" step="1" class="form-control" name="year" placeholder="Año de lanzamiento" required>
        </div><br>
        <div class="input-group">
            <span class="input-group-addon">Director</span>
            <input id="title" type="text" class="form-control" name="director" placeholder="Nombre del director" required>
        </div><br>
        <select class="form-control" id="sel1" name="category" required>
            <option value="">Categoria</option>
            <option value="Terror">Terror</option>
            <option value="Comedia">Comedia</option>
            <option value="Drama">Drama</option>
            <option value="Accion">Accion</option>
            <option value="Sci-fi">Sci-Fi</option>
        </select>
        <h3>Califica la pelicula.</h3>
        <div class="calificar">
            <label class="radio-inline"><input type="radio" name="rating" value="1 Estrella" checked>1 Estrella</label>
            <label class="radio-inline"><input type="radio" name="rating" value="2 Estrellas">2 Estrellas</label>
            <label class="radio-inline"><input type="radio" name="rating" value="3 Estrellas">3 Estrellas</label>
            <label class="radio-inline"><input type="radio" name="rating" value="4 Estrellas">4 Estrellas</label>
            <label class="radio-inline"><input type="radio" name="rating" value="5 Estrellas">5 Estrellas</label>
        </div><br>
        <div class="submit">
            <input type="submit" name="save" class="btn btn-info" value="Guardar">
        </div>
    </form>
</div>

<?php include("includes/footer.php") ?>