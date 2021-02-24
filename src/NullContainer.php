<?php

namespace Technically\NullContainer;

use Psr\Container\ContainerInterface;
use Technically\NullContainer\Exceptions\ServiceNotFound;

final class NullContainer implements ContainerInterface
{
    /**
     * Get an entry of the container by its identifier.
     *
     * Always throws `ServiceNotFound` exception.
     *
     * @param string $id Identifier of the entry to look for.
     * @throws ServiceNotFound Always
     */
    public function get($id)
    {
        throw new ServiceNotFound($id);
    }

    /**
     * Check if the container can return an entry for the given identifier
     *
     * Always returns false.
     *
     * @param string $id
     * @return false
     */
    public function has($id)
    {
        return false;
    }
}
