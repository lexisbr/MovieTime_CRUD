<?php include("database/db.php") ?>

<?php include("includes/header.php") ?>

<?php 
if (isset($_SESSION['message'])) { ?>
    <div class="alert-<?= $_SESSION['message_type'] ?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?= $_SESSION['message'] ?>
    </div>
<?php session_unset();
} ?>

<?php 
if (isset($_SESSION['message1'])) { ?>
    <div class="alert-<?= $_SESSION['message_type1'] ?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?= $_SESSION['message1'] ?>
    </div>
<?php session_unset();
} ?>
<div class="box3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Año</th>
                <th>Director</th>
                <th>Categoria</th>
                <th>Reseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM movie";
            $result  = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['director']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="database/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

</div>


<?php include("includes/footer.php") ?>