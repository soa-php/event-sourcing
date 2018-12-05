#!/usr/bin/env bash

COMMAND=${1:-}
shift

run_in_docker="docker run -it --rm -v $PWD:/srv/app -w /srv/app --user ${UID} mgonzalezbaile/php_base:1.0"

case "$COMMAND" in
    composer)
    ${run_in_docker} composer $@
    ;;
    exec)
    ${run_in_docker} $@
    ;;
esac
