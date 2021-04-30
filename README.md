# Technically Null Container

`Technically\NullContainer` is a [PSR-11][1] container implementation that is always empty.

This is a [NullObject][2] pattern implementation for PSR-11.

This is useful when you want to provide an optional `ContainerInterface` dependency, 
but don't want to deal with nullable values.

![Tests Status][status-badge]


## Features

- PSR-11
- PHP 7.1+
- PHP 8.0
- Semver
- Tests
- Changelog


## Installation

Use [Composer][3] package manager to add *NullContainer* to your project:

```
composer require technically/null-container
```


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


## Changelog

All notable changes to this project will be documented in the [CHANGELOG][changelog] file.


## Credits

- Implemented by [Ivan Voskoboinyk][4]


[1]: https://www.php-fig.org/psr/psr-11/
[2]: https://en.wikipedia.org/wiki/Null_object_pattern
[3]: https://getcomposer.org/
[4]: https://github.com/e1himself?utm_source=web&utm_medium=github&utm_campaign=technically/null-container
[status-badge]: https://github.com/technically-php/null-container/actions/workflows/test.yml/badge.svg
[changelog]: ./CHANGELOG.md
