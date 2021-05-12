<?php
    include __DIR__ . '/../bootstrap/autoload.php';

    (new \App\Controller\TaskController())->done(request()->input('id', false));
