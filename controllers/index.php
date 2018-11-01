<?php

$administrators = $app['database']->selectSpecificRules("users", "Administrator");

require 'views/index.view.php';