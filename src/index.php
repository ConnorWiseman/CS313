<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../includes/Application.php');
require_once('../middleware/cookies.php');
require_once('../middleware/db.php');
require_once('../middleware/filters.php');
require_once('../middleware/render.php');
require_once('../middleware/router.php');
require_once('../middleware/session.php');

$app = new Foundry\Application;

// $app->apply($db);
// $app->apply($filters);
$app->apply($cookies);
// $app->apply($session);
$app->apply($render());
$app->apply($router());
$app->listen();
