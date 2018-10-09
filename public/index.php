<?php
// Request entry point.
require '../core/bootstrap.php';

Router::load('../routes.php')
    ->direct(Request::getUri());