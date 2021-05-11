<?php
include __DIR__ . '/../bootstrap/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/public/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/public/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
              <div class="btn-group" >
                  <?php if(!checklogin()) : ?>
                      <a href="/login.php" class="btn-success" style="padding: 6px;">ورود</a>
                      <a href="/register.php" class="btn-danger" style="padding: 6px;">ثبت نام</a>
                  <?php else : ?>
                      <a href="/logout.php" class="btn-danger" style="padding: 6px;">خروج</a>
                  <?php endif;?>

              </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="/">خانه</a></li>
                    </ul>
                </div>
            </div>
        </nav>

