<?php

require_once('/app/foundry/includes/Context.php');
require_once('/app/foundry/includes/SessionHandler.php');

$session = function(Foundry\Context $ctx, \Closure $next) {
  $ctx->session = new Foundry\SessionHandler;
  $ctx->session->start();
  return $next();
};
