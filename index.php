<?php include('db.php')?>

<?php include('includes/header.php')?>

<div class='container-fluid'>

    <div class='row'>
        <div class='col-md-12'>

            <?php if (isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset();} ?>
            <div class='card card-body'>
                <form action='save_task.php' method='POST'>
                    <div class='fourm-group'>
                        <input type='text' name='title' class='form-control'
                        placeholder='Título de la tarea . . .' autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class='form-control'
                        placeholder='Descripción de la tarea . . .'></textarea>
                    </div>
                    <input type="submit" class='btn btn-success btn-block'
                    name='save_task' value = '𝗚𝗨𝗔𝗥𝗗𝗔𝗥'>
                        
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-8">
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Ｔíｔｕｌｏ</th>
                        <th>Ｄｅｓｃｒｉｐｃｉóｎ</th>
                        <th>Ｆｅｃｈａ Ｄｅ Ｃｒｅａｃｉóｎ</th>
                        <th>Ａｃｃｉｏｎｅｓ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = 'SELECT * FROM task';
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td>
                                <a href="ed.php?Id=<?php echo $row['Id']?>"class='btn btn-secondary'>
                                <i class="fas fa-edit"></i>
                                </a>
                                <a href="del.php?Id=<?php echo $row['Id']?>"class='btn btn-danger'>
                                <i class="fas fa-trash"></i>
                                </a>
                            <td>
                        </tr>

                    <?php }?>

                </tbody>
            </table>

    </div>
</div>

</div>

<?php include('includes/footer.php')?>