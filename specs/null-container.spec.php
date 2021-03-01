<?php

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Technically\NullContainer\Exceptions\ServiceNotFound;
use Technically\NullContainer\NullContainer;

describe('NullContainer', function() {

    it('should instantiate a new instance', function() {
        $container = new NullContainer();
        assert($container instanceof NullContainer);
    });

    it('should implement PSR container interface', function() {
        $container = new NullContainer();
        assert($container instanceof ContainerInterface);
    });

    describe('->has()', function() {
        it('should always return false', function () {
            $container = new NullContainer();

            assert($container->has('a') === false);
            assert($container->has('b') === false);
            assert($container->has('c') === false);
            assert($container->has(NullContainer::class) === false);
            assert($container->has(ContainerInterface::class) === false);
        });
    });

    describe('->get()', function() {
        it('should always throw ServiceNotFound exception', function () {
            $container = new NullContainer();

            try {
                $container->get('a');
            } catch (ServiceNotFound $exception) {
                // passthru
            }

            assert(isset($exception));
            assert($exception instanceof ServiceNotFound);
            assert($exception instanceof NotFoundExceptionInterface);
        });
    });
});
