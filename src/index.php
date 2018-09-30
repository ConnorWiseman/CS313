<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('/app/foundry/foundry/includes/Application.php');
// require_once('/app/foundry/foundry/middleware/cookies.php');
// require_once('/app/foundry/foundry/middleware/db.php');
// require_once('/app/foundry/foundry/middleware/filters.php');
require_once('/app/foundry/foundry/middleware/render.php');
require_once('/app/foundry/foundry/middleware/router.php');
// require_once('/app/foundry/foundry/middleware/session.php');

$dbconfig = Array(
  'prefix'  => 'pgsql',
  'dbhost'  => 'localhost',
  'dbport'  => '5432',
  'dbname'  => 'cs313-php',
  'dbuser'  => '',
  'dbpass'  => ''
);

$dburl = getenv('DATABASE_URL');

if (!empty($dburl)) {
  $herokuconfig = parse_url($dburl);
  $dbconfig['dbhost'] = $herokuconfig['host'];
  $dbconfig['dbport'] = $herokuconfig['port'];
  $dbconfig['dbname'] = ltrim($herokuconfig['path'], '/');
  $dbconfig['dbuser'] = $herokuconfig['user'];
  $dbconfig['dbpass'] = $herokuconfig['pass'];
}

$app = new Foundry\Application;

// $app->apply($db($dbconfig));
// $app->apply($filters);
// $app->apply($cookies);
// $app->apply($session);
$app->apply($render());
$app->apply($router([
  'get' => [
    '/' => function($ctx, $next) {
      $ctx->res->render('index');
    }
  ]
]));
$app->listen();
