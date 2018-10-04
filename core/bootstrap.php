<?php

$app = [];

$app['config'] = require '../config.php';

require 'HTTP/Router.php';
require 'HTTP/Request.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';

$app['database'] = new QueryBuilder(
    Connection::make($app['config']['database'])
);