<?php

require_once('/app/foundry/includes/Context.php');
require_once('/app/foundry/includes/DatabaseHandler.php');

$db = function(Array $dbconfig) {
  return function(Foundry\Context $ctx, \Closure $next) use ($dbconfig) {
    $ctx->dbh = new Foundry\DatabaseHandler;
    $ctx->dbh->connect($dbconfig);
    return $next();
  };
};
