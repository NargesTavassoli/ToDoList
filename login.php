<?php
    require('./templates/header.php');

    $homeController = new App\controller\UserController();
    $homeController->login();
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
                <div class="panel-heading" style="float: right">
                    <h3 class="panel-title" >ورود</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <form class="form-horizontal" action="/login.php" method="post" style="float: right">

                                <div class="form-group">
                                    <label style="float: right">ایمیل</label>
                                    <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                                </div>
                                <div class="form-group">
                                    <label style="float: right">رمز</label>
                                    <input type="password" class="form-control" name="password" value="<?= old('password') ?>">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">بخاطر بسپار
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">ورود</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


