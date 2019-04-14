<?php
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

//Initialization
$request = ServerRequestFactory::fromGlobals();

//Action
$name = $request->getQueryParams()['name'] ?? 'GUEST';

$response = (new HtmlResponse('Hello, '.$name.'!'))
    ->withHeader('X-Developer', 'CooLio');


//Sending
$emitter = new SapiEmitter();
$emitter->emit($response);