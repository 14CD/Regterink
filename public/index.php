<?php
// Quasi-entrypoint.
require '../core/bootstrap.php';

require Router::load('../routes.php')
    ->direct(Request::getUri());