<?php
    require('./../templates/header.php');
    (new \App\Controller\TaskController())->create();
?>


<!-- Page Content -->
<div class="container" style="margin-left: 500px;">
    <div class="row">
        <div class="col-lgl-6 col-offset-3">
            <h2 style="margin-left: 400px; margin-bottom: 20px;">فعالیت</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">

            <?php
            if($flash->hasMessages($flash::ERROR) ) {
                $flash->display();
            }
            ?>

            <form action="/tasks/create.php" method="post">
                <div class="form-group">

                    <input type="text" class="form-control" name="name" ">
                </div>

                <button type="submit" class="btn btn-success">ایجاد</button>
        </div>
        </form>
    </div>
</div>
<!-- /.row -->

