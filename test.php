<?php

if (ini_get('zend.assertions') !== '1') {
    throw new LogicException('Tests are expecting `zend.assertions` set to 1 in php.ini.');
}

if (ini_get('assert.exception') !== '1') {
    throw new LogicException('Tests are expecting `assert.exception` set to 1 in php.ini.');
}

require __DIR__ . '/vendor/autoload.php';

$status = (function() {
    $total = 0;
    $passed = 0;
    $failed = 0;
    $finished = false;

    register_shutdown_function(function () use (&$finished) {
        if (! $finished) {
            echo PHP_EOL, 'Not all tests were executed.', PHP_EOL;
            exit(1);
        }
        return 0;
    });

    $tests = [];

    foreach (scandir(__DIR__ . '/tests') as $file) {
        if (substr($file, 0, 10) === 'it_should_') {
            $tests[] = $file;
        }
    }

    $errors = [];

    foreach ($tests as $file) {
        $total++;
        try {
            require __DIR__ . '/tests/' . $file;
            $passed++;
            echo '.';
        } catch (Throwable $exception) {
            echo 'E';
            $failed++;
            $errors[$file] = $exception;
        }
    }

    echo " {$total}/{$total} (100%)", PHP_EOL;

    if ($failed > 0) {
        echo "There were {$failed} errors: ", PHP_EOL;
    }

    foreach (array_keys($errors) as $i => $test) {
        echo PHP_EOL;
        $exception = $errors[$test];
        echo sprintf("%s) %s", $i + 1, $test), PHP_EOL;
        echo sprintf("`%s` was thrown.", get_class($exception)), PHP_EOL;
        echo sprintf('"%s"', $exception->getMessage()), PHP_EOL;
        echo $exception->getTraceAsString(), PHP_EOL;
    }

    echo PHP_EOL;

    echo "Tests executed: {$total}", PHP_EOL;
    echo "Passed: {$passed}", PHP_EOL;
    echo "Failed: {$failed}", PHP_EOL;

    $finished = true;

    return $failed === 0 ? 0 : 1;
})();

exit($status);
