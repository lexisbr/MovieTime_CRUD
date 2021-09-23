<?php 

include('db.php');

if(isset($_POST['save'])){
    $title = $_POST['title'];
    $year = $_POST['year'];
    $director = $_POST['director'];
    $category = $_POST['category'];
    $rating = $_POST['rating'];

    $query = "INSERT INTO movie(name,year,director,category,rating) VALUES ('$title',$year,'$director','$category','$rating')";

    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Pelicula Guardada Exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../agregar.php");

}

?>