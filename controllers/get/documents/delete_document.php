<?php

$app['database']->deleteDocument($_GET['id']);

header('Location: documents');