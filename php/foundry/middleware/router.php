<?php

require_once('../includes/Context.php');
require_once('../includes/Router.php');

$router = function(Array $routes = Array(), Array $options = Array()) {

    // Require routes here, for the sake of correct scoping without `use`.
    require_once('../routes/get/index.php');

    $auth = function(Foundry\Context $ctx, \Closure $next) {
        if ($ctx->session->userId === NULL) {
            return $ctx->req->redirect('/signin');
        }
        return $next();
    };

    $unAuth = function(Foundry\Context $ctx, \Closure $next) {
        if($ctx->session->userId !== NULL) {
            return $ctx->req->redirect('/');
        }
        return $next();
    };

    $instance = new Foundry\Router;

    foreach($routes as $method => $middleware) {
      foreach($middleware as $path, $handler) {
        call_user_func_array(Array($instance, $method), Array($path, $handler));
      }
    }

    return function(Foundry\Context $ctx, \Closure $next) use($instance) {
        $instance->handleRequest($ctx);
        return $next();
    };
};
