<?php

use Psr\Container\ContainerInterface;
use Technically\NullContainer\NullContainer;

$container = new NullContainer();

assert($container->has('a') === false);
assert($container->has('b') === false);
assert($container->has('c') === false);
assert($container->has(NullContainer::class) === false);
assert($container->has(ContainerInterface::class) === false);
