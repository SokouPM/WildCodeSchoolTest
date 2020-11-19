<?php

declare(strict_types=1);    // to impose "types" on variables and methods.
header('content-type: text/html; charset=utf-8');   // to get accents

require_once('controllers/MainController.php');     // to run function from "controllers/MainController.php"
MainController::runApplication();