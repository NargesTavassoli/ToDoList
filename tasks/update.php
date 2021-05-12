<?php
    include __DIR__. '/../bootstrap/autoload.php';

    (new \App\Controller\TaskController())->update(request()->input('id', false));