<?php

require_once('/foundry/includes/CookiesHandler.php');

$cookies = function(Foundry\Context $ctx, \Closure $next) {
  $ctx->cookies = new Foundry\CookiesHandler;
  return $next();
};
