<?php

use Psr\Container\NotFoundExceptionInterface;
use Technically\NullContainer\Exceptions\ServiceNotFound;
use Technically\NullContainer\NullContainer;

$container = new NullContainer();

try {
    $container->get('a');
} catch (ServiceNotFound $exception) {
    // passthru
}

assert(isset($exception));
assert($exception instanceof ServiceNotFound);
assert($exception instanceof NotFoundExceptionInterface);
