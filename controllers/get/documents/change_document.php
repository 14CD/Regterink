<?php

$documentInfo = $app['database']->getChangeDocumentForm($_GET['id']);
$childName = $app['database']->getChildNameById($documentInfo['child_id']);


require __DIR__ . '/../../../views/admin/documents/change_document.view.php';