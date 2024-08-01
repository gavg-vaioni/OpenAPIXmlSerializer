#!/bin/sh

./vendor/bin/infection --threads=$(nproc) --only-covered --only-covering-test-cases --no-progress