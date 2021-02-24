<?php

use Psr\Container\ContainerInterface;
use Technically\NullContainer\NullContainer;

$container = new NullContainer();

assert($container instanceof ContainerInterface);
