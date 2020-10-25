# WorldService

Provides a json api to get the "world" string

## How to build dev image:

    docker build -t world-dev --target dev .

## How to run dev image

    docker run -d --publish 8080:80 --volume ./php:/php:Z --name world-dev --rm world-dev

## Run tests from dev

    docker exec world-dev ./vendor/bin/codecept run

## Run shell in dev

    docker exec -it world-dev bash

## View live dev in browser:

http://localhost:8080

## How to build test image:

    docker build -t world-test --target test .

## How to run unit tests

    docker run world-test ./vendor/bin/codecept run unit

## How to run pact tests

    docker run --name world-test --rm world-test ./vendor/bin/codecept run pactProvider

## How to run test image for manual testing

    docker run --publish 8080:80 --name world-test --rm world-test

## How to build production image:

    docker build -t world-prod --target prod .

## How to run production image:

    docker run --publish 8080:80 --name world-prod --rm world-prod

## View production in browser:

http://localhost:8080


## View test and coverage analysis:

 - Add 150.140.26.209 test.ntsdev2.sch.gr
 - Visit http://test.ntsdev2.sch.gr/35/

