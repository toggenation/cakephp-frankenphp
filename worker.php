<?php
use Cake\Http\ResponseEmitter;

ignore_user_abort(true);

require __DIR__.'/vendor/autoload.php';

$myApp = new \App\Application(__DIR__ . '/config');
$myApp->bootstrap();
$myApp->pluginBootstrap();
error_log('Worker started');
$responseEmitter = new ResponseEmitter();

$handler = static function () use ($myApp, $responseEmitter) {
    error_log('Worker handler');
    $request = \Cake\Http\ServerRequestFactory::fromGlobals();
    $response = $myApp->handle($request);
    $responseEmitter->emit($response);
};

$maxRequests = (int)($_SERVER['MAX_REQUESTS'] ?? 0);
for ($nbRequests = 0; !$maxRequests || $nbRequests < $maxRequests; ++$nbRequests) {
    error_log('Worker handling request');
    $keepRunning = \frankenphp_handle_request($handler);

    gc_collect_cycles();

    if (!$keepRunning) break;
}


