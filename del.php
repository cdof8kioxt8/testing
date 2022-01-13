<?php
include('db.php');
if (isset($_GET['Id']))
    $Id = $_GET['Id'];
    $query = "DELETE FROM task WHERE Id=$Id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = 'Tarea removida exitosamente';
        $_SESSION['message_type'] = 'danger';
        header('location: index.php');
        # code...
    }


?>
