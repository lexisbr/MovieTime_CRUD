<?php 

    include("database/db.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM movie WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Query Failed");
        }

        header("Location: ../visualizar.php");
    }


?>