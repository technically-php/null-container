![example workflow](https://github.com/technically-php/null-container/actions/workflows/test.yml/badge.svg)

# NullContainer

`NullContainer` is a [PSR-11](https://www.php-fig.org/psr/psr-11/) container implementation that is always empty. 

This is useful when you want to provide an optional `ContainerInterface` dependency, 
but don't want to deal with nullable values.

## Features

- PSR-11
- PHP 7.1+
- PHP 8.0
- Semver
- Tests

## Example

```php
use Psr\Container\ContainerInterface;
use Technically\NullContainer\NullContainer;

final class MyServiceContainer implements ContainerInterface
{
    private ContainerInterface $parent;

    /**
     * @param ContainerInterface|null $parent
     */
    public function __construct(ContainerInterface $parent = null)
    {
        $this->parent = $parent ?? new NullContainer();
    }

    // ... your code, where you don't need to deal with $parent set to `null`.
}
```

## Credits

- Implemented by [Ivan Voskoboinyk](https://github.com/e1himself)
