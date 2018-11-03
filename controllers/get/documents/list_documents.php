<?php
/**
 * Created by PhpStorm.
 * User: onnok
 * Date: 23-10-18
 * Time: 15:38
 */

$children = $app['database']->selectSpecificRules("users", "Kind");

require __DIR__ . '/../../../views/admin/documents/list_documents.view.php';

