<?php

$children = $app['database']->listAllChildren();
require __DIR__ . '/../../../views/admin/documents/create_new_doc.view.php';