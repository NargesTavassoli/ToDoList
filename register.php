<?php
require('./templates/header.php');
$homeController = new App\controller\UserController();

$homeController->register($_POST);

?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <?php
            if($flash->hasMessages($flash::ERROR) ) {
                $flash->display();
            }

            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align: center; margin-bottom: 20px; margin-left: 400px; margin-top: 50px;">ثبت نام</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <form class="form-horizontal" action="/register.php" method="post" style="float: right">
                                <div class="form-group">
                                    <label style="float: right">نام</label>
                                    <input type="text" class="form-control" name="name" value="<?= old('name') ?>">
                                </div>
                                <div class="form-group">
                                    <label style="float: right">ایمیل</label>
                                    <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                                </div>
                                <div class="form-group">
                                    <label style="float: right">رمز</label>
                                    <input type="password" class="form-control" name="password" value="<?= old('password') ?>">
                                </div>
                                <div class="form-group">
                                    <label style="float: right">تکرار رمز</label>
                                    <input type="password" class="form-control" name="confirm_password" value="<?= old('confirm_password') ?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


