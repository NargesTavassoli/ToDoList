<?php
    require('./../templates/header.php');
    $task = (new \App\Controller\TaskController())->edit();
?>


<!-- Page Content -->
<div class="container" style="margin-left: 500px;">
    <div class="row">
        <div class="col-lgl-6 col-offset-3">
            <h2 style="margin-left: 400px; margin-bottom: 20px;">ویرایش</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">

            <?php
            if($flash->hasMessages($flash::ERROR) ) {
                $flash->display();
            }
            ?>

            <form action="/tasks/update.php?id=<?=$task->id ?>" method="post">
                <div class="form-group">

                    <input type="text" class="form-control" name="name" value="<?= $task->name ?>">
                </div>

                    <button type="submit" class="btn btn-success">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

