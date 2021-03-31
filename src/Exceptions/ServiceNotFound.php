<?php

namespace Technically\NullContainer\Exceptions;

use Psr\Container\NotFoundExceptionInterface;
use RuntimeException;

final class ServiceNotFound extends RuntimeException implements NotFoundExceptionInterface
{
    private string $serviceName;

    /**
     * @param string $serviceName
     */
    public function __construct(string $serviceName)
    {
        $this->serviceName = $serviceName;

        parent::__construct("Could not resolve service (`{$serviceName}`).");
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }
}
