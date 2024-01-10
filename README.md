# Typo3 Custom Extension

## Install

```bash
$ git clone git@github.com:vasildakov/typo3-custom-extension.git
```

## Using docker-compose

```bash
$ docker compose up -d --build
```

## Update the hosts file 
``` 
127.0.0.1 typo3.docker
```

## Install Typo3
``` 
http://typo3.docker/typo3/install.php
```

## Tests

Unit tests

```shell
./vendor/bin/phpunit -c UnitTests.xml --coverage-html var/log/coverage
```

Functional tests

```shell
./vendor/bin/phpunit -c FunctionalTests.xml --coverage-html var/log/coverage
```
