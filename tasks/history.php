<?php
require_once ('./../templates/header.php');
$tasks = (new \App\Controller\TaskController())->index();
?>

<div class="row">
    <div class="col-lg-8 col-lg-offset-3" style="left: 200px; top: 50px;">
        <h3 style="text-align: right; margin-bottom: 20px;">
            <a href="/tasks" >
                <button class="btn btn-xs btn-secondary">بازگشت</button>
            </a>
            تاریخچه کارها
        </h3>
        <table class="table table-bordered" style="text-align: center;">
            <thead>
            <tr>
                <th>زمان انجام</th>
                <th>زمان ویرایش</th>
                <th>زمان ساخت</th>
                <th>عنوان کار</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task) :?>
                <tr>
                    <td>
                        <?php if(!is_null($task->done_at)) :?>
                        <?= verta($task->done_at) ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(!is_null($task->update_at)) :?>
                            <?= verta($task->update_at) ?>
                        <?php endif; ?>
                    </td>
                    <td> <?= verta($task->created_at) ?></td>
                    <td> <?= $task->name ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

