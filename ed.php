<?php
include('db.php');
if(isset($_GET['Id']));
    $Id = $_GET['Id'];
    $query = "SELECT * FROM task WHERE Id=$Id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
        }
if(isset($_POST['Actualizar'])){
    $Id = $_GET['Id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = " UPDATE task set title = '$title', description = '$description' WHERE Id = $Id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Tarea actualizada correctamente';
    $_SESSION['message_type'] = 'warning' ;
    header('Location: index.php');
}



?>

<?php include('includes/header.php') ?>
<!DOCTYPE html>
<html>
<head>
<style>
    body{
        background-color:  	#A6A6A6;
    }
</style> 
</head>
</html>
<div class="container p-4">
        <div class="row">
            <div class="cold-md-4 mx-auto">
                <div class="card card-body">
                    <form action="ed.php?Id=<?php echo $_GET['Id'];?>" method="POST">
                        <div class="form-group">
                            <input type="text" name='title' value="<?php echo $title; ?>"
                            class='form-control'placeholder='Actualiza el titulo'>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class='form-control' placeholder='Actualiza la descripcion'><?php echo $description; ?></textarea>
                        </div>
                        <button class='btn btn-success' name='Actualizar'>
                        Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
<?php include('includes/footer.php')?>