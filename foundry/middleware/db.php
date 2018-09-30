<?php

require_once('../includes/Context.php');
require_once('../includes/DatabaseHandler.php');

$db = function(Array $dbconfig) {
  return function(Foundry\Context $ctx, \Closure $next) use ($dbconfig) {
    $ctx->dbh = new Foundry\DatabaseHandler;
    $ctx->dbh->connect($dbconfig);
    return $next();
  };
};
