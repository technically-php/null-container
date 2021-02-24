.PHONY: tests

tests: vendor
	php -d zend.assertions=1 -d assert.exception=1 test.php

vendor: composer.json composer.lock
	composer install
	touch vendor
