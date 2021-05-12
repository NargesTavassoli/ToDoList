<?php
require_once ('./../templates/header.php');
$tasks = (new \App\Controller\TaskController())->index();
?>

<div class="row">
    <div class="col-lg-8 col-lg-offset-3" style="left: 200px; top: 50px;">
        <h3>لیست کارها
            <a href="/tasks/create.php" >
                <button class="btn btn-xs btn-success">کار جدید</button>
            </a>
            <a href="/tasks/history.php" >
                <button class="btn btn-xs btn-secondary">تاریخچه</button>
            </a>
        </h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>عنوان</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task) :?>
                <tr>
                    <td> <?= $task->name ?></td>
                    <td>
                        <?php if(!checkaction($task->id))  :?>
                        <a href="/tasks/done.php?id=<?= $task->id ?>">
                            <button class="btn btn-success btn-xs">انجام شد</button>
                        </a>
                        <?php endif; ?>
                        <a href="/tasks/delete.php?id=<?= $task->id ?>">
                            <button class="btn btn-danger btn-xs">حذف</button>
                        </a>
                        <a href="/tasks/edit.php?id=<?= $task->id ?>">
                            <button class="btn btn-primary btn-xs">ویرایش</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

